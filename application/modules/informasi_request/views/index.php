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
              <li class="breadcrumb-item">Data Informasi Order</li>
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
          <h3 class="card-title">Data Informasi Order</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-responsive-lg table-hover table-striped text-center" id="table">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>No Invoice</th>
                      <th>Barang</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>No Handphone</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Total Harga</th>
                      <th>Nama Pemesan</th>
                      <th>Bukti Transfer</th>
                      <th>Alamat</th>
                      <th>Tanggal Request</th>
                      <th>Ubah Status Request</th>
                      <th>Print Request</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($data->result() as $dt):?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $dt->no_invoice?></td>
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
                    <td><?= $dt->qty?></td>
                    <td>Rp. <?= number_format($dt->harga, 2,".",".")?></td>
                    <td>Rp. <?= number_format($dt->total_harga, 2,".",".")?></td>
                    <td><?= $dt->nama?>[<?= $dt->level?>]</td>
                    <td>
                      <?php if($dt->bukti_tf != null){?>
                        <a href="<?= base_url('assets/upload/bukti_tf/'.$dt->bukti_tf)?>" target="blank">
                          <img src="<?= base_url('assets/upload/bukti_tf/'.$dt->bukti_tf) ?>" alt="Bukti TF" class="img-fluid img-size-50">
                        </a>
                        <?php }else{?>
                          <span class="bg-warning">Belum Ada Bukti TF</span>
                          <?php } ?>
                        </td>
                    <td><?= substr($dt->alamat, 0, 50)?></td>
                    <td><?= date('d F Y, H:i:s', strtotime($dt->created_at))?></td>
                    <td>
                        <a href="<?= base_url('informasi_request/status/'.$dt->id_transaction)?>" class="btn btn-primary btn-sm <?= $dt->status == "failed" ? "disabled" : null;?>">
                            <i class="fa fa-highlighter"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('informasi_request/print/'.$dt->id_transaction)?>" class="btn btn-success btn-sm <?= $dt->status == "failed" ? "disabled" : null;?>" target="blank">
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
          "responsive": true,
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

        $(document).on('click', '#form-delete', function(e){
            e.preventDefault();
            var link = $(this).parent('form');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus Data Ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Hapus Data Ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    link.submit();
                }
            })
        });
    </script>