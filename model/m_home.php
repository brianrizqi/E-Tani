<?php

class Home
{
    public static function bacaHTML($url)
    {
        $data = curl_init();

        curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($data, CURLOPT_URL, $url);

        $hasil = curl_exec($data);

        curl_close($data);

        $dom = new DomDocument();
        @$dom->loadHTML($hasil);

        $classname = "table table-bordered table-hover table-condensed";

        $finder = new DomXPath($dom);

        $spaner = $finder->query("//*[contains(@class, '$classname')]");

        $span = $spaner->item(0);
        $harga = $span->getElementsByTagName('td');
        $data = [];
        $data[] = array(
            'beras' => $harga->item(11)->nodeValue,
            'jagung' => $harga->item(172)->nodeValue,
            'kedelai' => $harga->item(221)->nodeValue,
            'cabe' => $harga->item(263)->nodeValue,
            'bawangmerah' => $harga->item(277)->nodeValue,
            'bawangputih' => $harga->item(284)->nodeValue,
            'kacanghijau' => $harga->item(298)->nodeValue,
            'kacangtanah' => $harga->item(305)->nodeValue,
            'kol' => $harga->item(326)->nodeValue,
            'tomat' => $harga->item(340)->nodeValue,
            'wortel' => $harga->item(347)->nodeValue,
            'buncis' => $harga->item(354)->nodeValue
        );
        return $data;
    }

    public static function showPenjual($id_user)
    {
        global $con;
        $list = [];
        $sql = "select DISTINCT p.id_produk, nama_produk from produk p join detail_transaksi dt on p.id_produk = dt.id_produk where id_user = $id_user";
        $result = mysqli_query($con, $sql);
        foreach ($result as $item) {
            $list[] = array(
                'nama_produk' => $item['nama_produk'],
                'id_produk' => $item['id_produk']
            );
        }
        return $list;
    }

    public static function peramalan($id_user, $nama_produk)
    {
        global $con;
        $sql = "select sum(detail_transaksi.jumlah) as jumlah, month(detail_transaksi.tanggal) as bulan from detail_transaksi 
join produk on detail_transaksi.id_produk = produk.id_produk
where produk.id_user = $id_user and produk.nama_produk = '$nama_produk'
GROUP BY month(detail_transaksi.tanggal)";
        $sql1 = "select sum(detail_transaksi.jumlah) as jumlah, month(detail_transaksi.tanggal) as bulan from detail_transaksi 
join produk on detail_transaksi.id_produk = produk.id_produk
where produk.id_user = $id_user and produk.nama_produk = '$nama_produk'
GROUP BY month(detail_transaksi.tanggal)
order by month(detail_transaksi.tanggal) desc limit 0,1";
        $sql2 = "select sum(detail_transaksi.jumlah) as jumlah, month(detail_transaksi.tanggal) as bulan from detail_transaksi 
join produk on detail_transaksi.id_produk = produk.id_produk
where produk.id_user = $id_user and produk.nama_produk = '$nama_produk'
GROUP BY month(detail_transaksi.tanggal)
order by month(detail_transaksi.tanggal) desc limit 1,1";
        $sql3 = "select sum(detail_transaksi.jumlah) as jumlah, month(detail_transaksi.tanggal) as bulan from detail_transaksi 
join produk on detail_transaksi.id_produk = produk.id_produk
where produk.id_user = $id_user and produk.nama_produk = '$nama_produk'
GROUP BY month(detail_transaksi.tanggal)
order by month(detail_transaksi.tanggal) desc limit 2,3";
        $result1 = mysqli_query($con, $sql1);
        $result2 = mysqli_query($con, $sql2);
        $result3 = mysqli_query($con, $sql3);
        $bulan1 = "";
        $bulan2 = "";
        $bulan3 = "";
        $jumlah1 = 0;
        $jumlah2 = 0;
        $jumlah3 = 0;
        $list = [];
        if (mysqli_num_rows($result1)) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $bulan1 = $row['bulan'];
                $jumlah1 = $row['jumlah'];
            }
        }
        if (mysqli_num_rows($result2)) {
            $row = mysqli_fetch_assoc($result2);
            $bulan2 = $row['bulan'];
            $jumlah2 = $row['jumlah'];
        }
        if (mysqli_num_rows($result3)) {
            $row = mysqli_fetch_assoc($result3);
            $bulan3 = $row['bulan'];
            $jumlah3 = $row['jumlah'];
        }
        $ramal = ($jumlah1 + $jumlah2 + $jumlah3) / 3;
        $list[] = array(
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'bulan3' => $bulan3,
            'jumlah1' => $jumlah1,
            'jumlah2' => $jumlah2,
            'jumlah3' => $jumlah3,
            'ramal' => $ramal
        );
        return $list;
    }
}

?>