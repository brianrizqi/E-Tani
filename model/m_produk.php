<?php
require_once 'init.php';

Class Produk
{
    public static function tampilSemuaProduk()
    {
        global $con;
        $list = [];
        $sql = "select * from produk  
order by id_produk desc limit 0,4";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama_produk' => $item['nama_produk'],
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
        $sql = "select * from produk p join users u on p.id_user = u.id_user 
order by p.id_produk desc";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama_produk' => $item['nama_produk'],
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
        $sql = "select * from produk where id_user = $id_user";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama_produk' => $item['nama_produk'],
                'harga' => $item['harga'],
                'stok' => $item['stok'],
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
        $sql = "select * from produk p join users u on p.id_user = u.id_user where p.id_produk = $id_produk";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama' => $item['nama'],
                'gambar' => $item['gambar'],
                'nama_produk' => $item['nama_produk'],
                'stok' => $item['stok'],
                'harga' => $item['harga']
            );
        }
        return $list;
    }

    public static function tambahPenjualProduk($id_user, $nama_produk, $harga, $stok, $gambar)
    {
        global $con;
        echo $harga;
        $sql = "INSERT INTO `produk`(`id_user`, `nama_produk`, `harga`, `tanggal`, `stok`, `gambar`) 
VALUES ($id_user,'$nama_produk',$harga,CURDATE(),$stok,'$gambar')";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    public static function detailPenjualProduk($id_produk)
    {
        global $con;
        $sql = "select * from produk p where p.id_produk = $id_produk";
        $list = [];
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'nama_produk' => $item['nama_produk'],
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

    public static function tampilEditProduk($id_produk)
    {
        global $con;
        $sql = "select * from produk where id_produk = $id_produk";
        $result = mysqli_query($con, $sql);
        $list = [];
        foreach ($result as $item) {
            $list[] = array(
                'id_produk' => $item['id_produk'],
                'nama_produk' => $item['nama_produk'],
                'gambar' => $item['gambar'],
                'harga' => $item['harga'],
                'stok' => $item['stok']
            );
        }
        return $list;
    }

    public static function editPenjualProduk($id_produk, $nama_produk, $harga, $stok, $gambar)
    {
        global $con;
        $url_gambar = "";
        $sql1 = "select gambar from produk where id_produk = $id_produk";
        $result1 = mysqli_query($con, $sql1);
        foreach ($result1 as $item) {
            $url_gambar = $item['gambar'];
        }
//        if (strcasecmp($url_gambar,$gambar)==0){
        if ($gambar == "") {
            $sql2 = ("UPDATE `produk` SET `nama_produk`='$nama_produk',`harga`=$harga,
`stok`=$stok WHERE id_produk =  $id_produk");
            $result2 = mysqli_query($con, $sql2);
        } else {
            $sql3 = ("UPDATE `produk` SET `nama_produk`='$nama_produk',`harga`=$harga,
`stok`=$stok, `gambar`='$gambar' WHERE id_produk =  $id_produk");
            unlink('gambar/' . $url_gambar);
            $result3 = mysqli_query($con, $sql3);
        }
        return $result1;
    }
}

?>