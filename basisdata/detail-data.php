<?php 

$title = 'Detail Data';
include 'layout/header.php'; 
include 'config/function.php';

//mengambil data dari id yg dipilih
$nomor = (int)$_GET['nomor'];

$penggadai = select("SELECT * FROM penggadai WHERE nomor = $nomor")[0];
$produk = select("SELECT * FROM produk WHERE id_produk = $nomor")[0];

?>

<style type=text/css>
    body {
        background-color: #D3D3D3;
    }
</style>

  <div class="container mt-4">
    <h3>Data <?= $penggadai['nama'] ?></h3>
    <br>
    <table class="table table-striped">
        <tr>
            <td><b>Nama Lengkap</b></td>
            <td><?= $penggadai['nama']; ?></td>
        </tr>

        <tr>
            <td><b>NIK (Nomor Induk Kependudukan)</b></td>
            <td><?= $penggadai['nik']; ?></td>
        </tr>

        <tr>
            <td><b>Tanggal Lahir</b></td>
            <td><?= $penggadai['tanggal_lahir']; ?></td>
        </tr>

        <tr>
            <td><b>Alamat</b></td>
            <td>
                <?= $penggadai['alamat']; ?>/
                <?= $penggadai['alamat1']; ?>
            </td>
        </tr>
        
        <tr>
            <td><b>No HP Aktif (No WA)</b></td>
            <td>
                <?= $penggadai['no_telp']; ?>/
                <?= $penggadai['no_telp1']; ?>
            </td>
        </tr>

        <tr>
            <td><b>Rincian Barang Jaminan</b></td>
            <td><?= $produk['namaproduk']; ?></td>
        </tr>

        <tr>
            <td><b>Taksiran Harga</b></td>
            <td><?= $produk['taksiran']; ?></td>
        </tr>

        <tr>
            <td><b>Jumlah Pinjaman</b></td>
            <td><?= $penggadai['jlh_pinjaman']; ?></td>
        </tr>

        <tr>
            <td><b>Tanggal Jatuh Tempo</b></td>
            <td><?= $penggadai['jatuh_tempo']; ?></td>
        </tr> 

    </table>
    
    	
    <a href="javascript:window.history.go(-1);" class="btn btn-dark mt-4">
        <i class="fa-solid fa-circle-arrow-left"></i> Kembali
    </a>

  </div>
  
<?php include 'layout/footer.php'; ?>