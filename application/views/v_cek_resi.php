<!-- Default box -->
<div class="col-lg-6">

    <div class="card">

        <div class="card-header">
            <p class="card-title">Silahkan Anda Bisa Mengecek Resi Anda Disini...</p>

            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Masukkan No. Resi" id="awb_input">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-lg-8">
                        <select class="form-control" id="courier_input">
                            <option value="">Pilih Kurir</option>
                            <option value="jnt">JNT</option>
                            <option value="anteraja">Anteraja</option>
                            <option value="sicepat">Sicepat</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS</option>
                        </select>
                    </div>
                    <hr>
                    <button class="btn btn-success" type="button" id="search-button">Lacak Pengiriman</button>
                    <button class="btn btn-dark" onclick="document.getElementById('awb_input,courier_input').value= ''">Reset</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Percetakan Paminggir
        </div>
        <!-- /.card-footer-->
    </div>

    <div class="row" id="resi-status">

    </div>

</div>
<!-- /.card -->
<script>
    $('#search-button').on('click', function() {

        $.ajax({
            url: 'https://api.binderbyte.com/v1/track?api_key=11a66eb09146fee865d5b022b3ae149b23a19d51e56425ef1c0c8cf2bcafa6f0',
            type: 'get',
            dataType: 'json',
            headers: {
                'Access-Control-Allow-Origin': 'http://The web site allowed to access'
            },
            data: {
                'courier': $('#courier_input').val(),
                'awb': $('#awb_input').val()
            },

            success: function(result) {
                if (result.status == 200) {
                    let resi = result.data;
                    console.log(resi);
                    $('#resi-status').html(`
                <div class="col-md-8">
                <div>` + "STATUS PENGIRIMAN" + `</div>
                    <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">` + "Status" + `</th>
                        <td>` + resi.summary.status + `</td>
                        </tr>
                        <tr>
                        <th scope="row">` + "Layanan" + `</th>
                        <td>` + resi.summary.courier + `</td>
                        </tr>
                        <tr>
                        <th scope="row">` + "Pengirim" + `</th>
                        <td>` + resi.detail.shipper + `</td>
                        </tr>
                        <tr>
                        <th scope="row">` + "Asal" + `</th>
                        <td>` + resi.detail.origin + `</td>
                        </tr> 
                        <tr>
                        <th scope="row">` + "Penerima" + `</th>
                        <td>` + resi.detail.receiver + `</td>
                        </tr>
                        <tr>
                        <th scope="row">` + "Tanggal Kirim" + `</th>
                        <td>` + resi.summary.date + `</td>
                        </tr>
                        <tr>
                        <th scope="row">` + "Tujuan" + `</th>
                        <td>` + resi.detail.destination + `</td>
                        </tr>
                    </tbody>
                    </table>

                `)
                } else {
                    $('#resi-result').html(`
                    <div class="col">
                    <h1 class="text-center">` + result.message + `</h1>
                    </div>
                    `)
                }
            }
        });
    });
</script>