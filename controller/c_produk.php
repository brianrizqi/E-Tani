<?php

class ProdukController
{
    public function verifAdmin()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::tampilAdminProduk();
            require_once('view/pages/v_admin_verif.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function verifAdminProduk()
    {
        if ($_SESSION['user']) {
            $list = Produk::verifAdminProduk($_GET['id_produk']);
            header("Location: ?controller=produk&action=verifAdmin");
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function detailAdminProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::detailAdminProduk($_GET['id_produk']);
            require_once('view/pages/v_admin_detail_produk.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function tampilPenjualProduk()
    {
        if (isset($_SESSION['user'])) {
//            $list = Produk::tampilPenjualProduk($_SESSION['id_user']);
            require_once('view/pages/v_penjual_produk.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function tampilPenjualTambahProduk()
    {
        if (isset($_SESSION['user'])) {
            require_once('view/pages/v_penjual_add_produk.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function tambahPenjualProduk()
    {
        $foto = $_FILES['foto_produk']['name'];
        $tmp = $_FILES['foto_produk']['tmp_name'];
        $gambar = date('dmYHis') . $foto;
        $path = "gambar/" . $gambar;
        if (move_uploaded_file($tmp, $path)) {
            $produk = Produk::tambahPenjualProduk($_SESSION['id_user'], $_POST['nama_produk'], $_POST['stok']
                , $_POST['harga'], $gambar);
            header("Location: index.php?controller=produk&action=tampilPenjualProduk");
        }
    }

    public function semuaProduk()
    {
        $list = Produk::semuaProduk();
        require_once('view/pages/v_product.php');
    }

    public function detailPenjualProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::detailPenjualProduk($_GET['id_produk']);
            require_once('view/pages/v_penjual_detail_produk.php');
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function hapusPenjualProduk()
    {
        if (isset($_SESSION['user'])) {
            $hapus = Produk::hapusPenjualProduk($_GET['id_produk']);
            header("Location: index.php?controller=produk&action=tampilPenjualProduk");
        } else {
            header('location:index.php?controller=login&action=login');
        }
    }

    public function tampilPenjualDetailProduk()
    {
        $list = Produk::tampilPembeliDetailProduk($_GET['id_produk']);
        require_once('view/pages/v_detail_product.php');
    }
}

?>