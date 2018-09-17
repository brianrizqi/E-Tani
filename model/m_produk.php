<?php
require_once 'init.php';

Class Produk
{
    public static function tampilSemuaProduk()
    {
        global $con;
        $list = [];
        $sql = "select * from produk p join tanam t on p.id_tanam = t.id_tanam 
where verif_produk = 1 order by p.id_produk desc limit 0,4";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama_tanaman' => $item['nama_tanaman'],
                'harga' => $item['harga'],
                'gambar' => $item['gambar']
            );
        }
        return $list;
    }

    public static function semuaProduk()
    {
        global $con;
        $list = [];
        $sql = "select * from produk p join tanam t on p.id_tanam = t.id_tanam join users u on t.id_user = u.id_user 
where verif_produk = 1 order by p.id_produk desc";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama_tanaman' => $item['nama_tanaman'],
                'harga' => $item['harga'],
                'gambar' => $item['gambar'],
                'nama' => $item['nama']
            );
        }
        return $list;
    }

    public static function tampilPenjualProduk($id_user)
    {
        global $con;
        $list = [];
        $sql = "select * from produk p join tanam t on p.id_tanam = t.id_tanam where t.id_user = $id_user";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama_tanaman' => $item['nama_tanaman'],
                'harga' => $item['harga'],
                'stok' => $item['stok'],
                'verif_produk' => $item['verif_produk']
            );
        }
        return $list;
    }

    public static function tampilAdminProduk()
    {
        global $con;
        $list = [];
        $sql = "select * from produk p join tanam t on p.id_tanam = t.id_tanam
join users u on t.id_user = u.id_user";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'harga' => $item['harga'],
                'nama' => $item['nama'],
                'nama_tanaman' => $item['nama_tanaman'],
                'stok' => $item['stok'],
                'verif_produk' => $item['verif_produk']
            );
        }
        return $list;
    }

    public static function detailAdminProduk($id_produk)
    {
        global $con;
        $list = [];
        $sql = "select * from produk p join tanam t on p.id_tanam = t.id_tanam
 join users u on t.id_user = u.id_user where id_produk = $id_produk";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'nama_tanaman' => $item['nama_tanaman'],
                'harga' => $item['harga'],
                'stok' => $item['stok'],
                'gambar' => $item['gambar']
            );
        }
        return $list;
    }

    public static function verifAdminProduk($id_produk)
    {
        global $con;
        $sql = "update `produk` set verif_produk = 1 where id_produk = $id_produk";
        $result = mysqli_query($con, $sql);
    }

    public static function tampilPenjualTambahProduk($id_tanam)
    {
        global $con;
        $sql = "select * from tanam where id_tanam = $id_tanam";
        $list = [];
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_tanam' => $item['id_tanam'],
                'nama_tanaman' => $item['nama_tanaman']
            );
        }
        return $list;
    }

    public static function tampilPembeliDetailProduk($id_produk)
    {
        global $con;
        $list = [];
        $sql = "select * from produk p join tanam t on p.id_tanam = t.id_tanam join users u on t.id_user = u.id_user where p.id_produk = $id_produk";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama' => $item['nama'],
                'gambar' => $item['gambar'],
                'nama_tanaman' => $item['nama_tanaman'],
                'stok' => $item['stok'],
                'harga' => $item['harga']
            );
        }
        return $list;
    }

    public static function tambahPenjualProduk($id_user, $nama_produk, $harga, $stok, $gambar)
    {
        global $con;
        $verif_produk = 0;
        $tanggal = date("Y-m-d");
        $sql = "INSERT INTO `produk`(`id_user`, `nama_produk`, `harga`, `tanggal`, `stok`, `gambar`, `verif_produk`) 
VALUES ($id_user,'$nama_produk',$harga,$tanggal,$stok,'$gambar',$verif_produk)";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    public static function detailPenjualProduk($id_produk)
    {
        global $con;
        $sql = "select * from produk p join tanam t on p.id_tanam = t.id_tanam where p.id_produk = $id_produk";
        $list = [];
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'nama_tanaman' => $item['nama_tanaman'],
                'gambar' => $item['gambar'],
                'harga' => $item['harga'],
                'stok' => $item['stok']
            );
        }
        return $list;
    }

    public static function hapusPenjualProduk($id_produk)
    {
        global $con;
        $gambar = "";
        $sql1 = "select * from produk where id_produk = $id_produk";
        $result1 = mysqli_query($con, $sql1);
        foreach ($result1 as $item) {
            $gambar = $item['gambar'];
        }
        unlink('gambar/' . $gambar);

        $sql2 = "delete from produk where id_produk = $id_produk";
        $result2 = mysqli_query($con, $sql2);
        return $result2;

    }
}

?>