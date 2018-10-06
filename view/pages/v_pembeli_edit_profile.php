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
            <a class="nav-link" href="?controller=home&action=homePembeli">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="v_pembeli_product.php">Product</a>
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
            <a class="nav-link" href="?controller=user&action=showPembeli"><?= $_SESSION['user'] ?></a>
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
                            <form method="post">
                                <input type="hidden" name="controller" value="register">
                                <input type="hidden" name="action" value="editPembeli">
                                <br>
                                <input type="text" name="nama" placeholder="Nama" value="<?= $item['nama'] ?>" required>
                                <hr>
                                <input type="text" name="email" placeholder="Email" value="<?= $item['email'] ?>"
                                       required>
                                <hr>
                                <input type="text" name="alamat" placeholder="Alamat" value="<?= $item['alamat'] ?>"
                                       required>
                                <hr>
                                <input type="text" name="notelp" placeholder="No Telp" value="<?= $item['no_telp'] ?>"
                                       required>
                                <hr>
                                <input type="text" name="username" placeholder="Username" value="<?= $item['username']?>" required>
                                <hr>
                                <input type="text" name="password" placeholder="Password" value="<?= $item['password']?>" required>
                                <hr>
                                <input type="submit" value="Update">
                                <br><br>
                            </form>
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