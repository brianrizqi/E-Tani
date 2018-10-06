<?php
require_once 'init.php';

class Register
{
    public function createPetani($nama, $email, $alamat, $username, $password, $notelp)
    {
        global $con;
        $level = 2;
        $poin = 0;
        $sql = "insert into users (`nama`,`email`,`alamat`,`no_telp`,`poin`,`username`,`password`,`level`)
values ('$nama','$email','$alamat','$notelp','$poin','$username','$password','$level')";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    public function createPembeli($nama, $email, $alamat, $username, $password, $notelp, $level)
    {
        global $con;
        $poin = 0;
        $sql = "insert into users (`nama`,`email`,`alamat`,`no_telp`,`poin`,`username`,`password`,`level`)
values ('$nama','$email','$alamat','$notelp','$poin','$username','$password','$level')";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    public static function editPenjual($id_user, $nama, $email, $alamat, $username, $password, $notelp)
    {
        global $con;
        if ($password=="") {
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