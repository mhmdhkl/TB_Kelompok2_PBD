<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">

            <h3 class="card-title">Add Gambar Barang : <?= $barang->nama_barang; ?></h3>
            <div class="card-tools">

            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <?php
            //NOTIFIKASI FORM KOSONG 
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert! ', '</h5> </div>');

            //NOTIFIKASI GAGAL UPLOAD 
            if (isset($error_upload)) {
                echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5> </div>';
            }

            echo form_open_multipart('gambarbarang/add/' . $barang->id_barang); ?>
            <!-- text input -->


            <!-- text input -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Keterangan Gambar</label>
                        <input name="ket" class="form-control" placeholder="Keterangan Gambar" value="<?= set_value('ket') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="preview_gambar" class="form-control" required>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/no_foto.jpg') ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('gambarbarang') ?>" class="btn btn-secondary btn-sm">Kembali</a>
            </div>

            <?php echo form_close() ?>

            <hr>
            <div class="row">
                <?php foreach ($gambar as $key => $value) { ?>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>" margin="auto" id="gambar_load" width="290px" height="200px">
                        </div>
                        <p for="">Keterangan : <?= $value->ket; ?></p>
                        <button data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>" class="btn btn-danger btn-block">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                    </div>
                <?php } ?>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Hapus Barang -->
<?php foreach ($gambar as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_gambar ?>" tabindex="-1" role="dialog" aria-labelledby="newbarangModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newbarangModalLabel">Delete <?= $value->ket ?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>" margin="auto" id="gambar_load" width="290px" height="200px">
                    </div>
                    <h4>Apakah anda ingin menghapus Gambar ?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('gambarbarang/delete/' . $value->id_barang . '/' .
                                    $value->id_gambar) ?>" type="submit" class="btn btn-danger">Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>