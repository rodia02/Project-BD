<?php

$title = 'Ubah Data';
include 'config/function.php'; 
include 'layout/header.php';

//mengambil nisn dari data yg dipilih
$nomor = (int)$_GET['nomor'];

$penggadai = select("SELECT * FROM penggadai WHERE nomor = $nomor")[0];

//cek apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
  if (update_data($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'pendaftaran.php';
           </script>";
  }

  else {
    echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'pendaftaran.php';
           </script>";
  }
}

?>

<style type=text/css>
    body {
        background-color: #D3D3D3;
    }
</style>

<div class="container mt-4">
  <h3>Ubah Data <?= $penggadai['nama'] ?></h3>

  <form action="" method="post">
  <div class="row mt-4" style="border: 1px solid grey;">
        <div class="col-sm mt-3" style="padding: 30px 50px">
            <input type="hidden" name="nomor" value="<?= $penggadai['nomor']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap </label>
                <input type="text" class="form-control" id="nama" name="nama" style="width: 60%" 
                value="<?= $penggadai['nama']; ?>" placeholder="NAMA PESERTA" required>

            </div>

            <div class="mb-3">
                <label for="nisn" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                <input type="number" class="form-control" id="nik" name="nik" style="width:60%" 
                value="<?= $penggadai['nik']; ?>" placeholder="NIK PENGGADAI"  required>
            </div>

            <div class="mb-3">
                <label for="Rincian_Barang" class="form-label">Rincian Barang Jaminan</label>
                <textarea class="form-control" id="Rincian_Barang" name="Rincian_Barang" rows="2" style="width: 60%" 
                placeholder="Tertera merk, tipe, serta kondisi" required><?= $penggadai['Rincian_Barang']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="taksiran">Taksiran Harga</label>
                <input type="text" class="form-control" id="taksiran" name="taksiran" style="width: 60%;" 
                value="<?= $penggadai['taksiran']; ?>" placeholder="Taksiran Harga Barang yang digadai"  required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" style="width: 60%" 
                value="<?= $penggadai['tanggal_lahir']; ?>" required>
            </div>

        </div>
            
        <div class="col-sm mt-3" style="padding: 30px 50px">
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" style="width: 60%" 
                placeholder="ALAMAT" required><?= $penggadai['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="jlh_pinjaman" class="form-label">Jumlah Pinjaman</label>
                <input type="text" class="form-control" id="jlh_pinjaman" name="jlh_pinjaman" style="width: 60%;" 
                value="<?= $penggadai['jlh_pinjaman']; ?>" placeholder="Jumlah pinjaman yang diajukan"  required>
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">No HP Aktif (No WA)</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" style="width: 40%;" 
                value="<?= $penggadai['no_telp']; ?>" placeholder="contoh: 081xxxxxxxxx"  required>
            </div>

            <div class="mb-3">
                <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                <input class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" type="date" style="width: 60%" 
                value="<?= $penggadai['tanggal_jatuh_tempo']; ?>" required>
            </div>
        </div>
  </div>

    <button type="submit" name="ubah" class="btn btn-success mt-4" style="float: left;">
        <i class="fa-solid fa-pen-to-square"></i> Ubah
    </button>
    <a href="javascript:window.history.go(-1);" class="btn btn-dark mt-4" style="margin-left: 4pt">
      <i class="fa-solid fa-circle-arrow-left"></i> Kembali
    </a>

  </form>
</div>
  
<?php include 'layout/footer.php'; ?>