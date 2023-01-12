<?php

$title = 'PT. GADAI SENYUM SUKACITA';
include 'layout/header.php';
include 'config/function.php';
$data_barang = select("SELECT * FROM barang ORDER BY id_produk");
$data_karyawan = select("SELECT * FROM detail_data_karyawan ORDER BY id_produk");
$data_transaksi = select("SELECT * FROM transaksi ORDER BY id_produk");

?>

<style type=text/css>
    body {
        background-color: #cc0;
    }
</style>

<div class="container mt-4">
    <h2>DATA PEGADAIAN</h2>
    <div>
        <a href="form-gadai.php">
            <button type="button" class="btn btn-dark mt-2 mb-4"
            style="float: left; font-family: 'Quicksand';">Formulir Persetujuan Nasabah</button>
        </a>
        <br><br><br>
    </div>

    <table class="table table-hover" id="tabel-data">
        <thead>
            <tr>
                <th>Id Produk</th>
                <th>Jenis Barang</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Admin</th>
                <th>Aksi</th>
                <th>Status</th>
            </tr>  
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_barang as $barang)  : ?>
            <?php foreach($data_karyawan as $karyawan)  : ?>
            <?php foreach($data_transaksi as $transaksi)  : ?>

            <tr></tr>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['jenis_barang']; ?></td>
                <td><?= $transaksi['tgl_jatuh_tempo']; ?></td>
                <td><?= $karyawan['nama']; ?></td>
                <td style="width:30%;">
                    <a href="detail-data.php?nomor=<?= $barang['id_produk'];?>" class="btn btn-dark">
                        <i class="fa-solid fa-magnifying-glass"></i> Detail
                    </a>
                    <a href="ubah-data.php?nomor=<?= $barang['id_produk'];?>" class="btn btn-success">
                        <i class="fa-solid fa-pen-to-square"></i> Ubah
                    </a>
                </td>
                <td>
                    <a href="lelang.php?nomor=<?= $barang['id_produk'];?>" class="btn btn-primary">
                        <i class="fa-solid fa-bank"></i> Lelang
                    </a>
                    <a href="hapus-data.php?nomor=<?= $barang['id_produk'];?>" class="btn btn-danger" 
                        onclick="return confirm('Apakah ingin menghapus data ini?');">
                        <i class="fa-solid fa-trash"></i> Lunas
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?php

include 'layout/footer.php'

?>
