<?php 

require '../../function.php';

$id = $_GET['id'];

if ( hapuspelanggan($id) ) {
	echo "<script>document.location.href='../pelanggan.php?pesan=berhasildihapus'</script>";
}
