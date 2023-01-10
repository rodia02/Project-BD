<?php

include 'config/function.php';

$id_produk = (int)$_GET['id_produk'];

if (lelang($id_produk) > 0) {
    delete_data($id_produk);
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
