<?php

class HomeController
{
    public function home()
    {
        $list = Produk::tampilSemuaProduk();
        require_once 'view/pages/home.php';
    }

    public function homeAdmin()
    {
        if (isset($_SESSION['user'])) {
            $list = Home::bacaHTML("localhost/E-tani/scraping.php");
            require_once("view/pages/v_admin.php");
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function homePenjual()
    {
        if (isset($_SESSION['user'])) {
            require_once('view/pages/v_penjual.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function homePembeli()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::tampilSemuaProduk();
            require_once('view/pages/v_pembeli.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function hargaPenjual()
    {
        if (isset($_SESSION['user'])) {
            $list = Home::bacaHTML("localhost/E-tani/scraping.php");
            require_once("view/pages/v_penjual_harga_pasar.php");
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }
}

?>