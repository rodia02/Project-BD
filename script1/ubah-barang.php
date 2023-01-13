<?php

$title = 'Ubah Data';
include 'config/function.php'; 
include 'layout/header.php';

$id_produk = (int)$_GET['id_produk'];

$barang = select("SELECT * FROM barang WHERE id_produk = $id_produk")[0];

if (isset($_POST['lelang'])) {
    if (update_barang($_POST) > 0) {
    echo "<script> 
            document.location.href = 'data-lelang.php';
          </script>";
}

else {
    echo "<script> 
            document.location.href = 'data-lelang.php';
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
  <h3>Ubah Data <?= $barang['rincian_barang'] ?></h3>

  <form action="" method="post">
  <div class="row mt-4" style="border: 1px solid grey;">
        <div class="col-sm mt-3" style="padding: 30px 50px">
        
        <div class="mb-3">
                <label for="rincian_barang" class="form-label">Rincian Barang Jaminan</label>
                <textarea class="form-control" id="Rincian_Barang" name="rincian_barang" rows="2" style="width: 60%" 
                placeholder="Tertera merk, tipe, serta kondisi" required><?= $barang['rincian_barang']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="taksiran">Taksiran Harga</label>
                <input type="text" class="form-control" id="taksiran" name="taksiran" style="width: 60%;" 
                value="<?= $barang['taksiran']; ?>" placeholder="Taksiran Harga Barang yang digadai"  required>
            </div>

            <div class="mb-3">
                <label for="label_barang" class="form-label">Label Barang</label>
                <select class="form-select" id="jenis_barang" name="label_barang" style="width: 60%" required>
                    <option selected value="<?= $barang['label_barang']; ?>">::Pilih ::</option>
                    <option value="Gadai" <?= $barang == 'Gadai' ? 'selected' : null ?>>Gadai</option>
                    <option value="Lelang" <?= $barang == 'Lelang' ? 'selected' : null ?>>Lelang</option>
                </select>
            </div>

            </div>
  </div>

    <button type="submit" name="lelang" class="btn btn-success mt-4" style="float: left;">
        <i class="fa-solid fa-pen-to-square"></i> Lelang
    </button>
    <a href="javascript:window.history.go(-1);" class="btn btn-dark mt-4" style="margin-left: 4pt">
      <i class="fa-solid fa-circle-arrow-left"></i> Kembali
    </a>

  </form>
</div>
  
<?php include 'layout/footer.php'; ?>

