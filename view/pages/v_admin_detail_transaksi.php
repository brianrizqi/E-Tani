<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 18/10/2018
 * Time: 12:33
 */

?>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/admin.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="body-admin">
<section id="sideMenu">
    <nav>
        <a href="?controller=home&action=homeAdmin"><i class="fa fa-home" aria-hidden="true"></i>
            Home</a>
        <a href="?controller=user&action=regisAdmin"><i class="fa fa-address-card" aria-hidden="true"></i>
            Daftar</a>
        <a href="?controller=user&action=showUser"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
        <a class="active" href="?controller=transaksi&action=showAdmin"><i class="fa fa-check-square-o"
                                                                           aria-hidden="true"></i> Verif Transaksi</a>
    </nav>
</section>
<header>
    <div class="search-admin">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
    </div>
    <div class="admin-field">
        <a href="?controller=transaksi&action=showAdmin" class="notification">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
            <span class="circle-bell"><?= $_SESSION['notif'] ?></span></a>
        <a href="logout.php" onclick="return confirm('Apakah Anda ingin keluar')">
            <div class="admin-img"></div>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
</header>
<section id="content-area">
    <div class="container">
        <div class="heading">
            <br>
        </div>
        <?php
        foreach ($bukti as $item) {
            ?>
            <center><img src="bukti/<?= $item['bukti'] ?>" style="height: 200px;"></center>
        <?php } ?>
        <br>
        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Nama Penjual</th>
                <th>Alamat</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
            <?php
            $no = 1;
            foreach ($list as $item) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $item['nama_produk'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?=$item['alamat']?></td>
                    <td><?= $item['jumlah'] ?></td>
                    <td><?= $item['total_harga'] ?></td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </table>
    </div>
</section>
</body>

</html>
