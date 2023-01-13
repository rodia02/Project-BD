<?php

$title = 'PT. GADAI SENYUM SUKACITA';
include 'layout/header.php';
include 'config/function.php';

$data_barang = select("SELECT * FROM pembeli_lelang AS p INNER JOIN 
                 barang AS b ON p.id_produk = b.id_produk");
$data_karyawan  = select("SELECT * FROM karyawan INNER JOIN
                detail_data_karyawan ON karyawan.nik= detail_data_karyawan.nik");
//$data_detail = select("SELECT * FROM barang ORDER BY id_produk");
?>

<style type=text/css>
    body {
        background-color: #cc0;
    }
</style>

<div class="container mt-4">
    <h2>DATA PEMBELI LELANG</h2>
    <table class="table table-hover" id="tabel-data">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Produk</th>
                <th>Jenis Barang</th>
                <th>PEMEBELI</th>
                <th>ADMIN</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>  
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_barang as $barang)  : ?>
            <?php foreach($data_karyawan as $karyawan)  : ?>
            <?php// foreach($data_detail as $detail)  : ?>

            <tr></tr>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['id_produk']; ?></td>
                <td><?= $barang['jenis_barang']; ?></td>
                <td><?= $barang['nama']; ?></td>
                <td><?= $karyawan['nama']; ?></td>
                <td><?= $barang['no_hp']; ?></td>
                <td >
                    <a href="data-pembeli-lelang.php?id_produk=<?= $barang['id_produk'];?>" class="btn btn-primary">
                        <i class="fa-solid fa-bank"></i> Accept
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?php

include 'layout/footer.php'

?>

