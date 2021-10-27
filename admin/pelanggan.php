<?php
session_start();
if ($_SESSION['status'] != "log_in") {
    echo "<script>document.location.href='../index.php?pesan=belum_login'</script>";
}
require '../function.php';



$pelanggan = tampilpelanggan("SELECT *  FROM pelanggan ORDER BY pelanggan_id DESC");

if (isset($_POST['cari'])) {
    $inputan = $_POST['inputan'];

    $pelanggan = tampilpelanggan("SELECT * FROM pelanggan WHERE pelanggan_nama LIKE '%$inputan%' ");
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
            padding: 10px;
            margin: 10px;
        }
    </style>


</head>

<body style="background: #f0f0f0">


    <?php include '../header.php'; ?>
    <br>
    <div class="container" style="background-color: white;">
        <h5>Data Pelanggan</h5><br><br>


        <a href="crud_pelanggan/tambahpelanggan.php">
            <button type="button" class="btn btn-primary">Tambah</button>
        </a>
        <br><br>

        <div class="col-md-3 col-offset-3" style="float: left;">
            <form method="post" class="form-group">
                <input type="text" name="inputan" class="form-control" autofocus autocomplete="off" placeholder="Masukan Nama"><br>
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
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($pelanggan as $customer) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $customer['pelanggan_nama']; ?></td>
                        <td><?= $customer['pelanggan_hp']; ?></td>
                        <td><?= $customer['pelanggan_alamat']; ?></td>
                        <td>
                            <!-- -------EDIT------- -->
                            <a href="crud_pelanggan/editpelanggan.php?id=<?= $customer['pelanggan_id']; ?>" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- -------HAPUS------- -->
                            <a href="crud_pelanggan/hapuspelanggan.php?id=<?= $customer['pelanggan_id']; ?>" onclick="return confirm('Ingin menghapus Ini?')" class="btn btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach ?>


            </table>

        </div>

    </div>

    <?php include '../footer.php' ?>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>