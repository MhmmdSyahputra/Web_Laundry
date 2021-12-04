<?php 

session_start();
    require 'function.php';

    if ( isset($_POST['login']) ) {
        $username = $_POST['username'];
        if ( login($_POST) > 0 ) {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "log_in";

            echo "<script>
                    alert('SELAMAT DATANG $username ')
                    document.location.href='admin/dashboard.php'
                  </script>";
                  
        }else{
            header("Location: index.php?pesan=gagal");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">

    <style>
        .panel{
            background-color: white;
            border-radius: 5%;
        }

        .panel-body{
            background-color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            border-radius: 5%;
        }

        h2{
            border-bottom: 3px solid blue;
            text-transform: uppercase;
        }

        .footer{
            border-top: 2px solid grey;
            color: grey;
        }


    </style>


</head>
<body  style="background: #f0f0f0">
<br><br>
    <center>
        <h1>SISTEM INFORMASI LAUNDRY</h1>
    
<br><br>

    <div class="container">
        <div class="col-md-4 col-md-offset-4">

    <?php 

    if ( isset($_GET['pesan']) ) {
        
        if ( $_GET['pesan'] == "gagal" ) {
            echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
        }elseif ( $_GET['pesan'] == "belum_login" ) {
            echo "<div class='alert alert-danger'>Gagal! Login Terlebih Dahulu!</div>";
        }elseif ( $_GET['pesan'] == "logout" ) {
            echo "<div class='alert alert-info'>Anda Berhasil Logout</div>";
        }elseif ( $_GET['pesan'] =="sreg" ) {
            echo "<div class='alert alert-success'>Berhasil! Registasi Berhasil!</div>";
        }

    }

    ?>
                    
            
            <form  method="post">
                <div class="panel">
                  
                    <div class="panel-body">
                        <h2>login</h2>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" autocomplete="off" required>
                        </div>  

                        <button type="submit" name="login" class="btn btn-primary">Login</button> | <a href="admin/registrasi.php">Registrasi</a>
                
                        </div>
                    <br>
                    
                    <div class="footer" style="text-align: center; padding: 0; margin: 0;">
                        <h6>Copyright&copy; Putrapt 2021</h6>
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