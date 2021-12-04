<?php

session_start();
if ($_SESSION['status'] != "log_in") {
    echo "<script>document.location.href='../../login.php?pesan=belum_login'</script>";
}
require '../../function.php';

if (isset($_POST['simpan'])) {
    if (tambahdtransaksi($_POST) > 0) {
        echo "<script>
                    alert('Data Transaksi Berhasil Ditambah')
                    document.location.href='../transaksi.php?pesan=berhasilditambah'
                  </script>";
    }
}

$res = mysqli_query($con, "SELECT * FROM pelanggan");


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

        .col-md-7 {
            text-align: left;
            font-weight: bold;
            padding: 10px;
        }

        .container {
            padding: 10px;
        }
    </style>


</head>

<body style="background: #f0f0f0">


    <?php include 'header.php'; ?>
    <br>
    <center>

        <div class="container">
            <div class="col-md-7 col-offset-6" style="background-color: white;">
                <h5>Tambah Data Pelanggan</h5><br><br>

                <form method="post">

                    <input type="hidden" name="id">
                    <!-- ====================== -->
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select name="pelanggan" class="form-control">
                            <option selected="true" disabled="disabled">-Pilih Pelanggan</option>

                            <?php while ($pelanggan = mysqli_fetch_assoc($res)) : ?>

                                <option value="<?= $pelanggan['pelanggan_nama']; ?>"><?= $pelanggan['pelanggan_nama']; ?></option>

                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- ====================== -->
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" class="form-control" required autocomplete="off">
                    </div>

                    <!-- ====================== -->
                    <div class="form-group">
                        <label>Tgl.Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control" required autocomplete="off">
                    </div>

                    <!-- ====================== -->
                    <div class="form-group">
                        <table class="table table-bordered">

                            <tr>
                                <th width="430" bgcolor="grey"><label>Jenis Pakaian</label></th>
                                <th bgcolor="grey"><label>Jumlah</label></th>
                            </tr>

                            <tr>
                                <td><input type="text" name="jenis_pakaian[]" class="form-control" autocomplete="off" placeholder="Masukan Jenis Pakaian"></td>
                                <td><input type="number" name="jumlah_pakaian[]" class="form-control" autocomplete="off" placeholder=" Masukan Jumlah"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="jenis_pakaian[]" class="form-control" autocomplete="off" placeholder="Masukan Jenis Pakaian"></td>
                                <td><input type="number" name="jumlah_pakaian[]" class="form-control" autocomplete="off" placeholder=" Masukan Jumlah"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="jenis_pakaian[]" class="form-control" autocomplete="off" placeholder="Masukan Jenis Pakaian"></td>
                                <td><input type="number" name="jumlah_pakaian[]" class="form-control" autocomplete="off" placeholder=" Masukan Jumlah"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="jenis_pakaian[]" class="form-control" autocomplete="off" placeholder="Masukan Jenis Pakaian"></td>
                                <td><input type="number" name="jumlah_pakaian[]" class="form-control" autocomplete="off" placeholder=" Masukan Jumlah"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="jenis_pakaian[]" class="form-control" autocomplete="off" placeholder="Masukan Jenis Pakaian"></td>
                                <td><input type="number" name="jumlah_pakaian[]" class="form-control" autocomplete="off" placeholder=" Masukan Jumlah"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="jenis_pakaian[]" class="form-control" autocomplete="off" placeholder="Masukan Jenis Pakaian"></td>
                                <td><input type="number" name="jumlah_pakaian[]" class="form-control" autocomplete="off" placeholder=" Masukan Jumlah"></td>
                            </tr>

                        </table>
                    </div>

                    <!-- ====================== -->
                    <div class="form-group">
                        <a href="../transaksi.php" onclick="return confirm('Anda Ingin Kembali?')"><button type="button " class="btn btn-danger">Kembali</button></a>

                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>

                </form>

            </div>

        </div>

    </center>


    <?php include '../../footer.php' ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>