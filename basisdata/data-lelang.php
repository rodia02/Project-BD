<?php

$title = 'PT. GADAI SENYUM SUKACITA';
include 'layout/header.php';
include 'config/function.php';
$data_penggadai = select("SELECT * FROM produk ORDER BY id_produk");

?>

<style type=text/css>
    body {
        background-color: #D3D3D3;
    }
</style>

<div class="container mt-4">
    <h2>LELANG</h2>
    <br><br><br>

<table class="table table-hover" id="tabel-data">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Produk</th>
                <th>Nama Barang</th>
                <th>Harga Lelang</th>
                <th>Aksi</th>
            </tr>  
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_penggadai as $penggadai) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>0<?= $penggadai['id_produk']; ?></td>
                <td><?= $penggadai['namaproduk']; ?></td>
                <td><?= $penggadai['taksiran']; ?></td>
                <td>
                    <a href="form-lelang.php?nomor=<?= $penggadai['id_produk'];?>" class="btn btn-warning">
                        <i class='fa fa-shopping-cart'></i> Beli
                    </a>
                    <a href="data-transaksi.php?nomor=<?= $penggadai['id_produk'];?>" class="btn btn-warning">
                        <i class='fa fa-envelope'></i> Inbox
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
</div>

<?php

include 'layout/footer.php'

?>
