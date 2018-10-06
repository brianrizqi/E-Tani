<?php

$url = "http://siskaperbapo.com/harga/tabel.nodesign/";
$vars = 'tanggal='.date("Y-m-d")."&kabkota=jemberkab&"."pasar="."";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

$response = curl_exec($ch);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php echo $response; ?>
</body>
</html>
