<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 18/10/2018
 * Time: 8:49
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
        <a class="active" href="?controller=transaksi&action=showAdmin"><i class="fa fa-check-square-o" aria-hidden="true"></i> Verif Transaksi</a>
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
            <span class="circle-bell"><?=$_SESSION['notif']?></span></a>
        <a href="logout.php">
            <div class="admin-img"></div>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
</header>
<section id="content-area">
    <div class="heading">
        <br>
        <center><h1>Verifikasi</h1></center>
        <br>
    </div>
    <div class="container">
        <table class="table" style="margin-top: 30px;">
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Tanggal</th>
                <th>Bukti</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            $bukti = "";
            $status = "";
            foreach
            ($list as $item) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td hidden><?= $item['id_transaksi'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['tanggal'] ?></td>
                    <?php
                    if ($item['verif'] == 0) {
                        $status = "Belum Lunas";
                    } else {
                        $status = "Lunas";
                    }
                    if ($item['bukti'] == NULL) {
                        $bukti = "Belum Upload";
                    } else {
                        $bukti = "Sudah Upload";
                    }

                    ?>
                    <td><?= $bukti ?></td>
                    <td><?= $status ?></td>
                    <td>
                        <a href="?controller=transaksi&action=verifAdmin&id_transaksi=<?=$item['id_transaksi']?>"
                           class="btn btn-success" name="edit"
                           onclick="return confirm('Apakah data akan di verif?')><span class="fa fa-check-square-o"></span></a>
                        <a href="?controller=transaksi&action=showDetailAdmin&id_transaksi=<?=$item['id_transaksi']?>"
                           class="btn btn-primary"
                           name="detail"><span class="fa fa-eye"></span></a>
                        <a href="?controller=transaksi&action=deleteTransaksi&id_transaksi=<?=$item['id_transaksi']?>"
                           class="btn btn-danger"
                           name="detail" onclick="return confirm('Apakah data akan di hapus?')"><span class="fa fa-trash"></span></a>
                    </td>
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
