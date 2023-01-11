<?php

$title = 'PT. GADAI SENYUM SUKACITA';
include 'layout/header.php';
include 'config/function.php';
$data_karyawan = select("SELECT * FROM detail_data_karyawan ORDER BY id_produk");
?>

<style type=text/css>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            background-color: #D3D3D3;
        }
        
        .banner {
            color: rgb(6, 7, 7);
            z-index: 1;
            padding: 5px 5px;
            border: 5px solid rgb(6, 7, 7);
        }

        section {
            margin: 75px 200px;
        }
</style>
</head>
<body>
<section class="banner">
    <center><h3>KARYAWAN</h3>
            <h4>PT. GADAI SENYUM SUKACITA</h4>
    </center>
</section>

<div class="container mt-4">

<table class="table table-hover" id="tabel-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th></th>
            </tr>  
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_karyawan as $karyawan) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $karyawan['nama']; ?></td>
                <td><?= $karyawan['jenis_kelamin']; ?></td>
                <td><?= $karyawan['alamat']; ?></td>
                <td>
                    <a href="detail-karyawan.php?id_produk=<?= $karyawan['id_produk'];?>" class="btn btn-dark">
                        <i class='fa fa-magnifying-glass'></i> Detail
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
