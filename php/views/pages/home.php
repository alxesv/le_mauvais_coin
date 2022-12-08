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
<h2 class="text-center">Created by</h2>
<div class ="container card_box">
<div class="card" style="width: 18rem;">
  <img src="https://loremflickr.com/640/360
" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Alexandre</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iste eius tempore, nesciunt eligendi quod cum placeat, officiis voluptatem ullam quia reiciendis ab consectetur vero doloribus laborum et temporibus? Nulla!</p>
  </div>
</div><div class="card" style="width: 18rem;">
  <img src="https://placekitten.com/640/360
" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Djamel</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iste eius tempore, nesciunt eligendi quod cum placeat, officiis voluptatem ullam quia reiciendis ab consectetur vero doloribus laborum et temporibus? Nulla!</p>
  </div>
</div><div class="card" style="width: 18rem;">
  <img src="https://placebear.com/640/360
" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Elisa</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iste eius tempore, nesciunt eligendi quod cum placeat, officiis voluptatem ullam quia reiciendis ab consectetur vero doloribus laborum et temporibus? Nulla!</p>
  </div>
</div>
</div>
<?php
$pageContent = ob_get_clean();
?>