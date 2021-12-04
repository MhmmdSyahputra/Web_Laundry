<?php
session_start();
if ($_SESSION['status'] != "log_in") {
    echo "<script>document.location.href='../../login.php?pesan=belum_login'</script>";
}
require '../../function.php';


if (isset($_POST['kirim'])) {
    if (cekpassword($_POST) > 0) {
        header("Location: gantipw.php");
    } else {
        header("Location: ganti_password.php?pesan=passwordsalah");
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
        .content {
            min-height: calc(100vh - 211px - -60px);
        }

        .alert {
            font-weight: bold;
            text-align: center;
            padding: 20px;
            margin: 20px;

        }

        .col-md-5 {
            padding: 20px;
            margin: 20px;
        }

        .panel-body {
            font-weight: bold;
            text-align: left;
            background-color: white;
            padding: 20px;
        }
    </style>


</head>

<body style="background: #f0f0f0">


    <?php include 'header.php'; ?>
    <br>

    <center>
        <div class="content">
            <div class="col-md-5 col-offset-5">

                <div class="panel">
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "passwordsalah") {
                            echo "<div class='alert alert-danger'>Password Salah!</div>";
                        } elseif ($_GET['pesan'] == "gantipwsukses") {
                            echo "<div class='alert alert-success'>Password Berhasil Diubah</div>";
                        }
                    }

                    ?>

                    <div class="panel-body">

                        <form method="post">

                            <div class="form-group">
                                <label>Password Sekarang</label>
                                <input type="password" name="password_sekarang" class="form-control" required autofocus="on">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </center>

    <?php include '../../footer.php' ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>