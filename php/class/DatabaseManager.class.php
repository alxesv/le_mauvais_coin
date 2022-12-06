<?php

class DatabaseManager {
    private $db;
    private $table_name;
    private $class;

    function __construct($db, $table_name, $class=null){
        $this->db = $db;
        $this->table_name = $table_name;
        $this->class = $class;
    }

    public function insert_into($kwargs) {
        $columns = "";
        $values = [];
        $placeholder = "";
        foreach ($kwargs as $column=>$value){
            $columns .= $column . ',';
            array_push($values, $value);
            $placeholder .= "?,";
        }
        $columns = substr($columns, 0, -1);
        $placeholder = substr($placeholder, 0, -1);
        $query = $this->db->prepare("INSERT INTO " . $this->table_name . " (" . $columns . ") VALUES (" . $placeholder . ")");
        $query->execute($values);
    }

    public function get_all_from_table(){
        $query = $this->db->prepare("SELECT * from " . $this->table_name);
        $query->execute();
        return $query->fetchall(PDO::FETCH_CLASS, $this->class);
    }
    public function custom_select($query, $param=null){
        $query = $this->db->prepare($query);
        $query->execute($param);
        return $query->fetchall();
    }
    public function update_row($kwargs, $row, $condition){
        $set = "";
        $values = [];
        foreach ($kwargs as $column=>$value){
            $set .= $column . "=?,";
            array_push($values, $value);
        }
        array_push($values, $condition);
        $set = substr($set, 0, -1);
        $query = $this->db->prepare("UPDATE " .$this->table_name . " SET " . $set . " WHERE " . $row . " =?");
        $query->execute($values);
    }

    public function delete_row($row, $condition){
        $query = $this->db->prepare("DELETE FROM " . $this->table_name . " WHERE " . $row . " =?");
        $query->execute([$condition]);
    }
}