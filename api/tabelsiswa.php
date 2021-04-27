<?php
include "../partial/koneksi.php";
include "../partial/table.php";
$data = $kon->query("SELECT * FROM tbl_siswa");
?>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $no => $item) { ?>
                <tr>
                    <td><?= $no + 1 ?></td>
                    <td><?= $item['nis'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['alamat'] ?></td>
                    <td>
                        <button class="btn btn-warning" type="button" onclick="ubahData('<?= $item['id_siswa'] ?>')">Ubah</button> | <button class="btn btn-danger" type="button" onclick="hapusData('<?= $item['id_siswa'] ?>')">Hapus</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>