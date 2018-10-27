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
            <input type="text" name="nama" placeholder="Nama" required max="50">
            <input type="email" name="email" placeholder="Email" required max="50">
            <input type="text" name="alamat" placeholder="Alamat" required max="255">
            <input type="number" name="notelp" placeholder="No Telp" required max="12">
            <input type="text" name="username" placeholder="Nama Pengguna" required max="50">
            <input type="password" name="password" placeholder="Kata Sandi" required max="50">
            <input type="radio" name="level" value="3" checked> Pembeli
            <input type="radio" name="level" value="2"> Petani
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