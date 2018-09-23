<?php

class UserController
{
    public function regisAdmin()
    {
        if (isset($_SESSION['user'])) {
            $list = User::showAllUser();
            require_once('view/pages/v_admin_regis.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function showUser()
    {
        if (isset($_SESSION['user'])) {
            $list = User::showUser($_SESSION['id_user']);
            require_once('view/pages/v_admin_profile.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function showPenjual()
    {
        if (isset($_SESSION['user'])) {
            $list = User::showUser($_SESSION['id_user']);
            require_once('view/pages/v_penjual_profile.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function showPembeli()
    {
        if (isset($_SESSION['user'])) {
            $list = User::showUser($_SESSION['id_user']);
            require_once('view/pages/v_pembeli_profile.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }
    public function editPenjual(){
        if (isset($_SESSION['user'])) {
            $list = User::showUser($_SESSION['id_user']);
            require_once('view/pages/v_penjual_edit_profile.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }
    public function editAdmin(){
        if (isset($_SESSION['user'])) {
            $list = User::showUser($_SESSION['id_user']);
            require_once('view/pages/v_admin_edit_profile.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }
    public function editPembeli(){
        if (isset($_SESSION['user'])) {
            $list = User::showUser($_SESSION['id_user']);
            require_once('view/pages/v_pembeli_edit_profile.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

}


?>