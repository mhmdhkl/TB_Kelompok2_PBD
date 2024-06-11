<div class="col-sm-12">

    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
        echo $this->session->flashdata('pesan');
        echo '</h5></div>';
    }
    ?>

    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th>No. Order</th>
                            <th>Nama Penerima</th>
                            <th>Tanggal Order</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($pesanan as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order; ?></td>
                                <td><?= $value->nama_penerima; ?></td>
                                <td><?= $value->tgl_order; ?></td>
                                <td>
                                    <b><?= $value->ekspedisi; ?></b><br>
                                    Paket : <?= $value->paket; ?><br>
                                    Ongkir : <?= number_format($value->ongkir, 0); ?><br>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>
                                    <?php if ($value->status_bayar == 0) { ?>
                                        <span class="badge badge-warning">Belum Bayar</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Sudah Bayar</span><br>
                                        <span class="badge badge-secondary">Menunggu Verifikasi</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <a href="<?= base_url('admin/detail_pembayaran/' . $value->no_order) ?>" class="btn btn-sm btn-flat btn-secondary">Detail Pembayaran</a>
                                        <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
                                        <a href="<?= 'https://wa.me/' . $value->no_hp . '?text=Halo+Assalamualaikum%0D%0ASaya+dari+Admin+Percetakan+Atika%0D%0AApakah+benar+atas+nama+' .
                                                        $value->nama_penerima . '+memesan+Cetakan+dengan+No.Order+' .
                                                        $value->no_order ?>" class="btn btn-sm btn-flat btn-primary">WA</a>
                                    <?php } else {   ?>
                                        <a href="<?= base_url('admin/detail_pembayaran/' . $value->no_order) ?>" class="btn btn-sm btn-flat btn-secondary">Detail Pembayaran</a>
                                        <a href="<?= 'https://wa.me/' . $value->no_hp . '?text=Halo+Assalamualaikum%0D%0ASaya+dari+Admin+Percetakan+Atika%0D%0AApakah+benar+atas+nama+' .
                                                        $value->nama_penerima . '+memesan+Cetakan+dengan+No.Order+' .
                                                        $value->no_order ?>" class="btn btn-sm btn-flat btn-primary">WA</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th>No. Order</th>
                            <th>Tanggal Order</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($pesanan_diproses as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order; ?></td>
                                <td><?= $value->tgl_order; ?></td>
                                <td>
                                    <b><?= $value->ekspedisi; ?></b><br>
                                    Paket : <?= $value->paket; ?><br>
                                    Ongkir : <?= number_format($value->ongkir, 0); ?><br>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>

                                    <span class="badge badge-primary">Diproses/Dikemas</span>

                                </td>
                                <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>" class="btn btn-sm btn-flat btn-primary"><i class="fas fa-shipping-fast"></i> Kirim</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <!-- PESANAN DIKIRIM -->
                    <table class="table table-bordered">
                        <tr>
                            <th>No. Order</th>
                            <th>Tanggal Order</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                            <th>No Resi</th>
                        </tr>
                        <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order; ?></td>
                                <td><?= $value->tgl_order; ?></td>
                                <td>
                                    <b><?= $value->ekspedisi; ?></b><br>
                                    Paket : <?= $value->paket; ?><br>
                                    Ongkir : <?= number_format($value->ongkir, 0); ?><br>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>

                                    <span class="badge badge-success">Dikirim</span>

                                </td>
                                <td>
                                    <h4><?= $value->no_resi; ?></h4>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th>No. Order</th>
                            <th>Tanggal Order</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                            <th>No Resi</th>
                        </tr>
                        <?php foreach ($pesanan_selesai as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order; ?></td>
                                <td><?= $value->tgl_order; ?></td>
                                <td>
                                    <b><?= $value->ekspedisi; ?></b><br>
                                    Paket : <?= $value->paket; ?><br>
                                    Ongkir : <?= number_format($value->ongkir, 0); ?><br>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>

                                    <span class="badge badge-success">Diterima</span>

                                </td>
                                <td>
                                    <h4><?= $value->no_resi; ?></h4>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<?php foreach ($pesanan_masuk as $key => $value) { ?>
    <!-- Modal Cek Bukti Pembayaran -->
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th> : </th>
                            <td><?= $value->nama_bank ?></td>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <td><?= $value->atas_nama ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Order</th>
                            <th>:</th>
                            <td><?= $value->alamat ?>, <?= $value->kode_pos ?></td>
                        </tr>
                        <tr>
                            <th>Barang Yang Dipesan</th>
                            <th>:</th>
                            <td>
                                <?= $value->nama_barang ?> : <?= $value->qty ?>
                            </td>
                        </tr>
                        <tr>
                            <th>No. Rek</th>
                            <th>:</th>
                            <td><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                        </tr>
                    </table>

                    <img src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" class="img-fluid pad" alt="">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <!-- MODAL KIRIM -->
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>

                    <table class="table">
                        <tr>
                            <th>Ekspedisi</th>
                            <th> : </th>
                            <td><?= $value->ekspedisi ?></td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <td><?= $value->paket ?></td>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <td>Rp. <?= number_format($value->ongkir, 0) ?></td>
                        </tr>
                        <tr>
                            <th>No. Resi</th>
                            <th>:</th>
                            <td><input name="no_resi" class="form-control" placeholder="Masukkan No Resi" required></td>
                        </tr>
                    </table>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close() ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.MODAL KIRIM -->
<?php } ?>