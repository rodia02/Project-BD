<?php

include 'config/function.php';

//menerima nisn yang dipilih administrator
$nomor = (int)$_GET['no_kwitansi'];

if (salin_transaksi($nomor) > 0) {
    echo "<script> 
            document.location.href = 'data-transaksi.php';
          </script>";
}

else {
    echo "<script> 
            document.location.href = 'transaksi.php';
          </script>";
}
