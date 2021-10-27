<?php 
$con = mysqli_connect("localhost","root","","db_laundry");


function login($data){
	global $con;
	$username = $data['username'];
    $password = md5($data['password']);

    $data = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
    $cek = mysqli_fetch_assoc($data);

    return $cek;
}

function tambahuser($data){
		global $con;

        if ( $data['no_admin'] == "08887599774" ) {
                
            if ( $data['password2'] == $data['password'] ) {
                $id = $data['id'];
                $username = htmlspecialchars( $data['username'] );
                $password = htmlspecialchars( md5($data['password']) ); 

                $query = "INSERT INTO admin VALUES 
                        ('$id','$username','$password')
                        ";

                mysqli_query($con, $query);

            }else{
                header("Location: registrasi.php?pesan=passwordtidaksesuai");
            }

        }else{
            header("Location: registrasi.php?pesan=noadminsalah");
        }

       

		

        return mysqli_affected_rows($con);

}

function cekpassword($data){
    global $con;

    $password_sekarang = md5( $data['password_sekarang'] );
    $username = $_SESSION['username'];

    $query =  "SELECT * FROM admin WHERE password = '$password_sekarang' AND username = '$username' ";

    mysqli_query($con,$query);
    return mysqli_affected_rows($con);

}

function ubahpassword($data){
    global $con;


    if ( $data['password_baru2'] == $data['password_baru'] ) {

            $username = $_SESSION['username'];
            $password_baru = md5( htmlspecialchars($data['password_baru']) );

            mysqli_query ($con, "UPDATE admin SET username = '$username', password = '$password_baru' WHERE username = '$username' ");

        }
        else{
        header("Location: gantipw.php?pesan=tidaksesuai");
        return false;
    }

   
    return mysqli_affected_rows($con);
}

function editharga($data){
    global $con;

    $id = $data['id'];
    $harga = $data['harga'];

    mysqli_query ($con,"UPDATE harga SET harga_per_kilo = '$harga' WHERE id = '$id' ");

    return mysqli_affected_rows($con);

}

 // ========================= PELANGGAN =========================
function tampilpelanggan($query){
    global $con;    

    $data = mysqli_query($con,$query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($data) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahpelanggan($data){
    global $con;

    $id = $data['id'];
    $nama = htmlspecialchars( $data['nama'] );
    $hp = htmlspecialchars( $data['hp'] );
    $alamat = htmlspecialchars( $data['alamat'] );

    $query = "INSERT INTO pelanggan VALUES
                ('$id','$nama','$hp','$alamat')
                    ";
    mysqli_query($con,$query);

    return mysqli_affected_rows($con);
}

function editpelanggan($data){
    global $con;

    $id = $data['id'];
    $nama = htmlspecialchars( $data['nama'] );
    $hp = htmlspecialchars( $data['hp'] );
    $alamat = htmlspecialchars( $data['alamat'] );

    $query = "UPDATE pelanggan SET
                pelanggan_id = '$id',
                pelanggan_nama = '$nama',
                pelanggan_hp = '$hp',
                pelanggan_alamat = '$alamat'
                WHERE pelanggan_id = '$id'
                    ";
    mysqli_query($con,$query);

    return mysqli_affected_rows($con);
}




function hapuspelanggan($id){
    global $con;

    mysqli_query($con, "DELETE FROM pelanggan WHERE pelanggan_id = $id ");

    return mysqli_affected_rows($con);
}

// ========================= PELANGGAN =========================




// ========================= DTRANSAKSI =========================


function tampildtransaksi($query){
    global $con;
    $res = mysqli_query($con,$query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($res) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahdtransaksi($data){
    global $con;

    $id = $data['id'];
    $pelanggan = $data['pelanggan'] ;
    $berat = htmlspecialchars( $data['berat'] );
    $tgl_selesai = htmlspecialchars( $data['tgl_selesai'] );
    $tgl_hari_ini = date('M-y-d');
    $status = 0;

    $res = mysqli_query($con, "SELECT * FROM harga");
    $harga_per_kilo = mysqli_fetch_assoc($res);
    $harga = $berat * $harga_per_kilo['harga_per_kilo'];



    mysqli_query($con, "INSERT INTO transaksi VALUES 
                    ('$id','$tgl_hari_ini','$pelanggan','$harga','$berat','$tgl_selesai','$status')
                    ");

    
    $id_terakhir = mysqli_insert_id($con);
    $jenis_pakaian = $data['jenis_pakaian'] ;
    $jumlah_pakaian = $data['jumlah_pakaian'] ;

    for ($x=0; $x < count($jenis_pakaian); $x++) { 
        if ( $jenis_pakaian[$x] && $jumlah_pakaian[$x] != "") {
            mysqli_query( $con, "INSERT INTO pakaian VALUES 
                                    ('','$id_terakhir','$jenis_pakaian[$x]','$jumlah_pakaian[$x]')
                                    " );
        }
    }

    return mysqli_affected_rows($con);


}


function editdtransaksi($data){
    global $con;

    $id = $data['id'];
    $pelanggan = $data['pelanggan'] ;
    $berat = htmlspecialchars( $data['berat'] );
    $tgl_selesai = htmlspecialchars( $data['tgl_selesai'] );
    $tgl_buat = $data['tgl_buat'];
    $tgl_hari_ini = date('M-y-d');
    $status = $data['status'];

    $res = mysqli_query($con, "SELECT * FROM harga");
    $harga_per_kilo = mysqli_fetch_assoc($res);
    $harga = $berat * $harga_per_kilo['harga_per_kilo'];

    


    mysqli_query($con, "UPDATE transaksi SET 
                    transaksi_id = '$id',   
                    transaksi_tgl = '$tgl_buat',
                    transaksi_pelanggan = '$pelanggan',
                    transaksi_harga = '$harga',
                    transaksi_berat = '$berat',
                    transaksi_tgl_selesai = '$tgl_selesai',
                    status_transaksi = '$status'
                    WHERE transaksi_id = '$id'
                    ");

    $jenis_pakaian = $data['jenis_pakaian'] ;
    $jumlah_pakaian = $data['jumlah_pakaian'] ;

    mysqli_query($con, "DELETE FROM pakaian WHERE pakaian_transaksi = $id ");

    // for ($x=1; $x < count($jenis_pakaian); $x++) { 
    //     if ( $jenis_pakaian[$x] && $jumlah_pakaian[$x] != "") {
    //         mysqli_query( $con, "INSERT INTO pakaian VALUES 
    //                                 ('','$id','$jenis_pakaian[$x]','$jumlah_pakaian[$x]')
    //                                 " );
    //     }
    // }

    return mysqli_affected_rows($con);




}

function hapusdtransaksi($id){
    global $con;

    mysqli_query($con, "DELETE FROM transaksi WHERE transaksi_id = $id ");

    return mysqli_affected_rows($con);
}


 ?>




