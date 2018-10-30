<html>
<head>
    <title>Dashboard penjual</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/penjual.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="body-penjual">
<section id="sideMenu">
    <nav>
        <center><p>Hei <?= $_SESSION['user']; ?> !</p></center>
        <a href="?controller=home&action=homePenjual"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class="active" href="?controller=user&action=showPenjual"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
        <a href="?controller=produk&action=tampilPenjualProduk"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Produk</a>
        <a href="?controller=transaksi&action=showPenjualTransaksi"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Transaksi</a>
        <a href="?controller=home&action=hargaPenjual"><i class="fa fa-line-chart" aria-hidden="true"></i> Harga Pasar</a>
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
    <div class="form-tanam-penjual">
        <?php
        foreach ($list as $item) {
            ?>
            <form method="post">
                <input type="hidden" name="controller" value="register">
                <input type="hidden" name="action" value="editPenjual">
                <p>Nama</p>
                <input type="text" name="nama" placeholder="Nama" value="<?= $item['nama'] ?>" required>
                <p>Email</p>
                <input type="text" name="email" placeholder="Email" value="<?= $item['email'] ?>" required>
                <p>Alamat</p>
                <input type="text" name="alamat" placeholder="Alamat" value="<?= $item['alamat'] ?>" required autofocus>
                <p>No Telp</p>
                <input type="text" name="notelp" placeholder="No telpon" value="<?= $item['no_telp'] ?>" required>
                <p>Username</p>
                <input type="text" name="username" placeholder="Username" value="<?= $item['username'] ?>" required
                       autofocus>
                <p>Password</p>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Update" name="regis">
            </form>
            <?php
        }
        ?>
    </div>
</section>
</body>

</html>