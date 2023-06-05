<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('users')?>">Data Users</a></li>
            <li class="breadcrumb-item active"><?= $judul?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('users')?>" class="btn btn-secondary btn-sm">
                <i class="fa fa-reply-all"></i> Back
            </a>
        </div>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?= $data->id_users?>">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="<?= $this->input->post('nama') ?? $data->nama?>">
                        <span class="text-red"><?= form_error('nama')?></span>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>" id="username" name="username" placeholder="Masukan Username" value="<?= $this->input->post('username') ?? $data->username?>">
                        <span class="text-red"><?= form_error('username')?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" id="password" name="password" placeholder="Masukan Password" value="<?= $this->input->post('password')?>">
                        <span class="text-red"><?= form_error('password')?></span>
                        <span class="text-warning">Kosongkan jika tidak ingin ubah password</span><br>
                        <input type="checkbox" onclick="showPassword()"> Show Password
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="password2">Konfirmasi Password:</label>
                        <input type="password" class="form-control <?= form_error('password2') ? 'is-invalid' : null ?>" id="password2" name="password2" placeholder="Konfirmasi Password" value="<?= $this->input->post('password2')?>">
                        <span class="text-red"><?= form_error('password2')?></span>
                        <input type="checkbox" onclick="showPassword2()"> Show Password
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="level">Level:</label>
                        <select name="level" id="level" class="form-control <?= form_error('level') ? 'is-invalid' : null ?>">
                            <option value="">--Select--</option>
                            <option value="superadmin" <?= set_value('level', $data->level) == 'superadmin' ? 'selected' : null ?>>Super Admin</option>
                            <option value="admin" <?= set_value('level', $data->level) == 'admin' ? 'selected' : null ?>>Admin</option>
                            <option value="gudang" <?= set_value('level', $data->level) == 'gudang' ? 'selected' : null ?>>Gudang</option>
                            <option value="user" <?= set_value('level', $data->level) == 'user' ? 'selected' : null; ?>>User</option>
                        </select>
                        <span class="text-red"><?= form_error('level')?></span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control <?= form_error('status') ? 'is-invalid' : null ?>">
                            <option value="">--Select--</option>
                            <option value="active" <?= set_value('status', $data->status) == 'active' ? 'selected' : null; ?>>Active</option>
                            <option value="inactive" <?= set_value('status', $data->status) == 'inactive' ? 'selected' : null ?>>Inactive</option>
                            <option value="pending" <?= set_value('status', $data->status) == 'pending' ? 'selected' : null ?>>Pending</option>
                        </select>
                        <span class="text-red"><?= form_error('status')?></span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="no_hp">No Handphone:</label>
                        <input type="number" class="form-control <?= form_error('no_hp') ? 'is-invalid' : null ?>" id="no_hp" name="no_hp" placeholder="Masukan No Handphone" value="<?= $this->input->post('no_hp') ?? $data->no_hp?>">
                        <span class="text-red"><?= form_error('no_hp')?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : null ?>" placeholder="Masukan Alamat"><?= $this->input->post('alamat') ?? $data->alamat;?></textarea>
                <span class="text-red"><?= form_error('alamat')?></span>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <div class="form-group">
                    <label for="image">Image Users:</label>
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
                  <img class="img-fluid img-bordered h-10" src="<?= base_url('assets/upload/users/'.$data->image)?>" alt="Photo" id="photo">
              </div>
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i> Submit
            </button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#photo').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }

  function showPassword() {
      var password = document.getElementById("password");
      if (password.type === "password") {
          password.type = "text";
      } else {
          password.type = "password";
      }
  }

  function showPassword2() {
      var password = document.getElementById("password2");
      if (password.type === "password") {
          password.type = "text";
      } else {
          password.type = "password";
      }
  }
</script>