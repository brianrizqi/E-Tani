<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 17/10/2018
 * Time: 23:19
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
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card_home">
                <div class="card" style="width:100%">
                    <div class="card-body">
                        <center><h2>Keranjang</h2></center>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $total=0;
                            foreach ($list as $item) {
                                ?>
                                <tbody>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $item['nama_produk'] ?></td>
                                    <td><?= "Rp. ".number_format($item['total_harga'],0,".",".") ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                </tr>
                                </tbody>
                                <?php
                                $no++;
                                $total +=$item['total_harga'];
                            }
                            ?>
                        </table>
                        <h3 style="position: relative;left: 70%">Total: Rp. <?=number_format($total,0,".",".")?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
