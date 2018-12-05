<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 17/10/2018
 * Time: 21:41
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
                        <center><h2>Transaksi</h2></center>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $status = "";
                            $bukti = "";
                            foreach ($list as $item) {
                                ?>
                                <tbody>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td hidden><?= $item['id_transaksi'] ?></td>
                                    <td><?= $item['tanggal'] ?></td>
                                    <?php
                                    if ($item['verif'] == 0) {
                                        $status = "Belum bayar";
                                    } else {
                                        $status = "Lunas";
                                    }
                                    if ($item['bukti'] == NULL) {
                                        $bukti = "Belum Upload";
                                    } else {
                                        $bukti = "Sudah Upload";
                                    }
                                    ?>
                                    <td><?= $status ?></td>
                                    <td><?= $bukti ?></td>
                                    <td>
                                        <a href="?controller=transaksi&action=showDetailTransaksi&id_transaksi=<?=$item['id_transaksi']?>" class="btn btn-primary">Detail</a>
                                        <a href="?controller=transaksi&action=uploadTransaksi&id_transaksi=<?=$item['id_transaksi']?>" class="btn btn-success">Upload</a>
                                        <a href="?controller=transaksi&action=deletePembeli&id_transaksi=<?=$item['id_transaksi']?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                                $no++;
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
