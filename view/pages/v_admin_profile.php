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
        <a href="index.php/home/homeAdmin"><i class="fa fa-home" aria-hidden="true"></i>
            Home</a>
        <a href="index.php/user/regisAdmin"><i class="fa fa-address-card" aria-hidden="true"></i>
            Daftar</a>
        <a class="active" href="index.php/user/showUser"><i class="fa fa-address-card" aria-hidden="true"></i> Profile</a>
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
    <div class="container">
        <?php
        foreach ($list as $item) {

            ?>
            <center>
                <div class="col-md-4" >
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
                                <a href="index.php/user/editAdmin" class="btn btn-primary" style="width: 100px">Edit</a>
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
</section>
</body>

</html>