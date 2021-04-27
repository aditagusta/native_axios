<?php
include "../partial/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$id = $_POST['id_siswa'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$ubah = $kon->query("UPDATE `tbl_siswa` SET `nis`='$nis',`nama`='$nama',`alamat`='$alamat' WHERE `id_siswa`='$id'");
if ($ubah == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
