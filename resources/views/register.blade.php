<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DATA CENTER - Nginden Timur</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru!</h1>
                            </div>
                            <form class="user" action="/register" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror form-control-user" name="name"
                                        placeholder="Nama">
                                        @error('name')
                                        <div class="invalid-feedback">
                                           Nama tidak boleh kosong
                                        </div>
                                        @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror form-control-user" name="email"
                                            placeholder="Email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                               Email tidak boleh kosong
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('wa') is-invalid @enderror form-control-user" name="wa"
                                            placeholder="Whatsapp">
                                            @error('wa')
                                            <div class="invalid-feedback">
                                               Nomor whatsapp tidak boleh kosong
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror form-control-user" name="password"
                                        placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                           Password tidak boleh kosong
                                        </div>
                                        @enderror
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">Daftar</button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Daftar dengan Google
                                </a>
                            </form>
                            <div class="text-center">
                                <a class="small" href="/">Sudah punya akun? Login Disini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    {{-- <script src="js/sb-admin-2.min.js"></script> --}}

</body>

</html>
