<?php
include "../partial/koneksi.php";

// file_get_content = mengambil data yang dipost dalam bentuk JSON
$json = file_get_contents('php://input');

// dirubah STRING JSON menjadi ARRAY
$_POST = json_decode($json, true);

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$simpan = $kon->query("INSERT INTO `tbl_siswa`(`nis`, `nama`, `alamat`) VALUES ('$nis','$nama','$alamat')");

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
