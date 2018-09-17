<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/admin.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="body-admin">
<section id="sideMenu">
    <nav>
        <a href="?controller=home&action=homeAdmin"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class="active" href="?controller=produk&action=verifAdmin"><i class="fa fa-check-square-o" aria-hidden="true"></i> Verification</a>
        <a href="?controller=user&action=regisAdmin"><i class="fa fa-address-card" aria-hidden="true"></i> Registrasi</a>
    </nav>
</section>
<header>
    <div class="search-admin">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
    </div>
    <div class="admin-field">
        <a href="#" class="notification">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
            <span class="circle-bell">3</span></a>
        <a href="logout.php">
            <div class="admin-img"></div>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
</header>

<section id="content-area">
    <div class="heading">
        <br>
        <center><h1>Verification</h1></center>
        <br>
    </div>
    <div class="container">
        <table class="table" style="margin-top: 30px;">
            <tr>
                <th>No</th>
                <th>Nama Penjual</th>
                <th>Nama Tanaman</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            foreach ($list as $item){
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td hidden><?= $item['id_produk'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['nama_tanaman'] ?></td>
                    <td><?= "Rp. " . number_format($item['harga'], 0, ".", ".") ?></td>
                    <td><?= $item['stok'] ?></td>
                    <?php
                    $verif;
                    switch ($item['verif_produk']) {
                        case 0:
                            $verif = "Belum Verif";
                            break;
                        case 1:
                            $verif = "Verif";
                            break;
                    }
                    ?>
                    <td><?= $verif ?></td>
                    <td>
                        <a href="?controller=produk&action=verifAdminProduk&id_produk=<?= $item['id_produk'] ?>"
                           class="btn btn-success" name="verif_produk"><span class="fa fa-check-square-o"></span></a>
                        <a href="?controller=produk&action=detailAdminProduk&id_produk=<?= $item['id_produk'] ?>"
                           class="btn btn-primary"><span class="fa fa-eye"></span></a>
                    </td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </table>
    </div>

</section>

</body>

</html>