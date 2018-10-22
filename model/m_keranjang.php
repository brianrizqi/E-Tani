<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 17/10/2018
 * Time: 14:20
 */

require_once 'init.php';

class Keranjang
{
    public static function showCart($id_produk)
    {
        global $con;
        $id = implode(",", $id_produk);
        $list = [];
        for ($i = 0; $i < count($_SESSION["id_produk"]); $i++) {
            $sql = "SELECT * FROM produk p JOIN users u on p.id_user=u.id_user
				where id_produk=" . $_SESSION['id_produk'][$i];
            $result = mysqli_query($con, $sql);
            foreach ($result as $item) {
                $list[$i] = array(
                    'id_produk' => $item['id_produk'],
                    'nama_produk' => $item['nama_produk'],
                    'harga' => $item['harga'],
                    'stok' => $item['stok'],
                    'gambar' => $item['gambar'],
                    'jumlahBeli' => $_SESSION["jumlah"][$i],
                    'penjual' => $item['nama'],
                );
            }
        }
        return $list;
    }

    public static function showPoin($id_user)
    {
        global $con;
        $sql = "select * from users where id_user = $id_user";
        $result = mysqli_query($con, $sql);
        $poin = 0;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $poin = $row['poin'];
        }
        return $poin;
    }


    public static function bayarCart($id_user, $id_produk, $jumlah)
    {
        global $con;
        $sql1 = "INSERT INTO transaksi (id_user,tanggal,verif,bukti) 
		VALUES ('$id_user',curdate(),0,NULL)";
        $result1 = mysqli_query($con, $sql1);
        $sql2 = ("SELECT * from transaksi where id_user=$id_user order by id_transaksi DESC LIMIT 0,1");
        $result2 = mysqli_query($con, $sql2);
        $id_transaksi = 0;
        if (mysqli_num_rows($result2) > 0) {
            $row = mysqli_fetch_assoc($result2);
            $id_transaksi = $row['id_transaksi'];
        }
        for ($i = 0; $i < count($_SESSION['id_produk']); $i++) {
            $sql3 = "INSERT INTO `detail_transaksi`(`id_produk`, `id_transaksi`, `jumlah`, `total_harga`, `tanggal`)
			VALUES (" . $_SESSION['id_produk'][$i] . ",$id_transaksi," . $_SESSION['jumlah'][$i] . ",(SELECT harga from produk where id_produk=" . $_SESSION['id_produk'][$i] . ")*" . $_SESSION['jumlah'][$i] . ",curdate())";
            $result3 = mysqli_query($con, $sql3);
        }
        unset($_SESSION['id_produk']);
        unset($_SESSION['jumlah']);
        return $result3;
    }
}

?>