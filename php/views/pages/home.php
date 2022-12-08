<?php
$pageTitle = "Le mauvais coin";
ob_start();
?>
<div class="container px-lg-5">
    <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
        <div class="m-4 m-lg-5">
            <h1 class="display-5 fw-bold">Welcome to the mauvais coin</h1>
            <p class="fs-4"> Achetez et partez</p>
        </div>
    </div>
</div>
<?php
$pageContent = ob_get_clean();
?>