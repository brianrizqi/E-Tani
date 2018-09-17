<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/admin.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="body-admin">
<section id="sideMenu">
    <nav>
        <a href="?controller=home&action=homeAdmin"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class="active" href="?controller=user&action=regisAdmin"><i class="fa fa-address-card" aria-hidden="true"></i> Daftar</a>
        <a href="?controller=user&action=showUser"><i class="fa fa-address-card" aria-hidden="true"></i> Profile</a>
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
        <center><h1>Registrasi</h1></center>
        <br>
    </div>
    <div class="container">
        <table class="table" style="margin-top: 30px;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
            </tr>
            <?php
            $no = 1;
            foreach ($list as $item) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td hidden><?= $item['id_user'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <?php
                    $jabatan;
                    switch ($item['level']){
                        case 1:
                            $jabatan = "Admin";
                            break;
                        case 2:
                            $jabatan = "Penjual";
                            break;
                        case 3:
                            $jabatan = "Pembeli";
                            break;
                    }
                    ?>
                    <td><?= $jabatan?></td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </table>
    </div>
    <a href="?controller=register&action=regisPetani">
        <div id="fab">
            <span class="fa fa-plus"></span>
        </div>
    </a>
</section>
</body>

</html>