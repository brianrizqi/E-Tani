<?php

class RegisterController
{
    public function register()
    {
        require_once('view/pages/v_register.php');
    }

    public function createPembeli()
    {
        $User = Register::createPembeli($_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']
            , $_POST['level']);
        if ($User == 0) {
            ?>
            <script>
                alert("nama pengguna telah ada");
            </script>
            <?php
//            header('location:http://helloworlds.me/E-Tani/index.php/register/register');
            require_once('view/pages/v_register.php');
        } else if ($User == 1) {
            header("location: http://helloworlds.me/E-Tani/index.php?controller=login&action=login");
        }
    }

    public function regisPetani()
    {
        require_once('view/pages/v_admin_add_user.php');
    }

    public function createPetani()
    {
        if ($User = Register::createPembeli($_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']
                , $_POST['level']) == 0) {
            ?>
            <script>
                alert("nama pengguna telah ada");
            </script>
            <?php
            require_once('view/pages/v_register.php');
        } else if ($User = Register::createPembeli($_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']
                , $_POST['level']) == 1) {
            header("location: http://helloworlds.me/E-Tani/index.php?controller=login&action=login");
        }
    }

    public function editPenjual()
    {
        $User = User::editPenjual($_SESSION['id_user'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']);
        header("Location: index.php?controller=user&action=showPenjual");
    }

    public function editAdmin()
    {
        $User = User::editAdmin($_SESSION['id_user'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']);
        header("Location: index.php?controller=user&action=showUser");
    }

    public function editPembeli()
    {
        $User = User::editAdmin($_SESSION['id_user'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']);
        header("Location: index.php?controller=user&action=showPembeli");
    }
}

?>