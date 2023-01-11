<?php 
$title = 'Detail Data';
include 'layout/header.php'; 
include 'config/function.php';

//mengambil nisn dari data yg dipilih
$id_produk = (int)$_GET['id_produk'];

$karyawan = select("SELECT * FROM karyawan WHERE id_pegawai = $id_produk")[0];

if (!isset($_SESSION['status_login'])|| $_SESSION["status_login"] !== true){
    echo "<script> 
            alert('Anda tidak dapat mengakses!');
            document.location.href = 'data-karyawan.php';
          </script>";
}
?>

<style type=text/css>
    body {
        background-color: #D3D3D3;
    }
</style>

  <div class="container mt-4">
    <h3>Data <?= $karyawan['nama'] ?></h3>
    <br>
    <table class="table table-striped">
        <tr>
            <td><b>Nama Lengkap</b></td>
            <td><?= $karyawan['nama']; ?></td>
        </tr>

        <tr>
            <td><b>NIK (Nomor Induk Kependudukan)</b></td>
            <td><?= $karyawan['nik']; ?></td>
        </tr>

        <tr>
            <td><b>No HP Aktif (No WA)</b></td>
            <td><?= $karyawan['no_telp']; ?></td>
        </tr>

        <tr>
            <td><b>Jenis Kelamin</b></td>
            <td><?= $karyawan['jenis_kelamin']; ?></td>
        </tr>

        <tr>
            <td><b>Alamat</b></td>
            <td><?= $karyawan['alamat']; ?></td>
        </tr>

        <tr>
            <td><b>Gaji Pokok</b></td>
            <td><?= $karyawan['gaji_pokok']; ?></td>
        </tr>

        <tr>
            <td><b>Gaji Tunjangan</b></td>
            <td><?= $karyawan['gaji_tunjangan']; ?></td>
        </tr>
        
    </table>
    
    	
    <a href="javascript:window.history.go(-1);" class="btn btn-dark mt-4">
        <i class="fa-solid fa-circle-arrow-left"></i> Kembali
    </a>

  </div>
  
<?php include 'layout/footer.php'; ?>