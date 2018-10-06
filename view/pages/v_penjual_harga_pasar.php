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
        <center><p>Hei <?= $_SESSION['user']; ?> !</p></center>
        <a href="?controller=home&action=homePenjual"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="?controller=user&action=showPenjual"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
        <a href="?controller=produk&action=tampilPenjualProduk"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Produk</a>
        <a href="?controller=transaksi&action=showPenjualTransaksi"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Transaksi</a>
        <a class="active" href="?controller=home&action=hargaPenjual"><i class="fa fa-line-chart" aria-hidden="true"></i> Harga Pasar</a>
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
    <?php
    foreach ($list as $item) {
        ?>
        <h2>Beras : <?=$item['beras']?></h2>
        <h2>Jagung : <?=$item['jagung']?></h2>
        <h2>Kedelai : <?=$item['kedelai']?></h2>
        <h2>Cabe : <?=$item['cabe']?></h2>
        <h2>Bawang Merah : <?=$item['bawangmerah']?></h2>
        <h2>Bawang Putih : <?=$item['bawangputih']?></h2>
        <h2>Kacang Tanah : <?=$item['kacanghijau']?></h2>
        <h2>Kacang Hijau : <?=$item['kacangtanah']?></h2>
        <h2>Kol : <?=$item['kol']?></h2>
        <h2>Tomat : <?=$item['tomat']?></h2>
        <h2>Wortel : <?=$item['wortel']?></h2>
        <h2>Buncis : <?=$item['buncis']?></h2>
        <?php
    }

    ?>
</section>
</body>

</html>