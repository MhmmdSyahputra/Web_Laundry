<?php
session_start();
if ($_SESSION['status'] != "log_in") {
    echo "<script>document.location.href='../../index.php?pesan=belum_login'</script>";
}

require '../../function.php';

$res = mysqli_query($con, "SELECT * FROM harga");
$harga = mysqli_fetch_assoc($res);

if (isset($_POST['ubah'])) {
    if (editharga($_POST) > 0) {
        header("Location: ganti_harga.php?pesan=gantihargasukses");
    }
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
            padding: 20px;
            margin: 20px;

        }

        .panel-body {
            font-weight: bold;
            text-align: left;
            background-color: white;
            padding: 20px;
            margin: 20px;
        }
    </style>


</head>

<body style="background: #f0f0f0">


    <?php include 'header.php'; ?>
    <br>

    <center>
        <div class="col-md-5 col-offset-5">



            <div class="panel">
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "passwordsalah") {
                        echo "<div class='alert alert-danger'>Password Salah!</div>";
                    } elseif ($_GET['pesan'] == "gantihargasukses") {
                        echo "<div class='alert alert-success'>Harga Berhasil Diubah</div>";
                    }
                }

                ?>

                <div class="panel-body">

                    <form method="post">

                        <div class="form-group">
                            <label>Harga Per Kilo</label>
                            <input type="hidden" name="id" value="<?= $harga['id']; ?>">
                            <input type="number" name="harga" class="form-control" value="<?= $harga['harga_per_kilo']; ?>">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </center>

    <br><br><br><br><br><br>
    <?php include '../../footer.php' ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>