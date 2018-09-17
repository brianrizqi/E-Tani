<?php
class RegisterController{
    public function register(){
        require_once ('view/pages/v_register.php');
    }
    public function createPembeli(){
        $User = Register::createPembeli($_POST['nama'],$_POST['email'],$_POST['alamat'],$_POST['username'],md5($_POST['password']));
        header("Location: index.php?controller=login&action=login");
    }

    public function regisPetani(){
        require_once ('view/pages/v_admin_add_user.php');
    }

    public function createPetani(){
        $User = Register::createPetani($_POST['nama'],$_POST['email'],$_POST['username'],md5($_POST['password']));
        header("Location:index.php?controller=user&action=regisAdmin");
    }
}

?>