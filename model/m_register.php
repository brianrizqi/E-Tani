<?php
require_once 'init.php';

class Register
{
    public function createPetani($nama,$email,$username,$password){
        global $con;
        $level = 2;
        $sql = "insert into users (`nama`,`email`,`username`,`password`,`level`)
values ('$nama','$email','$username','$password','$level')";
        $result = mysqli_query($con, $sql);
        return $result;
    }
    public function createPembeli($nama,$email,$alamat,$username,$password){
        global $con;
        $level = 3;
        $poin = 0;
        $sql = "insert into users (`nama`,`email`,`alamat`,`poin`,`username`,`password`,`level`)
values ('$nama','$email','$alamat','$poin','$username','$password','$level')";
        $result = mysqli_query($con, $sql);
        return $result;
    }
}

?>