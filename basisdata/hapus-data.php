<?php

include 'config/function.php';

$nomor = (int)$_GET['nomor'];

if (delete_data($nomor) > 0) {
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