<?php


require 'function.php';


$transaksi = tampildtransaksi("SELECT * FROM transaksi ORDER BY transaksi_id DESC");

if (isset($_POST['cari'])) {
    $inputan = $_POST['inputan'];

    $transaksi = tampildtransaksi("SELECT * FROM transaksi WHERE transaksi_pelanggan LIKE '%$inputan%' ");
}

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
        .alert {
            font-weight: bold;
            text-align: center;

        }

        .container {
            min-height: calc(100vh - 211px - -60px);
            padding: 10px;
            margin: 10px;
        }
    </style>


</head>

<body style="background: #f0f0f0">


    <?php include 'userComp/header.php'; ?>
    <br>
    <div class="container" style="background-color: white;">
        <h5>Data Transaksi Laundry</h5><br><br>




        <div class="col-md-3 col-offset-3" style="float: left;">
            <form method="post" class="form-group">
                <input type="text" name="inputan" class="form-control" autofocus autocomplete="off" placeholder="Nama Pelanggan"><br>
        </div>

        <div class="col-md-3 col-offset-3" style="float: left;">
            <button type="submit" name="cari" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <br><br><br>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "berhasilditambah") {
                echo "<div class='alert alert-success'>Data Berhasil Ditambah</div>";
            } elseif ($_GET['pesan'] == "berhasildihapus") {
                echo "<div class='alert alert-danger'>Data Berhasil Dihapus</div>";
            } elseif ($_GET['pesan'] == "berhasildiedit") {
                echo "<div class='alert alert-warning'>Data Berhasil Diedit</div>";
            }
        }

        ?>
        <div class="table-responsive">

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

    <?php include 'userComp/footer.php' ?>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>