<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/admin.scss">
    <link rel="stylesheet" type="text/css" href="resources/scss/admin.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="body-admin">
<section id="sideMenu">
    <nav>
        <a class="active" href="?controller=home&action=homeAdmin"><i class="fa fa-home" aria-hidden="true"></i>
            Home</a>
        <a href="?controller=user&action=regisAdmin"><i class="fa fa-address-card" aria-hidden="true"></i>
            Daftar</a>
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
<!--    --><?php
//    foreach ($list as $item) {
//        ?>
<!--        <h2>Beras : --><?//=$item['beras']?><!--</h2>-->
<!--        <h2>Jagung : --><?//=$item['jagung']?><!--</h2>-->
<!--        <h2>Kedelai : --><?//=$item['kedelai']?><!--</h2>-->
<!--        <h2>Cabe : --><?//=$item['cabe']?><!--</h2>-->
<!--        <h2>Bawang Merah : --><?//=$item['bawangmerah']?><!--</h2>-->
<!--        <h2>Bawang Putih : --><?//=$item['bawangputih']?><!--</h2>-->
<!--        <h2>Kacang Tanah : --><?//=$item['kacanghijau']?><!--</h2>-->
<!--        <h2>Kacang Hijau : --><?//=$item['kacangtanah']?><!--</h2>-->
<!--        <h2>Kol : --><?//=$item['kol']?><!--</h2>-->
<!--        <h2>Tomat : --><?//=$item['tomat']?><!--</h2>-->
<!--        <h2>Wortel : --><?//=$item['wortel']?><!--</h2>-->
<!--        <h2>Buncis : --><?//=$item['buncis']?><!--</h2>-->
<!--        --><?php
//    }
//
//    ?>
</section>
</body>

</html>