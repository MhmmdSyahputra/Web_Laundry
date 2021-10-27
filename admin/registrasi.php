<?php

require '../function.php';

if (isset($_POST['registrasi'])) {

    if (tambahuser($_POST) > 0) {
        echo "<script>document.location.href='../index.php?pesan=sreg'</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>SISTEM INFORMASI LAUNDRY</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        .panel {
            background-color: white;
            border-radius: 5%;
        }

        .panel-body {
            background-color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            border-radius: 5%;
        }

        .panel h2 {
            border-bottom: 3px solid blue;
            text-transform: uppercase;
        }

        .col-md-5 {
            padding: 10px;
        }

        .footer {
            border-top: 2px solid grey;
            color: grey;
        }
    </style>


</head>

<body style="background: #f0f0f0">
    <br><br>
    <center>
        <h1>SISTEM INFORMASI LAUNDRY</h1>

        <br><br>

        <div class="container">
            <div class="col-md-5 col-md-offset-5">

                <form method="post">
                    <?php
                    if (isset($_GET['pesan'])) {

                        if ($_GET['pesan'] == "passwordtidaksesuai") {
                            echo "<div class='alert alert-danger'>Verifikasi Password Tidak Sesuai</div>";
                        } elseif ($_GET['pesan'] == "noadminsalah") {
                            echo "<div class='alert alert-danger'>No Admin Salah</div>";
                        }
                    }
                    ?>
                    <div class="panel">

                        <div class="panel-body">
                            <h2>Registrasi</h2>

                            <div class="form-group">
                                <input type="hidden" name="id">
                                <label>No Admin</label>
                                <input type="number" class="form-control" name="no_admin" autocomplete="off">
                                <font size="1">Hanya Karyawan Yang Tau Ini</font>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Ulangi Password</label>
                                <input type="password" class="form-control" name="password2" autocomplete="off">
                            </div>

                            <button type="submit" name="registrasi" class="btn btn-primary">Registrasi</button> |
                            <a href="../index.php">Login</a>

                        </div>
                        <br>

                        <div class="footer" style="text-align: center; padding: 0; margin: 0;">
                            <label>Copyright© Putrapt 2021</label>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </center>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>