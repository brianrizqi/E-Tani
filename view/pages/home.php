<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agri</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php/home/home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php/produk/semuaProduk">Produk</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php/register/register">Daftar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php/login/login">Masuk</a>
        </li>
    </ul>
</nav>
<div id="banner">
    <div class="center">

        <h1>Selamat Datang di E-Tani</h1>
        <h2>Apakah anda ingin membeli?</h2>
        <a href="index.php/produk/semuaProduk" class="btn-link">mari belanja</a>

    </div>

</div>

<div class="container">
    <div class="row">
        <?php
        foreach ($list as $item){
            ?>
            <div class="col-sm-3">
                <div class="card_home">
                    <div class="card" style="width:250px">
                        <img class="card-img-top" src="gambar/<?=$item['gambar']?>" alt="Card image" style="height: 250px">
                        <div class="card-body">
                            <h4 class="card-title"><?=$item['nama_produk'] ?></h4>
                            <p class="card-text"><?="Rp. ".number_format($item['harga'],0,".",".")?></p>
                            <a href="index.php/login/login" class="btn btn-success">Buy</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>
