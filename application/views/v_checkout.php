<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-shopping-cart"></i> Checkout
                <small class="float-right">Date: <?= date('d-m-Y'); ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Barang</th>
                        <th>Total Harga</th>
                        <th>Berat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php
                    $tot_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $barang = $this->m_home->detail_barang($items['id']);
                        $berat = $items['qty'] * $barang->berat;
                        $tot_berat = $tot_berat + $berat;
                    ?>
                        <tr>
                            <td><?php echo $items['qty']; ?></td>
                            <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                            <td><?php echo $items['name']; ?></td>
                            <td>Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                            <td><?= $berat ?> gr</td>
                        </tr>
                        <?php $i++; ?>

                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <?php
    echo validation_errors('<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-exclamation-triangle"></i> Alert! ', '</div>');
    ?>
    <?php
    echo form_open('belanja/checkout');
    $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));

    ?>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-8 invoice-col">
            To :
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <select name="kota" id="kota" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select name="ekspedisi" id="ekspedisi" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Paket</label>
                        <select name="paket" id="paket" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kode POS</label>
                        <input name="kode_pos" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Penerima</label>
                        <input name="nama_penerima" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Grand Total:</th>
                        <th>Rp. <?php echo number_format($this->cart->total(), 0); ?></th>
                    </tr>
                    <tr>
                        <th>Berat:</th>
                        <th><?= $tot_berat; ?> gr</th>
                    </tr>
                    <tr>
                        <th>Ongkir:</th>
                        <th><label id="ongkir"></label></th>
                    </tr>
                    <tr>
                        <th>Total Bayar:</th>
                        <th><label id="total_bayar"></label></th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Simpan Transaksi -->
    <input name="no_order" value="<?= $no_order ?>" hidden>
    <input name="estimasi" hidden>
    <input name="ongkir" hidden>
    <input name="berat" value="<?= $tot_berat ?>" hidden><br>
    <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
    <input name="total_bayar" hidden>
    <!-- End Simpan Transaksi -->

    <!-- Simpan Rinci Transaksi -->
    <?php
    $i = 1;
    foreach ($this->cart->contents() as $items) {
        echo form_hidden('qty' . $i++, $items['qty']);
    }
    ?>
    <!-- End Simpan Rinci Transaksi -->

    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('belanja') ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali</a>
            <a href="<?= base_url('belanja/checkout') ?>" onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

            <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Proses Checkout
            </button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<!-- /.invoice -->


<script>
    $(document).ready(function() {
        //Mengambil Data Provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //Select Kota Setelah Provinsi
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/ekspedisi') ?>",
                success: function(hasil_ekspedisi) {
                    $("select[name=ekspedisi]").html(hasil_ekspedisi);
                }
            });
        });

        //Mendapatkan Data Paket
        $("select[name=ekspedisi]").on("change", function() {
            //Mendapatkan Ekspedisi Terpilih
            var ekspedisi_terpilih = $("select[name=ekspedisi]").val();
            //Mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //Mendapatkan Data Ongkos Kirim
            var total_berat = <?= $tot_berat ?>;
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'ekspedisi=' + ekspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        //Mendapatkan
        $("select[name=paket]").on("change", function() {
            //Menampilkan Ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join('.').split('').reverse().join('');
            $("#ongkir").html("Rp. " + ribuan_ongkir);

            //Menghitung Total Bayar
            var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>)
            var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
                ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
            ribuan_total_bayar = ribuan_total_bayar.join('.').split('').reverse().join('');
            $("#total_bayar").html("Rp. " + ribuan_total_bayar);

            //Estimasi Dan Ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(data_total_bayar);
        });
    });
</script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('4bc5ccb5eab937c6eff4', {
        cluster: 'ap1',
        encrypted: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        addData(data);
    });

    function addData(data) {
        var str = '';
        for (var z in data) {
            str += '<p><span><b>' + data[z].id_pengirim + '</b></span> - <span>' + data[z].message + '</span></p>'
        }
        $('#pesan').html(str);
    }
</script>

<script>
    function store() {
        var value = {
            message: $('#message').val(),
            id_pengirim: $('#id_pengirim').val(),
            id_penerima: $('#id_penerima').val()
        }
        $.ajax({
            url: '<?= site_url(); ?>/chat/store',
            type: 'POST',
            data: value,
            dataType: 'JSON'
        });
    }
</script>