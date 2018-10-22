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
        <a class="active" href="index.php/produk/tampilPenjualProduk"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Produk</a>
        <a href="index.php/transaksi/showPenjualTransaksi"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Transaksi</a>
        <a href="index.php/home/hargaPenjual"><i class="fa fa-line-chart" aria-hidden="true"></i> Harga Pasar</a>
    </nav>
</section>
<header>
    <div class="search-penjual">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
    </div>
    <div class="penjual-field">
        <a href="#" class="notification">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
            <span class="circle-bell">3</span></a>
        <a href="logout.php">
            <div class="penjual-img"></div>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
</header>
<section id="content-area">
    <div class="heading">
    </div>
    <div class="form-tanam-penjual">
        <?php
        foreach ($list as $item) {
            ?>
            <form enctype="multipart/form-data" method="post">
                <input type="hidden" name="controller" value="produk">
                <input type="hidden" name="action" value="editPenjualProduk">
                <input type="hidden" name="id_produk" value="<?= $item['id_produk']?>">
                <p>Nama Produk</p>
                <select name="nama_produk">
                    <option value="<?=$item['nama_produk']?>"><?=$item['nama_produk']?></option>
                    <option value="beras">Beras</option>
                    <option value="jagung">Jagung</option>
                    <option value="kedelai">Kedelai</option>
                    <option value="cabe">Cabai</option>
                    <option value="bawangmerah">Bawang Merah</option>
                    <option value="bawangputih">Bawang Putih</option>
                    <option value="kacanghijau">Kacang Hijau</option>
                    <option value="kacangtanah">Kacang Tanah</option>
                    <option value="kol">Kol</option>
                    <option value="tomat">Tomat</option>
                    <option value="wortel">Wortel</option>
                    <option value="buncis">Buncis</option>
                </select>
                <p>Harga</p>
                <input type="number" name="harga" placeholder="Harga Produk" value="<?= $item['harga'] ?>">
                <p>Stok</p>
                <input type="number" name="stok" placeholder="Stok Tanaman" value="<?= $item['stok'] ?>">
                <input name="foto_produk" type="file" value="">
                <input type="submit" name="input" value="Edit">
            </form>
            <?php
        }
        ?>
    </div>
</section>
</body>

</html>