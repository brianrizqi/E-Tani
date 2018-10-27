<html>
<head>
    <title>Dashboard penjual</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/penjual.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="body-penjual">
<section id="sideMenu">
    <nav>
        <center><p>Hei <?= $_SESSION['user'] ?> !</p></center>
        <a href="index.php/home/homePenjual"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="index.php/user/showPenjual"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
        <a class="active" href="index.php/produk/tampilPenjualProduk"><i class="fa fa-shopping-bag"
                                                                         aria-hidden="true"></i> Produk</a>
        <a href="index.php/transaksi/showPenjualTransaksi"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Transaksi</a>
        <a href="index.php/home/hargaPenjual"><i class="fa fa-line-chart" aria-hidden="true"></i> Harga Pasar</a>
    </nav>
</section>
<header>
    <div class="search-penjual">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
    </div>
    <div class="penjual-field">
        <a href="logout.php">
            <div class="penjual-img"></div>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
</header>
<section id="content-area">
    <div class="heading">
        <br>
        <center><h1>Produk</h1></center>
        <br>
    </div>
    <div class="container">
        <table class="table" style="margin-top: 30px;">
            <tr>
                <th>No</th>
                <th>Nama Tanaman</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            foreach ($list as $item) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td hidden><?= $item['id_produk'] ?></td>
                    <td><?= $item['nama_produk'] ?></td>
                    <td><?= number_format($item['harga'], 0, ".", "."); ?></td>
                    <!--                    <td>--><? //= $item['harga'] ?><!--</td>-->
                    <td><?= $item['stok'] ?></td>
                    <td>
                        <a href="index.php/produk/tampilEditProduk/<?= $item['id_produk'] ?>"
                           class="btn btn-success" name="edit"><span class="fa fa-pencil-square-o"></span></a>
                        <a href="index.php/produk/detailPenjualProduk/<?= $item['id_produk'] ?>"
                           class="btn btn-primary"
                           name="detail"><span class="fa fa-eye"></span></a>
                        <a href="index.php/produk/hapusPenjualProduk/<?= $item['id_produk'] ?>"
                           class="btn btn-danger" name="detail" onclick="return confirm('apakah data akan dihapus?')">
                            <span class="fa fa-trash"></span></a>
                    </td>
                </tr>
                <?php
                $no++;
            } ?>
        </table>
    </div>
    <a href="index.php/produk/tampilPenjualTambahProduk">
        <div id="fab">
            <span class="fa fa-plus"></span>
        </div>
    </a>
</section>
</body>

</html>