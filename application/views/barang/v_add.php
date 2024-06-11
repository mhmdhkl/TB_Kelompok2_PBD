<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

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

            echo form_open_multipart('barang/add'); ?>
            <!-- text input -->
            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= set_value('nama_barang') ?>">
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-control">
                            <option value="">Pilih Kategori Barang</option>
                            <?php foreach ($kategori as $kg) : ?>
                                <option value="<?= $kg['id_kategori'] ?>"><?= $kg['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Barang" value="<?= set_value('harga') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Berat (gr)</label>
                        <input type="number" min="0" class="form-control" name="berat" id="berat" placeholder="Berat Barang" value="<?= set_value('berat') ?>">
                    </div>
                </div>
            </div>

            <!-- text input -->
            <div class=" form-group">
                <label>Deskripsi Barang</label>
                <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Deskripsi Barang" value="<?= set_value('deskripsi') ?>"></textarea>
            </div>

            <!-- text input -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="preview_gambar" class="form-control" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/no_foto.jpg') ?>" id="gambar_load" width="400px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm">Kembali</a>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>

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