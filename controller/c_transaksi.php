<?php

class TransaksiController
{
    public function showAdmin()
    {
        if (isset($_SESSION['user'])) {
            $list = Transaksi::showTransaksiAdmin();
            require_once("view/pages/v_admin_verif.php");
        } else {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function showDetailAdmin()
    {
        if (isset($_SESSION['user'])) {
            $list = Transaksi::detailTransaksiAdmin($_GET['id_transaksi']);
            $bukti = Transaksi::detailBuktiAdmin($_GET['id_transaksi']);
            require_once("view/pages/v_admin_detail_transaksi.php");
        } else {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function showPenjualTransaksi()
    {
        if (isset($_SESSION['user'])) {
            $list = Transaksi::showTransaksiPenjual($_SESSION['id_user']);
            require_once("view/pages/v_penjual_transaksi.php");
        } else {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function showPembeliTransaksi()
    {
        if (isset($_SESSION['user'])) {
            $list = Transaksi::showTransaksiPembeli($_SESSION['id_user']);
            require_once("view/pages/v_pembeli_transaksi.php");
        } else {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function uploadTransaksi()
    {
        if (isset($_SESSION['user'])) {
            require_once("view/pages/v_pembeli_upload_bukti.php");
        } else {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function showDetailTransaksi()
    {
        if (isset($_SESSION['user'])) {
            $list = Transaksi::showDetailTransaksi($_GET['id_transaksi']);
            require_once("view/pages/v_pembeli_detail_transaksi.php");
        } else {
            header("location:index.php?controller=login&action=login");
        }
    }

    public function uploadBukti()
    {
        $foto = $_FILES['bukti']['name'];
        $tmp = $_FILES['bukti']['tmp_name'];
        $gambar = date('dmYHis') . $foto;
        $path = "bukti/" . $gambar;
        if (move_uploaded_file($tmp, $path)) {
            $keranjang = Transaksi::uploadBukti($_GET['id_transaksi'], $gambar);
            header("Location:?controller=transaksi&action=showPembeliTransaksi");
        }
    }

    public function verifAdmin()
    {
        $list = Transaksi::verifAdmin($_GET['id_transaksi']);
        header("location:index.php?controller=transaksi&action=showAdmin");
    }

    public function deleteTransaksi()
    {
        $list = Transaksi::deleteTransaksi($_GET['id_transaksi']);
        header("location:index.php?controller=transaksi&action=showAdmin");
    }
}

?>