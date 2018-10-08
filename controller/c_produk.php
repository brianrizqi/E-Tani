<?php

class ProdukController
{
    public function detailAdminProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::detailAdminProduk($_GET['id_produk']);
            require_once('view/pages/v_admin_detail_produk.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function tampilPenjualProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::tampilPenjualProduk($_SESSION['id_user']);
            echo $_SESSION['id_user'];
            require_once('view/pages/v_penjual_produk.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function tampilPenjualTambahProduk()
    {
        if (isset($_SESSION['user'])) {
            require_once('view/pages/v_penjual_add_produk.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function tambahPenjualProduk()
    {
        $list = Home::bacaHTML("localhost/E-tani/scraping.php");
        $foto = $_FILES['foto_produk']['name'];
        $tmp = $_FILES['foto_produk']['tmp_name'];
        $gambar = date('dmYHis') . $foto;
        $path = "gambar/" . $gambar;
        foreach ($list as $item) {
            $hargaa = $item[$_POST['nama_produk']];
            $harga2 = str_replace(".", "", $hargaa);
            if ($_POST['harga'] > ($harga2 + 2000)) {
                ?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                    alert("Harga Terlalu mahal");
                </script>
                <?php
                require_once('view/pages/v_penjual_add_produk.php');
            } else {
                if (move_uploaded_file($tmp, $path)) {
                    $produk = Produk::tambahPenjualProduk($_SESSION['id_user'], $_POST['nama_produk'], $_POST['harga']
                        , $_POST['stok'], $gambar);
                    header("Location: http://localhost/E-Tani/index.php/produk/tampilPenjualProduk");
                }
            }
        }
    }

    public function semuaProduk()
    {
        $list = Produk::semuaProduk();
        require_once('view/pages/v_product.php');
    }

    public function detailPenjualProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::detailPenjualProduk($_GET['id_produk']);
            require_once('view/pages/v_penjual_detail_produk.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function hapusPenjualProduk()
    {
        if (isset($_SESSION['user'])) {
            $hapus = Produk::hapusPenjualProduk($_GET['id_produk']);
            header("Location: http://localhost/E-Tani/index.php/produk/tampilPenjualProduk");
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function tampilPenjualDetailProduk()
    {
        $list = Produk::tampilPembeliDetailProduk($_GET['id_produk']);
        require_once('view/pages/v_pembeli_detail_produk.php');
    }

    public function tampilPembeliProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::semuaProduk();
            require_once('view/pages/v_pembeli_produk.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function tampilEditProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Produk::tampilEditProduk($_GET['id_produk']);
            require_once('view/pages/v_penjual_edit_produk.php');
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }

    public function editPenjualProduk()
    {
        if (isset($_SESSION['user'])) {
            $list = Home::bacaHTML("localhost/E-tani/scraping.php");
            foreach ($list as $item) {
                $hargaa = $item[$_POST['nama_produk']];
                $harga2 = str_replace(".", "", $hargaa);
                if ($_POST['harga'] > ($harga2 + 2000)) {
                    ?>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                        alert("Harga Terlalu mahal");
                    </script>
                    <?php
                    require_once('view/pages/v_penjual_edit_produk.php');
                } else {
                    if (!file_exists($_FILES['foto_produk']['tmp_name'])) {
                        $produk = Produk::editPenjualProduk($_POST['id_produk'], $_POST['nama_produk'], $_POST['harga'], $_POST['stok'], $_POST['gambar']);
                        header("Location: http://localhost/E-Tani/index.php/produk/tampilPenjualProduk");
                    } else {
                        $foto = $_FILES['foto_produk']['name'];
                        $tmp = $_FILES['foto_produk']['tmp_name'];
                        $gambar = date('dmYHis') . $foto;
                        $path = "gambar/" . $gambar;
                        if (move_uploaded_file($tmp, $path)) {
                            $produk = Produk::editPenjualProduk($_POST['id_produk'], $_POST['nama_produk'], $_POST['harga'], $_POST['stok'], $gambar);
                            header("Location: http://localhost/E-Tani/index.php/produk/tampilPenjualProduk");
                        }
                    }
                }

            }
        } else {
            header('location:http://localhost/E-Tani/index.php/login/login');
        }
    }
}

?>