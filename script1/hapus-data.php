<?php

include 'config/function.php';

//menerima nisn yang dipilih administrator
$id_produk = (int)$_GET['id_produk'];

if (delete_data($id_produk) > 0) {
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