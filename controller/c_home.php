<?php

class HomeController
{
    public function home()
    {
//        $list = Produk::tampilSemuaProduk();
        require_once 'view/pages/home.php';
    }

    public function homeAdmin()
    {
        if (isset($_SESSION['user'])) {
//            $html = ("localhost/agri_web/scraping.php");
//            $list = Home::bacaHTML("localhost/agri_web/scraping.php");
            require_once("view/pages/v_admin.php");
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function homePenjual()
    {
        if (isset($_SESSION['user'])) {
            require_once('view/pages/v_penjual.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }
    public function homePembeli(){
        if (isset($_SESSION['user'])){
//            $list = Produk::tampilSemuaProduk();
            require_once ('view/pages/v_pembeli.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }
}

?>