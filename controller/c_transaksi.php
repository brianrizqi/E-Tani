<?php

class TransaksiController
{
    public function showPenjualTransaksi()
    {
        if (isset($_SESSION['user'])) {
            require_once("view/pages/v_penjual_transaksi.php");
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }
}

?>