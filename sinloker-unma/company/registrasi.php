<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../assets/upload/img/logo-unma.png" type="image/ico">
    <title>Register Perusahaan | Tracer Study & Sinloker UNMA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        p.rata {
            text-align: justify;
            font-family: 'arial', Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: normal;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box col-xl-5">
        <div class="register-logo">
            <h3 href="#"><b>HRD</b></h3>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register HRD</p>

                <form action="" method="post">
                    <!-- Nama Perusahaan -->
                    <div class="input-group col-sm-12 mb-3">
                        <input type="text" class="form-control" placeholder="Nama Perusahaan" name="namacompany" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Jumlah Pegawai -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <select class="form-control" required>
                                <option>Jumlah Pegawai</option>
                                <option>Bekerja Sendiri</option>
                                <option>1-10 Karyawan</option>
                                <option>11-50 Karyawan</option>
                                <option>51-200 Karyawan</option>
                                <option>501-1000 Karyawan</option>
                                <option>lebih dari 1000 Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <!-- Nama & Posisi -->
                    <div class="input-group-append mb-3">
                        <!-- Nama -->
                        <div class="col-sm-6 mb3">
                            <input type="text" class="form-control" placeholder="Nama" name="namahrd" required>
                        </div>
                        <!-- Posisi -->
                        <div class="col-sm-6 mb3">
                            <input type="text" class="form-control" placeholder="Posisi" name="posisi" required>
                        </div>
                    </div>
                    <!-- NoTelp & Email -->
                    <div class="input-group-append mb-3">
                        <!-- No. Telp -->
                        <div class="col-sm-6 mb3">
                            <input type="text" class="form-control" placeholder="No. Telp" name="notelp" required>
                        </div>
                        <!-- Email -->
                        <div class="col-sm-6 mb3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <!-- Password1 -->
                    <div class="input-group col-sm-12 mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Konfirmasi Password -->
                    <div class="input-group col-sm-12 mb-3">
                        <input type="password" class="form-control" placeholder="Konfirmasi password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock-open"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Alamat -->
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Alamat" required></textarea>
                        </div>
                    </div>
                    <!-- Provinsi & Kota -->
                    <div class="input-group-append mb-3">
                        <!-- Provinsi -->
                        <div class="col-sm-6 mb3">
                            <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" required>
                        </div>
                        <!-- Kota -->
                        <div class="col-sm-6 mb3">
                            <input type="text" class="form-control" placeholder="Kota" name="kota" required>
                        </div>
                    </div>
                    <!-- Chechbox Persetujuan-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                <label for="agreeTerms">
                                    <p class="rata">Kami setuju dan memahami pernyataan dan kondisi di atas dan mengakui bahwa formulir ini merupakan pernyataan resmi perusahaan kami dan dapat digunakan sebagai dokumen hukum oleh pihak terkait</p>
                                </label>
                            </div>
                        </div>
                        <!-- Tombol Register -->
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                </form>

                <div>
                    <a href="../index.php" style="float:left">Home</a>
                    <a href="login.php" style="float:right">Login HRD</a>
                </div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>