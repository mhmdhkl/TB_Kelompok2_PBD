<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang; ?></h3>
                <div class="col-12">
                    <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" alt="Product Image"></div>
                    <?php foreach ($gambar as $key => $value) { ?>

                        <div class="product-image-thumb"><img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>" alt="Product Image"></div>

                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?= $barang->nama_barang; ?></h3>

                <hr>

                <h4 class="my-3">Kategori : <?= $barang->nama_kategori; ?></h4>

                <hr>

                <!-- <h4 class="mt-3">Size <small>Please select one</small></h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                        <span class="text-xl">S</span>
                        <br>
                        Small
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                        <span class="text-xl">M</span>
                        <br>
                        Medium
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                        <span class="text-xl">L</span>
                        <br>
                        Large
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                        <span class="text-xl">XL</span>
                        <br>
                        Xtra-Large
                    </label>
                </div> -->

                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Rp . <?= number_format($barang->harga, 0); ?>
                    </h2>
                </div>

                <hr>

                <?php
                echo form_open('belanja/add_wishlist');
                echo form_hidden('id_pelanggan', $this->session->userdata('id_pelanggan'));
                echo form_hidden('id_barang', $barang->id_barang);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <button class="btn btn-default btn-flat swalDefaultWishlist">
                    <i class="fas fa-heart fa-lg mr-2"></i>
                    Add to Wishlist
                </button>
                <?php
                echo form_close()
                ?>

                <?php
                echo form_open('belanja/add');
                echo form_hidden('id', $barang->id_barang);
                echo form_hidden('price', $barang->harga);
                echo form_hidden('name', $barang->nama_barang);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="number" name="qty" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                echo form_close()
                ?>
            </div>
        </div>

        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="true">Deskripsi Barang</a>
                    <!-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> -->
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <!-- DESKRIPSI BARANG -->
                <div class="tab-pane fade show active" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    <?= $barang->deskripsi; ?>
                </div>
                <!-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">

                </div> -->
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>

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

        $('.swalDefaultWishlist').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menambahkan Barang Favorit'
            })
        });
    });
</script>