<?php

$title = 'PT. GADAI SENYUM SUKACITA';
include 'layout/header.php';
include 'config/function.php';

$data_barang = select("SELECT * FROM transaksi AS t INNER JOIN 
                barang AS b ON b.id_produk = t.id_produk INNER JOIN
                pembeli_lelang AS p ON t.id_produk = p.id_produk INNER JOIN 
                karyawan AS k ON t.id_pegawai = k.id_pegawai INNER JOIN
                detail_data_karyawan AS d ON k.nik = d.nik WHERE b.label_barang ='Lelang'");
//$data_karyawan  = select("SELECT * FROM karyawan INNER JOIN
                //detail_data_karyawan ON karyawan.nik= detail_data_karyawan.nik");
$data_detail = select("SELECT nama, no_hp FROM pembeli_lelang 
                AS p,transaksi AS t WHERE p.id_produk = t.id_produk");
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
                <th>PEMBELI</th>
                <th>ADMIN</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>  
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_barang as $barang)  : ?>
            <?php //foreach($data_karyawan as $karyawan)  : ?>
            <?php foreach($data_detail as $detail)  : ?>

            <tr></tr>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['id_produk']; ?></td>
                <td><?= $barang['jenis_barang']; ?></td>
                <td><?= $detail['nama']; ?></td>
                <td><?= $barang['nama']; ?></td>
                <td><?= $detail['no_hp']; ?></td>
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

