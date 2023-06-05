<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url()?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

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
            <li class="breadcrumb-item active"><?= $judul?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>
  <div id="flashWarning" data-warning="<?= $this->session->flashdata('warning');?>"></div>
  <div id="flashError" data-error="<?= $this->session->flashdata('error');?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?= $judul?></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a href="<?= base_url('profile_users/update')?>" class="btn btn-success btn-sm">
          <i class="fa fa-pencil-alt"></i> Update
        </a>
        <br><br>
        <table class="table table-bordered table-responsive-lg table-striped text-center" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Image Users</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($data->result() as $dt):?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= substr($dt->nama, 0, 50)?></td>
                    <td><?= substr($dt->username, 0, 50)?></td>
                    <td><?= $dt->no_hp?></td>
                    <td><?= substr($dt->alamat, 0, 50)?></td>
                    <?php if($dt->status == 'active'){?>
                        <td class="badge bg-success"><?= $dt->status?></td>
                    <?php }elseif($dt->status == 'inactive'){?>
                        <td class="badge bg-danger"><?= $dt->status?></td>
                    <?php }else{?>
                        <td class="badge bg-warning"><?= $dt->status?></td>
                    <?php }?>
                    <td>
                        <?php if($dt->image){?>
                            <img src="<?= base_url('assets/upload/users/'.$dt->image) ?>" alt="Photo Users" class="img-fluid img-size-50">
                        <?php }else{?>
                            <span class="text-warning">Photo Belum Di Upload</span>
                        <?php } ?>
                    </td>
                    <td><?= date('d F Y, H:i:s', strtotime($dt->created_at))?></td>
                    <?php if($dt->updated_at == null){?>
                      <td>Null</td>
                    <?php }else{?>
                      <td><?= date('d F Y, H:i:s', strtotime($dt->updated_at))?></td>
                    <?php }?>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $('#table').DataTable({
        "responsive": true
    });

    var flashsuccess = $('#flashSuccess').data('success');
    var flashwarning = $('#flashWarning').data('warning');
    var flasherror = $('#flashError').data('error');

    if(flashsuccess)
    {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashsuccess,
        })
    }

    if(flashwarning)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashwarning,
        })
    }

    if(flasherror)
    {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: flasherror,
        })
    }
</script>