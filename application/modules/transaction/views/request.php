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

<?php date_default_timezone_set("Asia/Jakarta");?>

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
        <h3 class="card-title">Detail Transaction</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="date">Date :</label>
                <input type="text" class="form-control" id="date" name="date" readonly value="<?= date('d M Y, H:i:s')?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <input type="hidden" class="form-control" id="id_users" name="id_users" readonly value="<?= $this->checkusers->users_login()->id_users;?>">
                <label for="users">Customer :</label>
                <input type="text" class="form-control" id="users" name="users" readonly value="<?= $this->checkusers->users_login()->nama;?>">
              </div>
            </div>
            <div class="col-lg-4">
              <label for="nama_barang">Barang :</label>
              <div class="form-group input-group">
                <input type="hidden" name="id_barang" id="id_barang" value="<?= $this->input->post('id_barang')?>">
                <input type="text" class="form-control <?= form_error('nama_barang') ? 'is-invalid' : null ?>" id="nama_barang" name="nama_barang" placeholder="Pilih Barang" readonly value="<?= $this->input->post('nama_barang')?>">
                <span class="input-group-append">
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-barang">
                      <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              <span class="text-red"><?= form_error('nama_barang')?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-12">
              <div class="form-group">
                <label for="nama_kategori">Kategori Barang :</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control <?= form_error('nama_kategori') ? 'is-invalid' : null ?>" readonly value="<?= $this->input->post('nama_kategori')?>" placeholder="-">
                <span class="text-red"><?= form_error('nama_kategori')?></span>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="form-group">
                <label for="harga">Harga Barang</label>
                <input type="text" name="harga" id="harga" class="form-control <?= form_error('harga') ? 'is-invalid' : null ?>" readonly value="<?= $this->input->post('harga')?>" placeholder="-">
                <span class="text-red"><?= form_error('harga')?></span>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="form-group">
                <label for="qty">Qty :</label>
                <input type="number" class="form-control <?= form_error('qty') ? 'is-invalid' : null ?>" id="qty" name="qty" placeholder="Masukan Qty Barang Request" min="1" value="<?= $this->input->post('qty')?>">
                <span class="text-red"><?= form_error('qty')?></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-12">
              <div class="form-group">
                <label for="no_hp">No Handphone :</label>
                <input type="number" class="form-control <?= form_error('no_hp') ? 'is-invalid' : null ?>" id="no_hp" name="no_hp" placeholder="Masukan No Handphone" value="<?= $this->input->post('no_hp') ?? $this->checkusers->users_login()->no_hp;?>">
                <span class="text-red"><?= form_error('no_hp')?></span>
              </div>
            </div>
            <div class="col-lg-8 col-sm-12">
              <div class="form-group">
                <label for="alamat">Alamat :</label>
                <textarea name="alamat" id="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : null ?>" placeholder="Masukan Alamat Tujuan"><?= $this->input->post('alamat') ?? $this->checkusers->users_login()->alamat;?></textarea>
                <span class="text-red"><?= form_error('alamat')?></span>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-rocket"></i> Request Barang
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

<div class="modal fade" id="modal-barang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- <h4 class="modal-title">Data Items</h4> -->
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive-lg table-striped text-center" id="barang">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Kategori Barang</th>
                          <th>Harga</th>
                          <th>Stock</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1; foreach($barang->result() as $dt):?>
                      <tr>
                          <td><?= $no++;?></td>
                          <td><?= $dt->nama_barang;?></td>
                          <td><?= $dt->nama_kategori;?></td>
                          <td>Rp.<?= number_format($dt->harga, 2,",",".");?></td>
                          <td><?= $dt->stok;?></td>
                          <td>
                              <button type="button" class="btn btn-primary btn-xs" id="select"
                                data-id_barang="<?= $dt->id_barang?>"
                                data-nama_barang="<?= $dt->nama_barang?>"
                                data-nama_kategori="<?= $dt->nama_kategori?>"
                                data-harga="<?= $dt->harga?>"
                                data-stok_barang="<?= $dt->stok?>"
                                >
                                <i class="fa fa-check"></i> Selected
                            </button>
                          </td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
              </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->

<script>
    $('#barang').DataTable({});
    $(document).on('click', '#select', function(){
        var id_barang = $(this).data('id_barang');
        var nama_barang = $(this).data('nama_barang');
        var nama_kategori = $(this).data('nama_kategori');
        var harga = $(this).data('harga');

        $('#id_barang').val(id_barang);
        $('#nama_barang').val(nama_barang);
        $('#nama_kategori').val(nama_kategori);
        $('#harga').val(harga);

        $('#modal-barang').modal('hide');
    });



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