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
            <li class="breadcrumb-item"><a href="<?= base_url('barang')?>">Data Barang</a></li>
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
            <a href="<?= base_url('barang')?>" class="btn btn-secondary btn-sm">
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
                <label for="nama_barang">Nama Barang :</label>
                <input type="text" class="form-control <?= form_error('nama_barang') ? 'is-invalid' : null ?>" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" value="<?= $this->input->post('nama_barang')?>">
                <span class="text-red"><?= form_error('nama_barang')?></span>
            </div>
            <div class="form-group">
                <label for="kategori_barang">Kategori Barang :</label>
                <select name="kategori_barang" id="kategori_barang" class="form-control <?= form_error('kategori_barang') ? 'is-invalid' : null ?>">
                  <option value="">--Pilih Kategori--</option>
                  <?php foreach($kategori->result() as $kt):?>
                    <option value="<?= $kt->id_kategori_barang ?>" <?= set_value('kategori_barang') == $kt->id_kategori_barang ? 'selected' : null ?> > <?= $kt->nama_kategori?> </option>
                  <?php endforeach;?>
                </select>
                <span class="text-red"><?= form_error('kategori_barang')?></span>
            </div>
            <div class="form-group">
                <label for="harga">Harga Barang :</label>
                <input type="number" class="form-control <?= form_error('harga') ? 'is-invalid' : null ?>" id="harga" name="harga" placeholder="Masukan Harga Barang (Rp)" value="<?= $this->input->post('harga')?>">
                <span class="text-red"><?= form_error('harga')?></span>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Barang :</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control <?= form_error('deskripsi') ? 'is-invalid' : null ?>" placeholder="Masukan Deskripsi Barang"><?= $this->input->post('deskripsi');?></textarea>
                <span class="text-red"><?= form_error('deskripsi')?></span>
            </div>
            <div class="form-group">
                <label for="photo_barang">Photo Barang :</label>
                <input type="file" class="form-control <?= form_error('photo_barang') ? 'is-invalid' : null ?>" id="photo_barang" name="photo_barang" placeholder="Masukan Unit Price Item Type" value="<?= $this->input->post('photo_barang')?>">
                <span class="text-warning">
                    <ul>
                      <li>Format: png, jpg, jpeg</li>
                      <li>Max Size: 200 kb</li>
                    </ul>
                </span>
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
</script>