<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">

            <input id="id_pelanggan" name="id_pelanggan" value="<?= $this->session->userdata('id_pelanggan') ?>" hidden>

            <?php foreach ($barang as $key => $value) { ?>
                <div class="col-sm-4">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <h2 class="lead"><b><?= $value->nama_barang; ?></b></h2>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="300px" height="250px">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-left">
                                        <h4><span class="badge bg-teal">Rp. <?= number_format($value->harga, 0) ?></span></h4>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-right">
                                        <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" class="btn btn-sm bg-secondary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>