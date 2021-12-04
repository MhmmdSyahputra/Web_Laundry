<?php
session_start();
if ($_SESSION['status'] != "log_in") {
    echo "<script>document.location.href='../../login.php?pesan=belum_login'</script>";
}
require '../../function.php';

$id = $_GET['id'];

$res = mysqli_query($con, "SELECT * FROM transaksi,pelanggan WHERE transaksi_id = '$id' AND transaksi_pelanggan = pelanggan_nama ");

while ($transaksi = mysqli_fetch_assoc($res)) :


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
            .table tr td {
                text-align: left;
            }

            @media print {
                .cetak {
                    display: none;
                }
            }
        </style>


    </head>

    <body style="background: #f0f0f0">

        <center>
            <div class="container">
                <div class="col-md-8 col-offset-8">
                    <br>
                    <h1>LAUNDRY PUTRA</h1>
                    <br>

                    <div class="cetak" style="float: right; padding: 10px; margin: 10px;">
                        <a href="">
                            <button class="btn btn-primary cetak" type="button"><i class="bi bi-printer-fill">&nbsp;</i> Cetak</button>
                        </a>
                    </div>

                    <table class="table">

                        <tr>
                            <td width="200">No. Laundry</td>
                            <td>:</td>
                            <td>pt-<?= $transaksi['transaksi_id']; ?> </td>
                        </tr>

                        <tr>
                            <td>Tgl. Laundry</td>
                            <td>:</td>
                            <td><?= $transaksi['transaksi_tgl']; ?></td>
                        </tr>

                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>:</td>
                            <td><?= $transaksi['transaksi_pelanggan']; ?></td>
                        </tr>

                        <tr>
                            <td>HP</td>
                            <td>:</td>
                            <td><?= $transaksi['pelanggan_hp']; ?></td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $transaksi['pelanggan_alamat']; ?></td>
                        </tr>

                        <tr>
                            <td>Berat Cucian (Kg)</td>
                            <td>:</td>
                            <td><?= $transaksi['transaksi_berat']; ?></td>
                        </tr>

                        <tr>
                            <td>Tgl. Selesai</td>
                            <td>:</td>
                            <td><?= $transaksi['transaksi_tgl_selesai']; ?></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <?php
                                if ($transaksi['status_transaksi'] == "0") {
                                    echo "<div class='btn btn-warning'>PROSES</div>";
                                } elseif ($transaksi['status_transaksi'] == "1") {
                                    echo "<div class='btn btn-info'>DICUCI</div>";
                                } elseif ($transaksi['status_transaksi'] == "2") {
                                    echo "<div class='btn btn-success'>SELESAI</div>";
                                }
                                ?>

                            </td>
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp. <?= $transaksi['transaksi_harga']; ?></td>
                        </tr>

                    </table>

                    <h5>Daftar Cucian</h5>
                    <table class="table table-bordered">

                        <tr>
                            <th width="550">Jenis Pakaian</th>
                            <th>Jumlah</th>
                        </tr>

                        <?php $p = mysqli_query($con, "SELECT * FROM pakaian WHERE pakaian_transaksi = '$id' ");
                        while ($pakaian = mysqli_fetch_assoc($p)) : ?>
                            <tr>
                                <td><?= $pakaian['pakaian_jenis']; ?></td>
                                <td><?= $pakaian['pakaian_jumlah']; ?></< /td>
                            </tr>
                        <?php endwhile; ?>

                    </table>

                <?php endwhile; ?>

                </div>
            </div>
        </center>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>

    </html>