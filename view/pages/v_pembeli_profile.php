<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agri</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">
</head>
<body background="resources/images/banner.jpg" style="background-position: center">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php/home/homePembeli">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php/produk/tampilPembeliProduk">Product</a>
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
            <a class="nav-link" href="index.php/user/showPembeli"><?= $_SESSION['user'] ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>

<div class="container">
    <?php
    foreach ($list as $item) {

        ?>
        <center>
            <div class="col-md-4" style="margin-top: 20px">
                <br>
                <div class="panel panel-default" style="border:none; border-radius: 5px 5px 10px 10px;">
                    <div class="panel-heading" style="background-color: #526485; border: none;">
                        <header class="panel-title">
                            <div class="text-center">
                                <strong style="color: white;">Profile</strong>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body"
                         style="background-color: #242D3E; border-radius: 0px 0px 10px 10px; border: none;">
                        <div class="text-center" id="author">
                            <br>
                            <img src="resources/images/man.png" style="width: 190px; height: 180px;">
                            <br>
                            <br>
                            <h3 style="color: white;"><?php echo $item['nama']; ?></h3>
                            <small class="label label-warning" style="color: white;">Poin : <?= $item['poin'] ?></small>
                            <br><br>
                            <p style="color: white;">Alamat : <?=$item['alamat']?></p>
                            <p style="color: white;">No Telp : <?=$item['no_telp']?></p>
                            <a href="index.php/user/editPembeli" class="btn btn-primary" style="width: 100px">Edit</a>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </center>
        <?php
    }
    ?>
</div>
</body>
</html>