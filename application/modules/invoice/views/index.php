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
        <span class="bg-warning">Transfer Ke No Rek 123456789 Atas Nama Cv Amali Shoes</span><br><br>
        <table class="table table-bordered table-responsive-lg table-striped text-center" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Invoice</th>
                    <th>Photo Barang</th>
                    <th>Barang</th>
                    <th>Kategori Order</th>
                    <th>Status</th>
                    <th>No Handphone</th>
                    <th>Alamat</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Bukti Transfer</th>
                    <th>Tanggal Order</th>
                    <th>Upload Bukti TF</th>
                    <th>Print Invoice</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($data->result() as $dt):?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $dt->no_invoice?></td>
                    <td>
                      <a href="<?= base_url('assets/upload/barang/'.$dt->photo_barang)?>" target="blank">
                        <img src="<?= base_url('assets/upload/barang/'.$dt->photo_barang) ?>" alt="Photo Barang" class="img-fluid img-size-50">
                      </a>
                    </td>
                    <td><?= $dt->nama_barang?></td>
                    <td><?= $dt->kategori_order?></td>
                    <?php if($dt->status == 'pending'){?>
                      <td class="badge bg-warning"><?= $dt->status?></td>
                    <?php }elseif($dt->status == 'proses'){?>
                      <td class="badge bg-primary"><?= $dt->status?></td>
                    <?php }elseif($dt->status == 'delivery'){?>
                      <td class="badge bg-success"><?= $dt->status?></td>
                    <?php }else{?>
                      <td class="badge bg-danger"><?= $dt->status?></td>
                    <?php }?>
                    <td><?= $dt->no_hp?></td>
                    <td><?= substr($dt->alamat, 0, 50)?></td>
                    <td><?= $dt->qty?></td>
                    <td>Rp. <?= number_format($dt->harga, 2,".",".")?></td>
                    <td>Rp. <?= number_format($dt->total_harga, 2,".",".")?></td>
                    <td>
                      <?php if($dt->bukti_tf != null){?>
                        <a href="<?= base_url('assets/upload/bukti_tf/'.$dt->bukti_tf)?>" target="blank">
                          <img src="<?= base_url('assets/upload/bukti_tf/'.$dt->bukti_tf) ?>" alt="Bukti TF" class="img-fluid img-size-50">
                        </a>
                      <?php }else{?>
                        <span class="bg-warning">Belum Ada Bukti TF</span>
                      <?php } ?>
                    </td>
                    <td><?= date('d F Y, H:i:s', strtotime($dt->created_at))?></td>
                    <td>
                        <a href="<?= base_url('invoice/upload/'.$dt->id_transaction)?>" class="btn btn-primary btn-sm <?= $dt->status == "failed" ? "disabled" : null;?>">
                            <i class="fa fa-upload"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('invoice/print/'.$dt->id_transaction)?>" class="btn btn-success btn-sm <?= $dt->status == "failed" ? "disabled" : null;?>" target="blank">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>
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