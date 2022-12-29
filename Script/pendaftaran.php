<?php

$title = 'PT. GADAI SENYUM SUKACITA';
include 'layout/header.php';
include 'config/function.php';
$data_penggadai = select("SELECT * FROM penggadai ORDER BY nomor");

?>

<style type=text/css>
    body {
        background-color: #D3D3D3;
    }
</style>

<div class="container mt-4">
    <h2>DATA PEGADAIAN</h2>
    <div>
        <a href="form-pendaftaran.php">
            <button type="button" class="btn btn-dark mt-2 mb-4"
            style="float: left; font-family: 'Quicksand';">Formulir Persetujuan Nasabah</button>
        </a>
        <br><br><br>
    </div>

    <table class="table table-hover" id="tabel-pendaftaran">
        <thead>
            <tr>
                <th>Id Produk</th>
                <th>Nama Nasabah</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>  
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_penggadai as $penggadai) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $penggadai['nama']; ?></td>
                <td><?= $penggadai['tanggal_jatuh_tempo']; ?></td>
                <td style="width:30%;">
                    <a href="detail-data.php?nomor=<?= $penggadai['nomor'];?>" class="btn btn-dark">
                        <i class="fa-solid fa-magnifying-glass"></i> Detail
                    </a>
                    <a href="ubah-data.php?nomor=<?= $penggadai['nomor'];?>" class="btn btn-success">
                        <i class="fa-solid fa-pen-to-square"></i> Ubah
                    </a>
                    <a href="hapus-data.php?nomor=<?= $penggadai['nomor'];?>" class="btn btn-danger" 
                        onclick="return confirm('Apakah ingin menghapus data ini?');">
                        <i class="fa-solid fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?php

include 'layout/footer.php'

?>

