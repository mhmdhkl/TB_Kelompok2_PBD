<div class="row">
    <div class="col-sm-2">
        <!-- Select multiple-->
        <div class="card card-solid">
            <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">Cari Kategori</h5>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php foreach ($kategori as $key => $value) { ?>
                        <li class="list-group-item"><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>">
                                <?= $value->nama_kategori ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-10">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row d-flex align-items-stretch">


                    <?php foreach ($barang as $key => $value) { ?>

                        <div class="col-sm-4 d-flex align-items-stretch">
                            <?php
                            echo form_open('belanja/add');
                            echo form_hidden('id', $value->id_barang);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $value->harga);
                            echo form_hidden('name', $value->nama_barang);
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                            ?>
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    <h2 class="lead"><b><?= $value->nama_barang; ?></b></h2>
                                    <p class="text-muted text-sm"><b>Kategori : </b> <?= $value->nama_kategori; ?></p>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" class="img-fluid" width="500px">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="text-left">
                                                <h5><span class="badge bg-teal">Rp. <?= number_format($value->harga, 0) ?></span></h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="text-right">
                                                <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" class="btn btn-sm bg-secondary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                                                    <i class="fas fa-cart-plus"></i> Tambahkan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menambahkan Barang Ke Keranjang'
            })
        });
    });
</script>