<?php
require_once __DIR__ . '/../php/init.php';

// Router
$page = 'home';
if(isset($_GET['p'])){
    if(in_array($_GET['p'], $router_pages)){
        $page = $_GET['p'];
    }else{
        $page = '404';
    }
}

require_once __DIR__ . '/../php/views/pages/' . $page . '.php';
require_once __DIR__ . '/../php/views/partials/header.php';
echo $pageContent;
require_once __DIR__ . '/../php/views/partials/footer.php';