<?php
include "../partial/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$id = $_POST['id_siswa'];

$hapus = $kon->query("DELETE FROM tbl_siswa WHERE id_siswa ='$id'");
if ($hapus == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
