<?php

class LoginController
{
    public function login()
    {
        require_once('view/pages/v_login.php');
    }
    public function auth(){
        if (Login::cekAkun($_POST['username'],$_POST['password'])==0){
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
                alert("Username / Password salah");
            </script>
            <?php
            require_once ('view/pages/v_logign.php');
        } else if (Login::cekAkun($_POST['username'],$_POST['password'])==1){
            Login::showNotif();
            $_SESSION['user'] = $_POST['username'];
            header("Location:http://localhost/E-Tani/index.php?controller=home&action=homeAdmin");
//            header("Location: http://localhost/E-Tani/index.php/home/homeAdmin");
        } else if (Login::cekAkun($_POST['username'],$_POST['password'])==2){
            $_SESSION['user'] = $_POST['username'];
//            header("Location:index.php?controller=home&action=homePenjual");
            header("Location: http://localhost/E-Tani/index.php/home/homePenjual");
        } else if (Login::cekAkun($_POST['username'],$_POST['password'])==3){
            $_SESSION['user'] = $_POST['username'];
            header("Location:http://localhost/E-Tani/index.php?controller=home&action=homePembeli");
//            header("Location: http://localhost/E-Tani/index.php/home/homePembeli");
        }
    }

}

?>