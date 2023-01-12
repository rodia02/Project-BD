<?php

include 'config/function.php';

$id_produk = (int)$_GET['id_produk'];

if (salin_data($id_produk) > 0) {
    echo "<script> ;
            document.location.href = 'data-gadai.php';
          </script>";
}

else {
    echo "<script> 
            document.location.href = 'data-gadai.php';
          </script>";
}
