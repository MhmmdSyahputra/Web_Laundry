<?php
session_start();
if ($_SESSION['status'] != "log_in") {
    echo "<script>document.location.href='../../index.php?pesan=belum_login'</script>";
}
require '../../function.php';

$id = $_GET['id'];
$transaksi = tampildtransaksi("SELECT * FROM transaksi WHERE transaksi_id = '$id' ")[0];

if (isset($_POST['edit'])) {
    if (editdtransaksi($_POST)) {
        echo "<script>
                    alert('Data Transaksi Berhasil Diedit')
                    document.location.href='../transaksi.php?pesan=berhasildiedit'
                  </script>";
    } else {
        echo "<script>
                    alert('Data Transaksi Berhasil Diedit')
                    document.location.href='../transaksi.php?pesan=berhasildiedit'
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

                    <input type="hidden" name="id" value="<?= $transaksi['transaksi_id']; ?>">
                    <!-- ====================== -->
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <input type="text" name="pelanggan" class="form-control" readonly value="<?= $transaksi['transaksi_pelanggan']; ?>">
                    </div>

                    <!-- ====================== -->
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" class="form-control" required autocomplete="off" value="<?= $transaksi['transaksi_berat']; ?>">
                    </div>

                    <!-- ====================== -->
                    <div class="form-group">
                        <label>Tgl.Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control" required autocomplete="off" value="<?= $transaksi['transaksi_tgl_selesai']; ?>">
                    </div>

                    <!-- ====================== -->

                    <!-- <div class="form-group">
                    <label>Tgl.DIbuat</label> -->
                    <input type="hidden" name="tgl_buat" class="form-control" required autocomplete="off" value="<?= $transaksi['transaksi_tgl']; ?>">
                    <!-- </div> -->


                    <div class="form-group">
                        <table class="table table-bordered">


                            <tr>
                                <th width="430" bgcolor="grey"><label>Jenis Pakaian</label></th>
                                <th bgcolor="grey"><label>Jumlah</label></th>
                            </tr>

                            <?php
                            $res = mysqli_query($con, "SELECT * FROM pakaian WHERE pakaian_transaksi = '$id' ");
                            while ($pakaian = mysqli_fetch_assoc($res)) : ?>
                                <tr>
                                    <td>
                                        <input type="text" name="jenis_pakaian[]" class="form-control" autocomplete="off" placeholder="Masukan Jenis Pakaian" value="<?= $pakaian['pakaian_jenis']; ?>">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_pakaian[]" class="form-control" autocomplete="off" placeholder=" Masukan Jumlah" value="<?= $pakaian['pakaian_jumlah']; ?>">
                                    </td>
                                </tr>
                            <?php endwhile; ?>

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




                    <div class="form-group">
                        <label>Status</label>
                        <div class="alert alert-info">
                            <select name="status" class="form-control">

                                <option <?php if ($transaksi['status_transaksi'] == "0") {
                                            echo "selected='selected'";
                                        } ?> value="0">
                                    DIPROSES
                                </option>

                                <option <?php if ($transaksi['status_transaksi'] == "1") {
                                            echo "selected='selected'";
                                        } ?> value="1">
                                    DICUCI
                                </option>

                                <option <?php if ($transaksi['status_transaksi'] == "2") {
                                            echo "selected='selected'";
                                        } ?> value="2">
                                    SELESAI
                                </option>

                            </select>
                        </div>
                    </div>

                    <!-- ====================== -->
                    <div class="form-group">
                        <a href="../transaksi.php" onclick="return confirm('Anda Ingin Kembali?')"><button type="button " class="btn btn-danger">Kembali</button></a>

                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
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