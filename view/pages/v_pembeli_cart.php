<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 17/10/2018
 * Time: 13:54
 */

?>

<html>
<head>
    <title>Detail Product</title>
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
                                <th>Produk</th>
                                <th>Nama Penjual</th>
                                <th>Harga</th>
                                <th>Jumlah (kg)</th>
                            </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $i = 0;

                            $totalBayar = 0;
                            if (array_key_exists('id_produk', $_SESSION) && !empty($_SESSION['id_produk'])) {
                                foreach ($list
                                         as $item) {
                                    $harga = $item['harga'];
                                    $jumlahBeli = $item['jumlahBeli'];
                                    $totalHarga = $harga * $jumlahBeli;
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $item['nama_produk'] ?></td>
                                        <td><?= $item['penjual'] ?></td>
                                        <td><?= $item['jumlahBeli'] ?></td>
                                        <td><?= "Rp " . number_format($totalHarga, 0, ".", "."); ?></td>
                                    </tr>
                                    </tbody>
                                    <?php
                                    $totalBayar += $totalHarga;
                                    $no++;
                                }
                            }
                            ?>
                        </table>
                        <div>

                        </div>
                        <button class="btn btn-primary" style="position: relative; left: 87%;" data-toggle="modal"
                                data-target="#myModal">
                            Bayar
                        </button>

                        <a href="?controller=keranjang&action=hapusCart" class="btn btn-danger"
                           style="position: relative; left: 87%;">Batal</a>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Transfer disini</h4>
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <p>Rekening BNI 739284012 as Miko</p>
                                        <p>Total Pembelian : <?= "Rp " . number_format($totalBayar, 0, ".", ".") ?></p>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <form method="post">
                                            <input type="hidden" name="controller" value="keranjang">
                                            <input type="hidden" name="action" value="bayarCart">
                                            <input type="checkbox" name="koin" value="<?= $poin ?>"> Gunakan
                                            poin, poin anda <?= $poin ?>
                                            <input type="submit" name="submit" class="btn btn-primary" value="Bayar">
                                        </form>
<!--                                        <a href="?controller=keranjang&action=bayarCart">-->
<!--                                            <button type="button" class="btn btn-primary">Bayar-->
<!--                                            </button>-->
<!--                                        </a>-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
