<?php 

 require '../../function.php';

$id = $_GET['id'];
 	if ( hapusdtransaksi($id) ) {
 		  echo "<script>
                    alert('Data Transaksi Berhasil Dihapus')
                    document.location.href='../transaksi.php?pesan=berhasildihapus'
                  </script>";
 	}


 ?>