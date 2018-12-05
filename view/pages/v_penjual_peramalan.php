<html>
<head>
    <title>Dashboard penjual</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/penjual.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>
<body class="body-penjual">
<section id="sideMenu">
    <nav>
        <center><p>Hei <?= $_SESSION['user']; ?> !</p></center>
        <a class="active" href="?controller=home&action=homePenjual"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="?controller=user&action=showPenjual"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
        <a href="?controller=produk&action=tampilPenjualProduk"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Produk</a>
        <a href="?controller=transaksi&action=showPenjualTransaksi"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Transaksi</a>
        <a href="?controller=home&action=hargaPenjual"><i class="fa fa-line-chart" aria-hidden="true"></i> Harga Pasar</a>
    </nav>
</section>
<header>
    <div class="search-penjual">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
    </div>
    <div class="penjual-field">
        <a href="logout.php" onclick="return confirm('Apakah Anda ingin keluar')">
            <div class="penjual-img"></div>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
</header>
<section id="content-area">
    <canvas id="myChart" width="700" height="200"></canvas>
    <?php
    $ramal;
    foreach ($list as $item) {
//        var_dump($item);
        ?>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["<?=date('M',mktime(0,0,0,date($item['bulan3'])))?>",
                    "<?=date('M',mktime(0,0,0,date($item['bulan2'])))?>",
                    "<?=date('M',mktime(0,0,0,date($item['bulan1'])))?>",
                ],
                datasets: [{
                    label: 'Penjualan',
                    data: [<?=$item['jumlah3']?>,
                        <?=$item['jumlah2']?>,
                        <?=$item['jumlah1']?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
    <?php
    $ramal = $item['ramal'];
    }

    ?>
    <br>
    <h4>Penjualan kira-kira bulan <?=date('M',mktime(0,0,0,date('n')+1))." : ".$ramal."kg"?></h4>
</section>
</body>

</html>