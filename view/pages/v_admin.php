<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="resources/scss/admin.scss">
    <link rel="stylesheet" type="text/css" href="resources/scss/admin.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>
<body class="body-admin">
<section id="sideMenu">
    <nav>
        <a class="active" href="?controller=home&action=homeAdmin"><i class="fa fa-home" aria-hidden="true"></i>
            Home</a>
        <a href="?controller=user&action=regisAdmin"><i class="fa fa-address-card" aria-hidden="true"></i>
            Daftar</a>
        <a href="?controller=user&action=showUser"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
        <a href="?controller=transaksi&action=showAdmin"><i class="fa fa-check-square-o" aria-hidden="true"></i> Verif Transaksi</a>
    </nav>
</section>
<header>
    <div class="search-admin">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
    </div>
    <div class="admin-field">
        <a href="?controller=transaksi&action=showAdmin" class="notification">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
            <span class="circle-bell"><?=$_SESSION['notif']?></span></a>
        <a href="logout.php">
            <div class="admin-img"></div>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
</header>
<section id="content-area">
    <br>
    <center><h2>Harga Pasar</h2></center>
    <br>
    <?php
    foreach ($list as $item) {
        ?>
    <canvas id="myChart" width="700" height="200"></canvas>

    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Beras", "Jagung", "Kedelai", "Cabe", "Bawang Merah", "Bawang Putih","Kacang Hijau", "Kacang Tanah"
                ,"Kol","Tomat","Wortel","Buncis"],
                datasets: [{
                    label: 'Harga Pasar',
                    data: [<?= str_replace(".", "",$item['beras']);?>,
                        <?=str_replace(".", "",$item['jagung'])?>,
                        <?=str_replace(".", "",$item['kedelai'])?>,
                        <?=str_replace(".", "",$item['cabe'])?>,
                        <?=str_replace(".", "",$item['bawangmerah'])?>,
                        <?=str_replace(".", "",$item['bawangputih'])?>,
                        <?=str_replace(".", "",$item['kacanghijau'])?>,
                        <?=str_replace(".", "",$item['kacangtanah'])?>,
                        <?=str_replace(".", "",$item['kol'])?>,
                        <?=str_replace(".", "",$item['tomat'])?>,
                        <?=str_replace(".", "",$item['wortel'])?>,
                        <?=str_replace(".", "",$item['buncis'])?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
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
    }
    ?>
</section>
</body>

</html>