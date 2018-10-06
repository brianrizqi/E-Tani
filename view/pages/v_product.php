<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Tani</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="?controller=home&action=home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?controller=produk&action=semuaProduk">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="v_contact.php">Contact</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="?controller=register&action=register">Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?controller=login&action=login">Sign In</a>
        </li>
    </ul>
</nav>
<div class="content-product">
    <br>
    <center><h2>Product</h2></center>
    <div class="container">
        <div class="row">
            <?php
            foreach ($list as $item) {
                ?>
                <div class="col-sm-3">
                    <div class="card_home">
                        <div class="card" style="width:250px">
                            <img class="card-img-top" src="gambar/<?= $item['gambar'] ?>" alt="Card image" style="height: 250px">
                            <div class="card-body">
                                <h4 class="card-title"><?= $item['nama_produk'] ?></h4>
                                <h5 class="card-text"><?= $item['nama'] ?></h5>
                                <p class="card-text"><?="Rp. ".number_format($item['harga'],0,".",".")?></p>
                                <a href="?controller=login&action=login" class="btn btn-success">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>