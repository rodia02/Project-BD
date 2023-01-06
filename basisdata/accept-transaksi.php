<?php

include 'config/function.php';

$nomor = (int)$_GET['nomor'];

if (accept_transaksi($nomor) > 0) {
    delete_transaksi($nomor);
    echo "<script> 
            alert('Barang dilelang!');
            document.location.href = 'data-lelang.php';
          </script>";
}

else {
    echo "<script> 
            alert('Data gagal dilelang!');
            document.location.href = 'lelang.php';
          </script>";
}
