<?php

function call($controller, $action)
{
    require_once('controller/c_'.$controller.'.php');

    switch ($controller) {
        case 'home':
            $controller = new HomeController();
            require_once ('model/m_home.php');
            require_once ('model/m_produk.php');
            break;
        case 'login':
            $controller = new LoginController();
            require_once ('model/m_login.php');
            break;
        case 'user':
            $controller = new UserController();
            require_once ('model/m_user.php');
            break;
        case 'produk':
            $controller = new ProdukController();
            require_once ('model/m_home.php');
            require_once ('model/m_produk.php');
            break;
        case 'register':
            $controller = new RegisterController();
            require_once ('model/m_register.php');
            break;
        case 'transaksi':
            $controller = new TransaksiController();
            require_once ('model/m_transaksi.php');
            break;
    }
    $controller->{$action}();
}

call($controller, $action);

?>