<?php
require_once 'init.php';
class User{

    public function showAllUser(){
        global $con;
        $list = [];
        $sql = "select * from users";
        $result = mysqli_query($con, $sql);

        foreach ($result as $item) {
            $list[] = array(
                'id_user'=>$item['id_user'],
                'nama'=>$item['nama'],
                'email'=>$item['email'],
                'level'=>$item['level']
            );
        }
        return $list;
    }
    public static function showUser($id_user){
        global $con;
        $list = [];
        $sql = "select * from users where id_user = $id_user";
        $result = mysqli_query($con,$sql);

        foreach ($result as $item) {
            $list[] = array(
                'id_user'=>$item['id_user'],
                'nama'=>$item['nama'],
                'email'=>$item['email'],
                'level'=>$item['level'],
                'username'=>$item['username'],
                'alamat'=>$item['alamat'],
                'no_telp'=>$item['no_telp'],
                'password'=>$item['password'],
                'poin'=>$item['poin']
            );
        }
        return $list;
    }
    public static function editPenjual($id_user, $nama, $email, $alamat, $username, $password, $notelp)
    {
        global $con;
        if ($password == "") {
            $sql = "UPDATE `users` SET `nama`='$nama',`email`='$email',`alamat`='$alamat',
`no_telp`='$notelp',`username`='$username' WHERE id_user = $id_user";
            $result = mysqli_query($con, $sql);
        } else {
            $sql1 = "UPDATE `users` SET `nama`='$nama',`email`='$email',`alamat`='$alamat',
`no_telp`='$notelp',`username`='$username',`password`='$password' WHERE id_user = $id_user";
            $result1 = mysqli_query($con, $sql1);
        }
        return $result1;
    }

    public static function editAdmin($id_user, $nama, $email, $alamat, $username, $password, $notelp)
    {
        global $con;
        $sql = "UPDATE `users` SET `nama`='$nama',`email`='$email',`alamat`='$alamat',
`no_telp`='$notelp',`username`='$username',`password`='$password' WHERE id_user = $id_user";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    public static function editPembeli($id_user, $nama, $email, $alamat, $username, $password, $notelp)
    {
        global $con;
        $sql = "UPDATE `users` SET `nama`='$nama',`email`='$email',`alamat`='$alamat',
`no_telp`='$notelp',`username`='$username',`password`='$password' WHERE id_user = $id_user";
        $result = mysqli_query($con, $sql);
        return $result;
    }
}


?>