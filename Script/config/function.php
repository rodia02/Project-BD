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

    //query hapus data 
    $query = "DELETE FROM penggadai WHERE nomor = $nomor";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi salin data
function salin_data($nomor)
{
    global $db;

    //query salin data 
    $query = "INSERT INTO lelang (Rincian_Barang, taksiran) SELECT Rincian_Barang, taksiran FROM penggadai WHERE  nomor = $nomor";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menambahkan data dari formulir pendaftaran
function create_data($post)
{
    global $db;

    $nama = $post['nama'];
    $nik = $post['nik'];  
    $Rincian_Barang = $post['Rincian_Barang'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $alamat = $post['alamat'];
    $taksiran = $post['taksiran'];
    $no_telp = $post['no_telp'];
    $jlh_pinjaman = $post['jlh_pinjaman'];
    $tanggal_jatuh_tempo = "00-00-0000";

    //query tambah data
    $query = "INSERT INTO penggadai VALUES(null, '$nama', '$nik', '$Rincian_Barang', 
    '$tanggal_lahir', '$alamat', '$taksiran', '$no_telp', '$jlh_pinjaman','$tanggal_jatuh_tempo')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}   

//fungsi update data 
function update_data($post)
{
    global $db;

    $nomor = $post['nomor'];
    $nama = $post['nama'];
    $nik = $post['nik'];  
    $Rincian_Barang = $post['Rincian_Barang'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $alamat = $post['alamat'];
    $taksiran = $post['taksiran'];
    $no_telp = $post['no_telp'];
    $jlh_pinjaman = $post['jlh_pinjaman'];
    $tanggal_jatuh_tempo = $post['tanggal_jatuh_tempo'];

    //query ubah data
    $query = "UPDATE penggadai SET nama = '$nama', nik = '$nik', Rincian_Barang = '$Rincian_Barang', 
    tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', taksiran = '$taksiran', no_telp = '$no_telp', jlh_pinjaman ='$jlh_pinjaman', tanggal_jatuh_tempo = '$tanggal_jatuh_tempo'
    WHERE nomor = $nomor";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

?>