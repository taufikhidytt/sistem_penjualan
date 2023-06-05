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
            <li class="breadcrumb-item"><a href="<?= base_url('informasi_request')?>">Informasi Request</a></li>
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
            <a href="<?= base_url('informasi_request')?>" class="btn btn-secondary btn-sm">
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
                <input type="hidden" name="id" id="id" value="<?= $data->id_transaction?>">
                <label for="status">Status Order :</label>
                <select name="status" id="status" class="form-control <?= form_error('status') ? 'is-invalid' : null ?>">
                  <option value="">--Status--</option>
                  <option value="pending" <?= set_value('status', $data->status) == 'pending' ? 'selected' : null; ?>>Pending</option>
                  <option value="proses" <?= set_value('status', $data->status) == 'proses' ? 'selected' : null; ?>>Proses</option>
                  <option value="delivery" <?= set_value('status', $data->status) == 'delivery' ? 'selected' : null; ?>>Delivery</option>
                  <option value="failed" <?= set_value('status', $data->status) == 'failed' ? 'selected' : null; ?>>Failed</option>
                </select>
                <span class="text-red"><?= form_error('status')?></span>
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