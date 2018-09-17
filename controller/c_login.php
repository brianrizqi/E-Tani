<?php

class LoginController
{
    public function login()
    {
        require_once('view/pages/v_login.php');
    }
    public function auth(){
        if (Login::cekAkun($_POST['username'],$_POST['password'])==0){
            $error = "username / password salah";
            require_once ('view/pages/v_login.php');
        } else if (Login::cekAkun($_POST['username'],$_POST['password'])==1){
            $_SESSION['user'] = $_POST['username'];
            header("Location:index.php?controller=home&action=homeAdmin");
        } else if (Login::cekAkun($_POST['username'],$_POST['password'])==2){
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['a'] = $_SESSION['id_user'];
            header("Location:index.php?controller=home&action=homePenjual");
        } else if (Login::cekAkun($_POST['username'],$_POST['password'])==3){
            $_SESSION['user'] = $_POST['username'];
            header("Location:index.php?controller=home&action=homePembeli");
        }
    }

}

?>