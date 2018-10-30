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
//            header('location:http://localhost/E-Tani/index.php/register/register');
            require_once ('view/pages/v_register.php');
        } else if ($User == 1) {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function regisPetani()
    {
        require_once('view/pages/v_admin_add_user.php');
    }

    public function createPetani()
    {
//        $User = Register::createPetani($_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']);
//        header("Location: http://localhost/E-Tani/index.php/user/regisAdmin");
        if ($User = Register::createPembeli($_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']
                , $_POST['level']) == 0) {
            ?>
            <script>
                alert("nama pengguna telah ada");
            </script>
            <?php
//            header('location:http://localhost/E-Tani/index.php/register/register');
            require_once ('view/pages/v_register.php');
        } else if ($User = Register::createPembeli($_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']
                , $_POST['level']) == 1) {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function editPenjual()
    {
        $User = Register::editPenjual($_SESSION['id_user'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']);
        header("Location: http://localhost/E-Tani/index.php/user/showPenjual");
    }

    public function editAdmin()
    {
        $User = Register::editAdmin($_SESSION['id_user'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']);
        header("Location: index.php?controller=user&action=showUser");
    }

    public function editPembeli()
    {
        $User = Register::editAdmin($_SESSION['id_user'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['username'], md5($_POST['password']), $_POST['notelp']);
        header("Location: index.php?controller=user&action=showPembeli");
    }
}

?>