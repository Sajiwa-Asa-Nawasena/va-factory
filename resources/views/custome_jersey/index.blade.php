<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet"
        href="https://colorlib.com/etc/bforms/colorlib-booking-19/css/bootstrap.min.css" />
    <link href="{{ asset('css/konfirmasi_pembayran.css') }}" rel="stylesheet">
    <title>Konfirmasi Pembayaran</title>
    <meta name="robots" content="noindex, follow">
</head>

<body>
    <div id="booking" class="section">

        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="booking-form">
                            {!! Form::open(['route' => 'konfirmasi-pembayaran.store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                <div class="form-checkbox">
                                    <h1>Custome Jersey </h1>
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Kode Bahan</span>
                                        <select class="form-control" name="kode_bahan" id="kode_bahan" onchange="hitungSatuan()">
                                            <option value="0~ "> Silahkan Pilih Kode Bahan </option>
                                            @foreach($databahan as $item)
                                              <option value="{{$item->harga}}~{{$item->kode_bahan}}">{{$item->nama_bahan}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Kode Jenis</span>
                                        <select class="form-control" name="kode_jenis" id="kode_jenis" onchange="hitungSatuan()">
                                            <option value="0~ "> Silahkan Pilih Kode Jenis </option>
                                            @foreach($datajenis as $item)
                                              <option value="{{$item->harga}}~{{$item->kode_jenis}}">{{$item->nama_jenis}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <input class="form-control" name="satuan" type="hidden" id="satuan">
                            <input class="form-control" name="total" type="hidden" id="total">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Qty</span>
                                        <input class="form-control" name="qty" oninput="cekTotal()" type="text" id="qty" required
                                            placeholder="Masukan Qty">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Nama</span>
                                        <input class="form-control" name="Nama" type="text" required
                                            placeholder="Masukan Nama">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">No Wa</span>
                                        <input class="form-control" name="no_wa" type="text" required
                                            placeholder="Masukan No Wa">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Email</span>
                                        <input class="form-control" name="email" type="email" required
                                            placeholder="Masukan Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Desain</span>
                                        <input class="form-control" name="Desain" type="file" required
                                            placeholder="Masukan Desain">
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn">Kirim</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="booking-form">
                            {!! Form::open(['route' => 'konfirmasi-pembayaran.store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                <div class="form-checkbox">
                                    <h1>Total</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3>Bahan : </h3> <div id="value_bahan"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3><div id="value_bahan_harga"> 0 </div></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3>Jenis :</h3>  <div id="value_jenis"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3><div id="value_jenis_harga">0 <div></h3>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <hr/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3>Satuan</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3><div id="value_satuan"> 0</div></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3>Qty</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3><div id="value_qty"> 0</div></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <hr/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3>Grand Total</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3><div id="value_grand_total"> 0</div></h3>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <script>
       function hitungSatuan(){
        let idBahan = document.getElementById("kode_bahan");
        let valueBahan = idBahan.options[idBahan.selectedIndex].value.split('~');
        document.getElementById("value_bahan").innerHTML = String(valueBahan[1]);
        document.getElementById("value_bahan_harga").innerHTML = Number(valueBahan[0]).toLocaleString("KR-ko");


        let idJenis = document.getElementById("kode_jenis");
        let valueJenis = idJenis.options[idJenis.selectedIndex].value.split('~');
        document.getElementById("value_jenis").innerHTML = String(valueJenis[1]) || '';
        document.getElementById("value_jenis_harga").innerHTML = Number(valueJenis[0])?.toLocaleString("KR-ko") || 0;

        document.getElementById('satuan').value  = ( Number(valueJenis[0]) +  Number(valueBahan[0])) || 0;
        document.getElementById('total').value  = ( Number(valueJenis[0]) +  Number(valueBahan[0])) || 0;


        document.getElementById("value_satuan").innerHTML =( Number(valueJenis[0]) +  Number(valueBahan[0])).toLocaleString("KR-ko") || 0;

        let qty = document.getElementById("qty").value || 0;
        let satuan = document.getElementById("satuan").value || 0;
        document.getElementById("value_grand_total").innerHTML =( Number(qty) *  Number(satuan)).toLocaleString("KR-ko") || 0;
      }

      function cekTotal(){
        let qty = document.getElementById("qty").value;
        let satuan = document.getElementById("satuan").value;
        document.getElementById("value_grand_total").innerHTML =( Number(qty) *  Number(satuan)).toLocaleString("KR-ko") || 0;
        document.getElementById("value_qty").innerHTML =qty || 1;

      }
    </script>
</html>
