<?php

class Home
{
    public static function bacaHTML($url)
    {

        // inisialisasi CURL

        $data = curl_init();

        // setting CURL

        curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($data, CURLOPT_URL, $url);

        // menjalankan CURL untuk membaca isi file

        $hasil = curl_exec($data);

        curl_close($data);

//        return $hasil;

        $dom = new DomDocument();
        @$dom->loadHTML($hasil);

        $classname = "table table-bordered table-hover table-condensed";


//mencari class memakai dom query

        $finder = new DomXPath($dom);

        $spaner = $finder->query("//*[contains(@class, '$classname')]");

        $span = $spaner->item(0);
// mengambil semua tag td//
        $harga = $span->getElementsByTagName('td');
        $data = [];
        $data[] = array(
            'beras' => $harga->item(11)->nodeValue,
            'jagung' => $harga->item(172)->nodeValue,
            'kedelai' => $harga->item(228)->nodeValue,
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
}

?>