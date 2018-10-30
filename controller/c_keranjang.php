<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 17/10/2018
 * Time: 14:20
 */

class KeranjangController
{
    public function showCartPembeli()
    {
        if (isset($_SESSION['user'])) {
            if (array_key_exists('id_produk', $_SESSION) && !empty($_SESSION['id_produk'])) {
                $list = Keranjang::showCart($_SESSION['id_produk']);
            }
            $poin = Keranjang::showPoin($_SESSION['id_user']);
            require_once("view/pages/v_pembeli_cart.php");
        } else {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function tambahCart()
    {
        $_SESSION['id_produk'][] = $_GET['id_produk'];
        $_SESSION['jumlah'][] = $_GET['jumlah'];
        header('location:?controller=keranjang&action=showCartPembeli');
    }

    public function hapusCart()
    {
        unset($_SESSION['id_produk']);
        unset($_SESSION['jumlah']);
        header("location:index.php?controller=home&action=homePembeli");
    }

    public function bayarCart()
    {
        $koin = $_POST['koin'];
        $id_produk = $_SESSION["id_produk"];
        $jumlah = $_SESSION["jumlah"];
        $id_user = $_SESSION["id_user"];
        $list = Keranjang::bayarCart($id_user, $id_produk, $jumlah, $koin);
        header("location:index.php?controller=transaksi&action=showPembeliTransaksi");
    }
}

?>