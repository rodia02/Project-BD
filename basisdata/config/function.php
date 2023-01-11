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

//fungsi menghapus data 
function delete_data($nomor)
{
    global $db;

    //query hapus data penggadai
    $query = "DELETE FROM penggadai WHERE nomor = $nomor";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus produk
function delete_produk($nomor)
{
    global $db;

    //query hapus data produk
    $query = "DELETE FROM produk WHERE id_produk = $nomor";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus transaksi dan pembeli
function delete_transaksi($nomor)
{
    global $db;

    //query hapus pembeli
    $query = "DELETE FROM pembeli WHERE nomor = $nomor";
    //queri hapus transaksi
    $query1 = "DELETE FROM transaksi WHERE id_produk = $nomor";

    mysqli_query($db, $query);
    mysqli_query($db, $query1);

    return mysqli_affected_rows($db);
}

//fungsi hapus data penggadai dan tampilkan data produk
function lelang($nomor)
{
    global $db;

    $query = "SELECT * FROM produk WHERE id_produk = $nomor";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi hapus data penggadai dan tampilkan data produk
function accept_transaksi($nomor)
{
    global $db;

    $query = "DELETE FROM transaksi WHERE id_produk = $nomor";
    $query1 = "DELETE FROM pembeli WHERE nomor = $nomor";

    mysqli_query($db, $query);
    mysqli_query($db, $query1);

    return mysqli_affected_rows($db);
}

//fungsi menambahkan data dari formulir pendaftaran
function create_data($post)
{
    global $db;

    $nama = $post['nama'];
    $no_telp = $post['no_telp'];
    $no_telp1 = $post['no_telp1'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $nik = $post['nik'];
    $alamat = $post['alamat'];
    $alamat1 = $post['alamat1'];   
    $jlh_pinjaman = $post['jlh_pinjaman'];
    $jatuh_tempo = $post['jatuh_tempo'];
    $namaproduk = $post['namaproduk'];
    $taksiran = $post['taksiran'];

    //query tambah data penggadai dan produk
    $query = "INSERT INTO penggadai VALUES(null, '$nama', '$no_telp', '$no_telp1', '$tanggal_lahir',
     '$nik', '$alamat', '$alamat1', '$jlh_pinjaman', '$jatuh_tempo')";
    $query1 = "INSERT INTO produk VALUES(null, '$namaproduk','$taksiran')";

    mysqli_query($db, $query);
    mysqli_query($db, $query1);

    return mysqli_affected_rows($db);
}   

//fungsi menambahkan data dari formulir karyawan
function create_karyawan($post)
{
    global $db;

    $no_telp = $post['no_telp'];
    $nama = $post['nama'];
    $jenis_kelamin = $post['jenis_kelamin'];
    $nik = $post['nik']; 
    $alamat = $post['alamat'];
    $gaji_pokok = $post['gaji_pokok'];
    $gaji_tunjangan = $post['gaji_tunjangan'] ;

    //query tambah data
    $query = "INSERT INTO karyawan VALUES(null, '$no_telp', '$nama', '$jenis_kelamin', '$nik', '$alamat', '$gaji_pokok', '$gaji_tunjangan')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}   

//fungsi menambahkan data dari formulir lelang
function create_transaksi($post)
{
    global $db;

    $nama = $post['nama'];
    $nik = $post['nik'];
    $no_telp = $post['no_telp'];
    $pembayaran = $post['pembayaran'];
    $no_rek = $post['no_rek'];
    $trans = $post['trans'];
    $id_produk= $post['id_produk'];

    //query tambah data
    $query = "INSERT INTO transaksi VALUES(null,  '$id_produk', '$trans', '$no_rek', '$pembayaran')";
    $query1 = "INSERT INTO pembeli VALUES(null, '$nama', '$nik', '$no_telp')";

    mysqli_query($db, $query);
    mysqli_query($db, $query1);

    return mysqli_affected_rows($db);
}   


//fungsi update data 
function update_data($post)
{
    
$nomor = (int)$_GET['nomor'];

    $penggadai = select("SELECT * FROM penggadai WHERE nomor = $nomor")[0];
    $produk = select("SELECT * FROM produk WHERE id_produk = $nomor")[0];
    global $db;

    $nama = $post['nama'];
    $no_telp = $post['no_telp'];
    $no_telp1 = $post['no_telp1'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $nik = $post['nik'];
    $alamat = $post['alamat'];
    $alamat1 = $post['alamat1'];   
    $jlh_pinjaman = $post['jlh_pinjaman'];
    $jatuh_tempo = $post['jatuh_tempo'];
    $namaproduk = $post['namaproduk'];
    $taksiran = $post['taksiran'];

    //query ubah data penggadai
    $query = "UPDATE penggadai SET nama = '$nama', no_telp = '$no_telp', no_telp1 = '$no_telp1', tanggal_lahir = '$tanggal_lahir', 
    nik = '$nik', alamat = '$alamat', alamat1 = '$alamat1', jlh_pinjaman = '$jlh_pinjaman', jatuh_tempo = '$jatuh_tempo' WHERE nomor = $nomor";
    //query ubah data produk
    $query1 = "UPDATE produk SET namaproduk = '$namaproduk', taksiran = '$taksiran' WHERE id_produk = $nomor";

    mysqli_query($db, $query);
    mysqli_query($db, $query1);

    return mysqli_affected_rows($db);
}


?>