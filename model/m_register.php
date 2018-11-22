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
        if (mysqli_query($con, $sql)) {
            return 1;
        } else if (mysqli_errno($con) == 1062) {
            return 0;
        }

    }

    public function createPembeli($nama, $email, $alamat, $username, $password, $notelp, $level)
    {
        global $con;
        $poin = 0;
        $sql = "insert into users (`nama`,`email`,`alamat`,`no_telp`,`poin`,`username`,`password`,`level`)
values ('$nama','$email','$alamat','$notelp','$poin','$username','$password','$level')";

        if (mysqli_query($con, $sql)) {
            return 1;
        } else if (mysqli_errno($con) == 1062) {
            return 0;
        }
    }


}

?>