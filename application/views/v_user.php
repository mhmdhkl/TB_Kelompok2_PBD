<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">

            <h3 class="card-title">Data User</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newUserModal">
                    <i class=" fas fa-plus"></i>
                    Add New User
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
            ?>
            <table class="table table-bordered table-striped" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($user as $u => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_user ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->password ?></td>
                            <td><?php
                                if ($value->level_user == 1) {
                                    echo '<span class = "badge bg-primary">Admin</span>';
                                } else {
                                    echo '<span class = "badge bg-success">User</span>';
                                }
                                ?>
                            </td>
                            <td><button data-toggle="modal" data-target="#edit<?= $value->id_user ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                <button data-toggle="modal" data-target="#delete<?= $value->id_user ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Tambah User -->
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

<!-- Modal Edit User -->
<?php foreach ($user as $u => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('user/edit/' . $value->id_user); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" value="<?= $value->nama_user ?>" id="nama_user" name="nama_user" placeholder="Nama User" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?= $value->username ?>" id="username" name="username" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" value="<?= $value->password ?>" id="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label>Level User</label>
                        <select class="form-control" name="level_user" id="level_user">
                            <option value="" disabled>Select Level User</option>
                            <option value="1" <?php if ($value->level_user == 1) {
                                                    echo 'selected';
                                                } ?>>Admin</option>
                            <option value="2" <?php if ($value->level_user == 2) {
                                                    echo 'selected';
                                                } ?>>User</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Hapus User -->
<?php foreach ($user as $u => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserModalLabel">Delete <?= $value->nama_user ?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus akun user <?= $value->nama_user ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('user/delete/' . $value->id_user) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>