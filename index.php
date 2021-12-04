<?php

require 'function.php';


$transaksi = tampildtransaksi("SELECT * FROM transaksi ORDER BY transaksi_id DESC LIMIT 0,5");


$total = mysqli_query($con, "SELECT COUNT(*) AS TOTAL FROM pelanggan");
$totalpelanggan = mysqli_fetch_assoc($total);

$diproses = mysqli_query($con, "SELECT COUNT(*) AS TOTAL FROM transaksi WHERE status_transaksi = '0' ");
$totaldiproses = mysqli_fetch_assoc($diproses);

$dicuci = mysqli_query($con, "SELECT COUNT(*) AS TOTAL FROM transaksi WHERE status_transaksi = '1' ");
$totaldicuci = mysqli_fetch_assoc($dicuci);

$selesai = mysqli_query($con, "SELECT COUNT(*) AS TOTAL FROM transaksi WHERE status_transaksi = '2' ");
$totalselesai = mysqli_fetch_assoc($selesai);


?>

<!DOCTYPE html>
<html>

<head>
    <title>SISTEM INFORMASI LAUNDRY</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .alert {
            font-weight: bold;
            text-align: center;

        }

        .panel {
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
        }


        .container a {
            color: black;
        }
    </style>


</head>

<body style="background: #f0f0f0">


    <?php include 'userComp/header.php'; ?>
    <br>
    <div class="container">
        <div class="alert alert-info">SELAMAT DATANG DI SISTEM INFORMASI <b>LAUNDY PUTRA</b></div>
    </div>
    <br>
    <div class="container" style="background-color: white; padding: 10px; height: 100%;">
        <h5>Dashboard</h5><br><br>

        <a href="pelanggan.php">
            <div class="col-md-3 col-offset-3" style="float: left;">
                <div class="panel" style="background-color: blue;">
                    <div class="panel-body">
                        <h1><i class="bi bi-people-fill"></i>
                            <label>
                                <center><?= $totalpelanggan['TOTAL'];  ?></center>
                            </label>
                        </h1>
                        <h6>Jumlah Pelanggan</h6>
                    </div>
                </div>
            </div>
        </a>


        <a href="transaksi.php">
            <div class="col-md-3 col-offset-3" style="float: left;">
                <div class="panel" style="background-color: yellow;">
                    <div class="panel-body">
                        <h1><i class="bi bi-hourglass-split"></i>
                            <label>
                                <center><?= $totaldiproses['TOTAL'];  ?></center>
                            </label>
                        </h1>
                        <h6>Jumlah Cucian Diproses</h6>
                    </div>
                </div>
            </div>
        </a>


        <a href="transaksi.php">
            <div class="col-md-3 col-offset-3" style="float: left;">
                <div class="panel" style="background-color: skyblue;">
                    <div class="panel-body">
                        <h1><i class="bi bi-bell-fill"></i>
                            <label>
                                <center><?= $totaldicuci['TOTAL'];  ?></center>
                            </label>
                        </h1>
                        <h6>Jumlah Cucian Siap Diambil</h6>
                    </div>
                </div>
            </div>
        </a>


        <a href="transaksi.php">
            <div class="col-md-3 col-offset-3" style="float: left;">
                <div class="panel" style="background-color: lightgreen;">
                    <div class="panel-body">
                        <h1><i class="bi bi-check2-circle"></i>
                            <label>
                                <center><?= $totalselesai['TOTAL'];  ?></center>
                            </label>
                        </h1>
                        <h6>Jumlah Cucian Selesai</h6>
                    </div>
                </div>
            </div>
        </a>

        &nbsp;
    </div>
    <br>
    <P align="justify">
    <div class="container" style="background-color: white; padding: 10px; ">
        <h5>Riwayat Terakhir Transaksi</h5><br><br>

        <div class="table-responsive">
            <div class="panel">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat(Kg)</th>
                        <th>Tgl.Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>

                    <?php $i = 1 ?>
                    <?php foreach ($transaksi as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>pt-<?= $data['transaksi_id']; ?></td>
                            <td><?= $data['transaksi_tgl']; ?></td>
                            <td><?= $data['transaksi_pelanggan']; ?></td>
                            <td><?= $data['transaksi_berat']; ?></td>
                            <td><?= $data['transaksi_tgl_selesai']; ?></td>
                            <td>Rp. <?= $data['transaksi_harga']; ?></td>
                            <td>
                                <?php
                                if ($data['status_transaksi'] == "0") {
                                    echo "<div class='btn btn-warning'>PROSES</div>";
                                } elseif ($data['status_transaksi'] == "1") {
                                    echo "<div class='btn btn-info'>DICUCI</div>";
                                } elseif ($data['status_transaksi'] == "2") {
                                    echo "<div class='btn btn-success'>SELESAI</div>";
                                }
                                ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>


                </table>
            </div>



        </div>

    </div>
    <br>

    <?php include 'userComp/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>