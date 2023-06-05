<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="<?= base_url()?>assets/logo/logo.png" type="image/x-icon">
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/login/css/A.style.css.pagespeed.cf.Qh1-GdQdyh.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <style>
        body{
            background: url(<?= base_url('assets/login/images/pattern4.png')?>);
        }
    </style>
</head>
<body>
    <section>
        <div id="flashWarning" data-warning="<?= $this->session->flashdata('warning')?>"></div>
        <div id="flashSuccess" data-success="<?= $this->session->flashdata('success')?>"></div>
        <div id="flashError" data-error="<?= $this->session->flashdata('error')?>"></div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="wrap p-3 mb-5">
                        <h1 class="text-center"><?= $judul?></h1>
                        <hr class="mb-3 w-25 ">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap:</label>
                                        <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="<?= $this->input->post('nama')?>">
                                        <span style="color: red;"><?= form_error('nama')?></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>" id="username" name="username" placeholder="Masukan Username" value="<?= $this->input->post('username')?>">
                                        <span style="color: red;"><?= form_error('username')?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" id="password" name="password" placeholder="Masukan Password" value="<?= $this->input->post('password')?>">
                                        <span style="color: red;"><?= form_error('password')?></span>
                                        <input type="checkbox" onclick="myFunction()"> Show Password
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="password2">Konfirmasi Password:</label>
                                        <input type="password" class="form-control <?= form_error('password2') ? 'is-invalid' : null ?>" id="password2" name="password2" placeholder="Konfirmasi Password" value="<?= $this->input->post('password2')?>">
                                        <span style="color: red;"><?= form_error('password2')?></span>
                                        <input type="checkbox" onclick="myFunction2()"> Show Password
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="no_hp">No Handphone:</label>
                                        <input type="number" class="form-control <?= form_error('no_hp') ? 'is-invalid' : null ?>" id="no_hp" name="no_hp" placeholder="Masukan No Handphone" value="<?= $this->input->post('no_hp')?>">
                                        <span style="color: red;"><?= form_error('no_hp')?></span>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat:</label>
                                        <textarea name="alamat" id="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : null ?>" placeholder="Masukan Alamat"><?= $this->input->post('alamat');?></textarea>
                                        <span style="color: red;"><?= form_error('alamat')?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                                    </div>
                                    <span class="text-warning">
                                    <ul>
                                        <li>Format photo png, jpeg, jpg</li>
                                        <li>Max size 200 kb</li>
                                    </ul>
                                    </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <img class="img-fluid img-bordered h-10" src="" alt="Photo" id="photo">
                                </div>
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-success btn-sm ml-3 mb-3">
                                <i class="fa fa-check"></i> Daftar
                            </button>
                        </form>
                        <span>Sudah Mempunyai Akun?</span>
                            <a href="<?= base_url('auth')?>" class="text-primary">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="<?= base_url()?>assets/login/js/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url()?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
    function myFunction() {
        var password = document.getElementById("password");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }

    function myFunction2() {
        var password = document.getElementById("password2");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }

    $('#photo').hide();
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo').attr('src', e.target.result);
                $('#photo').show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    var flashWarning = $('#flashWarning').data('warning');
    var flashSuccess = $('#flashSuccess').data('success');
    var flashError = $('#flashError').data('error');
    if(flashWarning){
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashWarning,
        })
    }

    if(flashSuccess){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashSuccess,
        })
    }

    if(flashError){
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: flashError,
        })
    }
</script>
</body>
</html>
