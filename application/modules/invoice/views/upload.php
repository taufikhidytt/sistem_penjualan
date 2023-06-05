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
            <li class="breadcrumb-item"><a href="<?= base_url('invoice')?>">Data Invoice</a></li>
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
            <a href="<?= base_url('invoice')?>" class="btn btn-secondary btn-sm">
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
        <form action="<?= base_url('invoice/prosesUpload')?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="<?= $data->id_transaction?>">
                    <label for="bukti_tf">Bukti Transfer:</label>
                    <input type="file" class="form-control" id="bukti_tf" name="bukti_tf" onchange="readURL(this);">
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
</script>