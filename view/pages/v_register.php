<html>
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">
</head>
<body class="body_regis">
<div class="regis-box">
    <div class="regis-left-box">
        <h1>Daftar</h1>
        <form method="post">
            <input type="hidden" name="controller" value="register">
            <input type="hidden" name="action" value="createPembeli">
            <input type="text" name="nama" placeholder="Nama">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="alamat" placeholder="Alamat">
            <input type="text" name="username" placeholder="Nama Pengguna">
            <input type="password" name="password" placeholder="Kata Sandi">
            <input type="submit" name="regis" value="Daftar">
        </form>
    </div>
    <div class="regis-right-box">
        <span class="signinwith"> Masuk dengan <br> Media Sosial
        </span>

        <button class="social facebook" name="facebook">Masuk dengan Facebook</button>
        <button class="social google-plus" name="facebook">Masuk dengan Google+</button>
        <button class="social twitter" name="facebook">Masuk dengan Twitter</button>
    </div>
    <div class="or">OR</div>
</div>

</body>
</html>