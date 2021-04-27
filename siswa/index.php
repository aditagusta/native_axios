<h1>Data Siswa</h1>
<div class="card">
    <div class="card-header">
        <button class="btn btn-sm btn-primary" type="button" onclick="modalTambah()">Tambah Data</button>
    </div>
    <!-- /.card-header -->

    <div class="card-body" id="tabel">

    </div>

    <!-- /.card-body -->
</div>

<!-- Modal Ubah-->
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Siswa</h5>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input type="hidden" id="siswa" name="siswa" class="form-control">
                        <input type="text" id="nis" name="nis" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpanData()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa</h5>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input type="text" id="nis_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" id="nama_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" id="alamat_" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addData()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- /.card -->
<script>
    $('#tabel').load('api/tabelsiswa.php')

    function modalTambah() {
        $('#modal_tambah').modal('show');
    }

    function addData() {
        var nis_ = $('#nis_').val();
        var nama_ = $('#nama_').val();
        var alamat_ = $('#alamat_').val();
        axios.post('api/tambah.php', {
                // Kiri = Field database - Kanan variabel dari name di form
                nis: nis_,
                nama: nama_,
                alamat: alamat_
        })
        .then(function(res) {
            toastr.info('SUCCESS..')
            $('#tabel').load('api/tabelsiswa.php')
            $('#modal_tambah').modal('hide')
        })
        .catch(function(){
            toast.info('ERROR..')
        })
    }

    function ubahData(id) {
        axios.get('api/ambildata.php?id_siswa=' + id)
            .then(function(res) {
                var data = res.data
                console.log(data);
                $('#modal_ubah').modal('show')
                $('#siswa').val(data.id_siswa)
                $('#nis').val(data.nis)
                $('#nama').val(data.nama)
                $('#alamat').val(data.alamat)
            })
    }

    function simpanData() {
        var id = $('#siswa').val()
        var nis = $('#nis').val()
        var nama = $('#nama').val()
        var alamat = $('#alamat').val()

        axios.post('api/ubahdata.php', {
                id_siswa: id,
                nis: nis,
                nama: nama,
                alamat: alamat
            })
            .then(function(res) {
                toastr.info('SUCCESS..')
                $('#tabel').load('api/tabelsiswa.php')
                $('#modal_ubah').modal('hide')
            })
    }

    function hapusData(id) {
        axios.post('api/hapus.php', {
                'id_siswa': id
            })
            .then(function(res) {
                toastr.info('SUCCESS..')
                $('#tabel').load('api/tabelsiswa.php')
            })
    }
</script>