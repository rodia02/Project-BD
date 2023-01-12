<?php

include 'koneksi.php';

//fungsi menampilkan data
function select($query)
{
    //panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//fungsi backup data
function backup_data($id_produk)
{
    global $db;

    $query = "INSERT INTO backup_data(no_kwitansi) SELECT no_kwitansi FROM transaksi where id_produk = $id_produk";
    $query = "INSERT INTO backup_data(nik) SELECT nik FROM penggadai where id_produk = $id_produk";
    $query = "INSERT INTO backup_data(id_produk) SELECT id_produk FROM barang where id_produk = $id_produk";
    
}

//fungsi menghapus data 
function delete_data($id_produk)
{
    global $db;

    //query hapus data penggadai
    $query = "DELETE FROM penggadai WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus produk
function delete_produk($id_produk)
{
    global $db;

    //query hapus data produk
    $query = "DELETE FROM barang WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus transaksi dan pembeli
function delete_transaksi($id_produk)
{
    global $db;

    //query hapus pembeli
    $query = "DELETE FROM transaksi WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi hapus data penggadai dan tampilkan data produk
function lelang($id_produk)
{
    global $db;

    $query = "SELECT * FROM barang WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi hapus data penggadai dan tampilkan data produk
function accept_transaksi($id_produk)
{
    global $db;

    $query = "DELETE FROM transaksi WHERE id_produk = $id_produk";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}


//fungsi menambahkan data dari formulir pendaftaran
function create_data_barang($post)
{
    global $db;

    $id_pegawai = $post['id_pegawai'];
    $taksiran = $post['taksiran'];
    $rincian_barang = $post['rincian_barang'];
    $jenis_barang = $post['jenis_barang'];
    //query tambah data
   $query = "INSERT INTO barang VALUES(null, '$rincian_barang', '$jenis_barang', '$taksiran')WHERE id_pegawai = $id_pegawai";

   mysqli_query($db, $query);

   return mysqli_affected_rows($db);
}

function create_data_penggadai($post)
{
    global $db;

    $nama = $post['nama'];
    $nik = $post['nik'];   
    $tanggal_lahir = $post['tanggal_lahir'];
    $alamat = $post['alamat'];
    $no_hp = $post['no_hp'];
    $jlh_pinjaman = $post['jlh_pinjaman'];
    $tgl_jatuh_tempo = $post["tgl_jatuh_tempo"];
    //query tambah data
    $query = "INSERT INTO penggadai VALUES(null, '$nama', '$no_hp', '$tanggal_lahir', '$nik', '$alamat')";
    $query1 = "INSERT INTO transaksi VALUES(null, '$jlh_pinjaman', '$tgl_jatuh_tempo')";

   mysqli_query($db, $query);
   mysqli_query($db, $query1);

   return mysqli_affected_rows($db);
}

//fungsi menambahkan data dari formulir lelang
function create_pembelilelang($post)
{
    global $db;

    $nama = $post['nama'];
    $nik = $post['nik'];
    $no_hp = $post['no_hp'];

    //query tambah data
    $query = "INSERT INTO pembeli_lelang VALUES(null, '$nama', '$nik', '$no_hp')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
} 

//fungsi update data 
function update_data($post)
{
    global $db;

    $id_produk = $post['id_produk'];
    $nama = $post['nama'];
    $nik = $post['nik'];  
    $rincian_barang = $post['rincian_barang'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $alamat = $post['alamat'];
    $taksiran = $post['taksiran'];
    $no_hp = $post['no_hp'];
    $jlh_pinjaman = $post['jlh_pinjaman'];
    $tgl_jatuh_tempo = $post['tgl_jatuh_tempo'];
    $jenis_barang = $post['jenis_barang'];

    //query ubah data
    $query = "UPDATE penggadai SET nama = '$nama', no_hp = '$no_hp', tanggal_lahir = '$tanggal_lahir', 
    nik = '$nik', alamat = '$alamat' WHERE id_produk = $id_produk";
    //query ubah data produk
    $query1 = "UPDATE barang SET rincian_barang = '$rincian_barang', taksiran = '$taksiran', jenis_barang = '$jenis_barang' WHERE id_produk = $id_produk";
    $query2 = "UPDATE transaksi SET tgl_jatuh_tempo = '$tgl_jatuh_tempo', jlh_pinjaman = '$jlh_pinjaman' WHERE id_produk = $id_produk";

    mysqli_query($db, $query);
    mysqli_query($db, $query1);
    mysqli_query($db, $query2);

    return mysqli_affected_rows($db);
}

?>