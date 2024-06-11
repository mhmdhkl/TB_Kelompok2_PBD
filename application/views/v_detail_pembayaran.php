<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-shopping-cart"></i> Percetakan Paminggir.
                    <br><?= $title; ?>
                    <small class="float-right"></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Order</th>
                            <th>Atas Nama</th>
                            <th>Tanggal Order</th>
                            <th>Barang Yang Dipesan</th>
                            <th>Qty</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesanan_masuk as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_order; ?></td>
                                <td><?= $value->atas_nama; ?></td>
                                <td><?= $value->tgl_order; ?></td>
                                <td><?= $value->nama_barang; ?></td>
                                <td><?= $value->qty; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <h3>Total Bayar : Rp. <?= number_format($value->total_bayar); ?></h3>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                <button data-toggle="modal" data-target="#bukti<?= $value->no_order ?>" class="btn btn-sm btn-flat btn-primary"><i class="fas fa-image"></i>Lihat Bukti Pembayaran</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div><!-- /.col -->

<?php foreach ($pesanan_masuk as $key => $value) { ?>
    <!-- MODAL KIRIM -->
    <div class="modal fade" id="bukti<?= $value->no_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <img src="<?= base_url('assets/bukti_bayar/') . $value->bukti_bayar ?>" class="img-thumbnail">
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.MODAL KIRIM -->
<?php } ?>