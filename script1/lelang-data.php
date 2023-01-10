<?php

$title = 'PT. GADAI SENYUM SUKACITA';
include 'layout/header.php';
include 'config/function.php';
$data_barang = select("SELECT * FROM pembeli_lelang ORDER BY id_produk");
?>

<style type=text/css>
    body {
        background-color: #D3D3D3;
    }
</style>

<div class="container mt-4">
    <h2>LELANG</h2>

<table class="table table-hover" id="tabel-pendaftaran">
        <thead>
            <tr>
                <th>Id Produk</th>
                <th>Nama Barang</th>
                <th>Harga Lelang</th>
                <th>Aksi</th>
            </tr>  
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_barang as $barang) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['rincian_barang']; ?></td>
                <td><?= $barang['taksiran']; ?></td>
                <td>
                    <a href="lelang.php?nomor=<?= $barang['id_produk'];?>" class="btn btn-warning">
                        <i class='fa fa-shopping-cart'></i> Beli
                    </a>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
</div>

<?php

include 'layout/footer.php'

?>
