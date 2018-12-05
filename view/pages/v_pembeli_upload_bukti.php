<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 17/10/2018
 * Time: 21:36
 */

?>

<html>
<head>
    <title>Detail Product</title>
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</head>
<body class="body_detail" background="resources/images/banner.jpg">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="?controller=home&action=homePembeli">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?controller=produk&action=tampilPembeliProduk">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?controller=keranjang&action=showCartPembeli">Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?controller=transaksi&action=showPembeliTransaksi">Transaksi</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="?controller=user&action=showPembeli"> <?= $_SESSION['user'] ?> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php" onclick="return confirm('Apakah Anda ingin keluar')">Logout</a>
        </li>
    </ul>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card_home">
                <div class="card" style="width:100%">
                    <div class="card-body">
                        <center><h2>Upload</h2></center>
                        <br>
                        <form enctype="multipart/form-data" method="post">
                            <input type="hidden" name="controller" value="transaksi">
                            <input type="hidden" name="action" value="uploadBukti">
                            <input name="bukti" type="file">
                            <input type="submit" value="Upload" name="input" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

