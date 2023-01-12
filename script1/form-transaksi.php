<?php

$title = 'Formulir Persetujuan Nasabah';
include 'layout/header.php';
include 'config/function.php';

//cek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (create_transaksi($_POST) > 0) {
      echo "<script>
              document.location.href = 'data-gadai.php';
             </script>";
    }
    else {
        echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'data-gadai.php';
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
                <label for="jlh_pinjaman" class="form-label">Jumlah Pinjaman</label>
                <input type="text" class="form-control" id="jlh_pinjaman" name="jlh_pinjaman" style="width: 60%;" 
                placeholder="Jumlah pinjaman yang diajukan"  required>
            </div>

 		    <div class="mb-3">
                <label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                <input class="form-control" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo" type="date" style="width: 60%" required>
            </div>

            <div class="mb-3">
                <label for="id_produk" class="form-label">ID Barang</label>
                <select class="form-select" id="id_produk" name="id_produk" style="width: 60%" required>
                    <option selected value="">::Pilih Barang::</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($db,"SELECT * FROM barang") or die (mysqli_error($db));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[id_produk]> $data[rincian_barang] </option>";
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_pegawai" class="form-label">ID Pegawai</label>
                <select class="form-select" id="id_pegawai" name="id_pegawai" style="width: 60%" required>
                    <option selected value="">::Pilih Barang::</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($db,"SELECT * FROM karyawan, detail_data_karyawan") or die (mysqli_error($db));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[id_pegawai]> $data[nama] </option>";
                }
                ?>
                </select>
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