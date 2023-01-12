<?php

$title = 'Formulir Persetujuan Nasabah';
include 'layout/header.php';
include 'config/function.php';

//cek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (create_data($_POST) > 0) {
      echo "<script>
              alert('Data berhasil ditambah!');
              document.location.href = 'data-gadai.php';
             </script>";
    }
  
    else {
      echo "<script>
              alert('Data gagal ditambah!');
              document.location.href = 'form-gadai.php';
             </script>";
    }
}

?>

<style type=text/css>
    body {
        background-color: #cc0;
    }
</style>

<div class="container mt-4">
    <h3>Formulir Persetujuan Nasabah</h3>

    <form action="" method="post">
    <div class="row mt-4" style="border: 1px solid grey;">
        <div class="col-sm mt-3" style="padding: 30px 50px">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap </label>
                <input type="text" class="form-control" id="nama" name="nama" style="width: 60%" placeholder="NAMA PENGGADAI" required>
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                <input type="number" class="form-control" id="nik" name="nik" style="width:60%" placeholder="NIK PENGGADAI"  required>
            </div>

            <div class="mb-3">
                <label for="rincian_barang" class="form-label">Rincian Barang Jaminan</label>
                <textarea class="form-control" id="rincian_barang" name="rincian_barang" rows="2" style="width: 60%" 
                placeholder="Tertera merk, tipe, serta kondisi" required></textarea>
            </div>

            <div class="mb-3">
                <label for="taksiran">Taksiran Harga</label>
                <input type="text" class="form-control" id="taksiran" name="taksiran" style="width: 60%;" 
                placeholder="Taksiran Harga Barang yang digadai"  required>
            </div>

            <div class="mb-3">
                <label for="jlh_pinjaman" class="form-label">Jumlah Pinjaman</label>
                <input type="text" class="form-control" id="jlh_pinjaman" name="jlh_pinjaman" style="width: 60%;" 
                placeholder="Jumlah pinjaman yang diajukan"  required>
            </div>

        </div>
            
        <div class="col-sm mt-3" style="padding: 30px 50px">
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" style="width: 60%" placeholder="ALAMAT" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" style="width: 60%" required>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP Aktif (No WA)</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" style="width: 40%;" 
                placeholder="contoh: 081xxxxxxxxx"  required>
            </div>

            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Jenis Barang</label>
                <select class="form-select" id="jenis_barang" name="jenis_barang" style="width: 60%" required>
                    <option selected value="">::Pilih Jenis Barang::</option>
                    <option value="Kendaraan">Kendaraan</option>
                    <option value="Elektronik">Elektronik</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                <input class="form-control" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo" type="date" style="width: 60%" required>
            </div>

        </div>
  </div>

    <button type="submit" name="tambah" class="btn btn-primary mt-4" 
    style="float: left; font-family: 'Quicksand'; color: white">
       Tambah
    </button>

    <a href="javascript:window.history.go(-1);" class="btn btn-dark mt-4" style="margin-left: 4pt">
       Kembali
    </a>


  </form>

</div>


<?php

include 'layout/footer.php';

?>