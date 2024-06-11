<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">

            <h3 class="card-title">Data Barang</h3>
            <div class="card-tools">
                <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary btn-sm">
                    <i class=" fas fa-plus"></i>
                    Add New Barang
                </a>
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
            <table class="table table-bordered table-striped" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                            <th>Action</th>
                        <?php } else {   ?>

                        <?php } ?>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($barang as $b => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?= $value->nama_barang ?><br>
                                Berat : <?= $value->berat ?> gr
                            </td>
                            <td><?= $value->nama_kategori ?></td>
                            <td>Rp. <?= number_format($value->harga, 0) ?></td>
                            <td><?= $value->deskripsi ?></td>
                            <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                            <?php if ($this->session->userdata('level_user') == 1) { ?>
                                <td>
                                    <a href="<?= base_url('barang/edit/' . $value->id_barang) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <button data-toggle="modal" data-target="#delete<?= $value->id_barang ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                </td>
                            <?php } else {   ?>

                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('user/add'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama User" required>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label>Level User</label>
                    <select class="form-control" name="level_user" id="level_user">
                        <option value="" disabled>Select Level User</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal Hapus Barang -->
<?php foreach ($barang as $b => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="newbarangModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newbarangModalLabel">Delete <?= $value->nama_barang ?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus Barang <?= $value->nama_barang ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('barang/delete/' . $value->id_barang) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>