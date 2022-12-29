<?php

include 'config/function.php';

//menerima nisn yang dipilih administrator
$nomor = (int)$_GET['nomor'];

if (salin_data($nomor) > 0) {
    delete_data($nomor);
    echo "<script> 
            alert('Barang dilelang!');
            document.location.href = 'lelang-data.php';
          </script>";
}

else {
    echo "<script> 
            alert('Data gagal dilelang!');
            document.location.href = 'lelang.php';
          </script>";
}
