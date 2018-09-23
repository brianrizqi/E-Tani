<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">

</head>
<body class="body_login">
<div class="loginbox">
    <img src="resources/images/Logo.png" class="avatar">
    <h1>Masuk Disini</h1>
    <form method="post" id="formLogin">
        <input type="hidden" name="controller" value="login">
        <input type="hidden" name="action" value="auth">
        <p>Nama Pengguna</p>
        <input type="text" name="username" placeholder="Nama Pengguna" id="username" >
        <p>Kata Sandi</p>
        <input type="password" name="password" placeholder="Kata Sandi" id="password">
<!--        <center>--><?php //echo $error ?><!--</center>-->
        <input type="submit" value="Masuk">
        <a href="#">Forget Password</a>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $("#formLogin").submit(function(){
        var user = $("#username").val();
        var pass = $("#password").val();
        if (user == "" || pass == "") {
            alert("Mohon Di Isi!1!1");
        }
    });
</script>
</body>
</html>