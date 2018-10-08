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
    <div class="form-regis-admin">
        <?php
        foreach ($list as $item) {
            ?>
            <form method="post">
                <input type="hidden" name="controller" value="register">
                <input type="hidden" name="action" value="editAdmin">
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
                <input type="text" name="password" placeholder="Password" required>
                <input type="submit" value="Update" name="regis">
            </form>
            <?php
        }
        ?>
    </div>
</section>
</body>

</html>