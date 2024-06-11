<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $total_pesanan_selesai; ?></h3>

            <p>Pesanan Selesai</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $total_barang; ?></h3>

            <p>Barang</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-basket"></i>
        </div>
        <a href="<?= base_url('barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $total_user; ?></h3>
            <p>Pelanggan</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $total_kategori; ?></h3>
            <p>Kategori Barang</p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <a href="<?= base_url('kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="card">
    <div class="card-header">
        Laporan Keuangan
    </div>
    <div class="card-body">
        <h5 class="card-title">Laporan Keuangan Percetakan</h5>
        <p class="card-text">Berikut merupakan total dana yang telah direkap pada sistem.</p>
        <button type="button" class="btn btn-primary mb-2 fw-bold">Total Modal Percetakan : Rp.<?php echo number_format($totalmodal) ?></button> <br>
        <button type="button" class="btn btn-primary mb-2 fw-bold">Total Penggunaan Percetakan : </button> <br>
        <button type="button" class="btn btn-primary mb-2 fw-bold">Total Penghasilan Penjualan : </button>
    </div>
</div>