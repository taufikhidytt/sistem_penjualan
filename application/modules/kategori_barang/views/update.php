<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('kategori_barang') ?>">Data Kategori Barang</a></li>
            <li class="breadcrumb-item active"><?= $judul ?></li>
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
          <a href="<?= base_url('kategori_barang') ?>" class="btn btn-secondary btn-sm">
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
          <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?= $data->id_kategori_barang ?>">
            <label for="nama_kategori">Nama Kategori Barang :</label>
            <input type="text" class="form-control <?= form_error('nama_kategori') ? 'is-invalid' : null ?>" id="nama_kategori" name="nama_kategori" placeholder="Masukan Nama Kategori Barang" value="<?= $this->input->post('nama_kategori') ?? $data->nama_kategori ?>">
            <span class="text-red"><?= form_error('nama_kategori') ?></span>
          </div>
          <div class="form-group">
            <label for="deskripsi">Description Kategori Barang :</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control <?= form_error('deskripsi') ? 'is-invalid' : null ?>" placeholder="Masukan Deskripsi Kategori Barang"><?= $this->input->post('deskripsi') ?? $data->deskripsi; ?></textarea>
            <span class="text-red"><?= form_error('deskripsi') ?></span>
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