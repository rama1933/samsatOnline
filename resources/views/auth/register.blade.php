<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('')}}logo/prov.png">
    <title>LOGIN</title>
    <!-- Custom CSS -->
    <link href="{{asset('')}}package/src/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url({{asset('')}}package/src/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                {{-- <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{asset('')}}logo/bg.jpg);">
                </div> --}}
                <div class="col-lg-12 col-md-12 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{asset('')}}package/src/assets/images/big/icon.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">REGISTRASI USER</h2>
                        <hr>
                        <form method="POST" id="form-create" action="{{ route('register.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Username</label>
                                        <input class="form-control" name="username" id="uname" type="text"
                                            placeholder="masukan username" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" id="pwd" name="password" type="password"
                                            placeholder="masukan password" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">NIK</label>
                                        <input class="form-control" name="nik" onkeypress="return hanyaAngka(event)" maxlength="18" type="text" placeholder="masukan nik" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="nama">Nama</label>
                                        <input class="form-control" name="nama" type="text" placeholder="masukan nama" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="no_hp">No Hp</label>
                                        <input class="form-control" name="no_hp" type="text" onkeypress="return hanyaAngka(event)" maxlength="12" placeholder="masukan no hp" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="email">Email</label>
                                        <input class="form-control" name="email" type="email"
                                            placeholder="masukan email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="alamat">Alamat</label>
                                        <input class="form-control" name="alamat" type="text" placeholder="masukan alamat" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Daftar</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Sudah Memiliki Akun? <a href="{{ url('/') }}" class="text-danger">Masuk</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('')}}package/src/assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('')}}package/src/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="{{asset('')}}package/src/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <script src="{{asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script src="{{ asset('node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery.form.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
        $('#form-create').on('submit', function(e) {
        e.preventDefault()

        $("#form-create").ajaxSubmit({
        success: function(res) {
        if (res.status == "failed") {
        swal('Username sudah terdaftar', '', 'error');
        } else if (res.status == "required") {
        swal('Form tidak boleh kosong', '', 'error');

        } else if (res.status = "success") {

        // location.reload();
        swal('Data Berhasil Di Simpan', '', 'success');
        //set semua ke default
        $("#form-create input:not([name='_token']").val('')
        setTimeout(function () {
        window.location.href = "/";
        }, 1000);

        }
        }
        })
        return true;

        })

        function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode> 57))

            return false;
            return true;
            }
    </script>
</body>

</html>
