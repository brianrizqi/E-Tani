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
            <a class="nav-link" href="?controller=produk&action=semuaProduk">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="v_contact.php">Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="v_contact.php">Transaksi</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link"><?= $_SESSION['user'] ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>
<div class="product-card">
    <?php
    foreach ($list as $item) {
    ?>
    <div class="product-stock">Stok : <?= $item['stok'] ?></div>
    <div class="product-image">
        <img src="gambar/<?= $item['gambar'] ?>" alt="">
    </div>
    <div class="product-details">
        <span class="product-seller">Penjual : <?= $item['nama'] ?></span>
        <h4><a href=""><?= $item['nama_produk'] ?></a></h4>
        <br>
        <div class="product-bottom-details">
            <div class="product-price">Rp. <?= number_format($item['harga'], 0, ".", ".") ?>/kg</div>
            <div class="product-value">
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
            </div>
        </div>
        <?php } ?>
        <a href="v_pembeli.php" class="btn btn-primary">BELI</a>
    </div>
</div>
</body>
</html>