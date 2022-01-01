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
                    <div class="col-md-4">
                        <div class="booking-cta">

                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <div class="booking-form">
                            {!! Form::open(['route' => 'konfirmasi-pembayaran.store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                <div class="form-checkbox">
                                    <h1>Konfirmasi Pembyaran </h1>
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
                                        <span class="form-label">User Id</span>
                                        <input class="form-control" name="user_id" required type="text"
                                            placeholder="Masukan User Id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Email</span>
                                        <input class="form-control" name="email" required type="text"
                                            placeholder="Masukan Email Anda">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Masukan Jumlah Pembayaran</span>
                                        <input class="form-control" name="jumlah_bayar" type="text" required
                                            placeholder="Masukan Jumlah Pembayaran">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Masukan No Rekening Pengirim</span>
                                        <input class="form-control" name="no_rekening_pengirim" type="text" required
                                            placeholder="Masukan No Rekening">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Tanggal Pembayaran</span>
                                        <input class="form-control" name="tgl_bayar" type="date" required
                                            placeholder="Masukan Tanggal Bayar">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Bukti Pembayaran</span>
                                        <input class="form-control" name="bukti_pembayaran" type="file" required
                                            placeholder="Masukan Bukti Pembayaran">
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn">Kirim</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
