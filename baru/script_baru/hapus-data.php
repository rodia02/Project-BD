<?php

include 'config/function.php';

//menerima nisn yang dipilih administrator
//$nomor = (int)$_GET['nomor'];
$id_produk = (int)$_GET['id_produk'];

if (backup_data($id_produk) > 0) {
  delete_data($id_produk);
  delete_transaksi($id_produk);
  delete_produk($id_produk);
    echo "<script> 
            alert('Data berhasil dihapus!');
            document.location.href = 'data-gadai.php';
          </script>";
}

else {
    echo "<script> 
            alert('Data gagal dihapus!');
            document.location.href = 'data-gadai.php';
          </script>";
}

?>