<?php
/**
 * Created by PhpStorm.
 * User: Brian R
 * Date: 08/10/2018
 * Time: 21:39
 */

class Transaksi
{
    public static function showTransaksiPembeli($id_user)
    {
        global $con;
        $list = [];
        $sql = "SELECT * from transaksi where id_user=$id_user";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_transaksi' => $item['id_transaksi'],
                'tanggal' => $item['tanggal'],
                'verif' => $item['verif'],
                'bukti' => $item['bukti']
            );
        }
        return $list;
    }

    public static function showDetailTransaksi($id_transaksi)
    {
        global $con;
        $list = [];
        $sql = "SELECT p.nama_produk,dp.jumlah,dp.total_harga,dp.tanggal FROM detail_transaksi dp
		JOIN produk p on dp.id_produk=p.id_produk
		WHERE id_transaksi=$id_transaksi";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'nama_produk' => $item['nama_produk'],
                'total_harga' => $item['total_harga'],
                'tanggal' => $item['tanggal'],
                'jumlah' => $item['jumlah']
            );
        }
        return $list;
    }

    public static function uploadBukti($id_transaksi, $gambar)
    {
        global $con;
        $sql = "UPDATE `transaksi` SET `bukti`='$gambar' WHERE id_transaksi = $id_transaksi";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    public static function detailBuktiAdmin($id_transaksi)
    {
        global $con;
        $list = [];
        $sql = "select bukti from transaksi where id_transaksi = $id_transaksi";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'bukti' => $item['bukti']
            );
        }
        return $list;
    }

    public static function detailTransaksiAdmin($id_transaksi)
    {
        global $con;
        $list = [];
        $sql = "SELECT alamat, p.nama_produk,dt.jumlah,dt.total_harga,t.bukti,dt.tanggal,nama FROM detail_transaksi dt
		JOIN produk p on dt.id_produk=p.id_produk JOIN users u on p.id_user=u.id_user join transaksi t on
		t.id_transaksi = dt.id_transaksi
		WHERE dt.id_transaksi=$id_transaksi";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'nama_produk' => $item['nama_produk'],
                'total_harga' => $item['total_harga'],
                'tanggal' => $item['tanggal'],
                'jumlah' => $item['jumlah'],
                'nama' => $item['nama'],
                'bukti' => $item['bukti'],
                'alamat' => $item['alamat']
            );
        }
        return $list;
    }

    public static function showTransaksiAdmin()
    {
        global $con;
        $list = [];
        $sql = "SELECT id_transaksi,u.nama,tanggal,verif,bukti from transaksi t 
		JOIN users u ON t.id_user=u.id_user";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_transaksi' => $item['id_transaksi'],
                'nama' => $item['nama'],
                'tanggal' => $item['tanggal'],
                'verif' => $item['verif'],
                'bukti' => $item['bukti'],
            );
        }
        return $list;
    }

    public static function verifAdmin($id_transaksi)
    {
        global $con;
        $id_produk = array();
        $jumlah = array();
        $status = 0;
        $sql2 = "SELECT * FROM detail_transaksi WHERE id_transaksi=$id_transaksi";
        $result2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $id_produk[] = $row['id_produk'];
                $jumlah[] = $row['jumlah'];
            }
        }
        $sql3 = "select * from transaksi where id_transaksi = $id_transaksi";
        $result3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($result3) > 0) {
            while ($row = mysqli_fetch_assoc($result3)) {
                $status = $row['verif'];
            }
        }
        if ($status == 0) {
            for ($i = 0; $i < count($jumlah); $i++) {
                $sql4 = "update produk set stok = stok-$jumlah[$i] where id_produk = $id_produk[$i]";
                $result4 = mysqli_query($con, $sql4);
            }
        }
        $sql = "update transaksi set verif = 1 where id_transaksi = $id_transaksi";
        $result = mysqli_query($con, $sql);
        return $result4;
    }

    public static function showTransaksiPenjual($id_user)
    {
        global $con;
        $sql = "SELECT p.nama_produk,dp.jumlah,dp.total_harga,dp.tanggal,
		(SELECT verif FROM transaksi WHERE id_transaksi=dp.id_transaksi) as verif,
		(SELECT u.nama FROM transaksi o JOIN users u ON o.id_user=u.id_user 
		WHERE id_transaksi=dp.id_transaksi) as pembeli,(SELECT u.alamat FROM transaksi o JOIN users u ON o.id_user=u.id_user 
		WHERE id_transaksi=dp.id_transaksi) as alamat FROM detail_transaksi dp
		JOIN produk p on dp.id_produk=p.id_produk join users u ON p.id_user=u.id_user
		WHERE p.id_user= $id_user";
        $result = mysqli_query($con, $sql);
        $list = [];
        foreach ($result as $item) {
            $list[] = array(
                'nama_produk' => $item['nama_produk'],
                'total_harga' => $item['total_harga'],
                'tanggal' => $item['tanggal'],
                'jumlah' => $item['jumlah'],
                'verif' => $item['verif'],
                'pembeli' => $item['pembeli'],
                'alamat' => $item['alamat']
            );
        }
        return $list;
    }

    public static function deleteTransaksi($id_transaksi)
    {
        global $con;
        $sql1 = "select bukti from transaksi where id_transaksi = $id_transaksi";
        $result1 = mysqli_query($con, $sql1);
        $bukti = "";
        if (mysqli_num_rows($result1)) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $bukti = $row['bukti'];
            }
        }
        unlink('bukti/' . $bukti);
        $sql = "delete from transaksi where id_transaksi = $id_transaksi";
        $result = mysqli_query($con, $sql);
        return $result;
    }

}

?>