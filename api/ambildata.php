<?php
include "../partial/koneksi.php";
$id = $_GET['id_siswa'];
$ambil = $kon->query("SELECT * FROM tbl_siswa WHERE id_siswa='$id'")->fetch_assoc();

echo json_encode($ambil);
