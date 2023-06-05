<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- SweetAlert2 -->
<script src="<?= base_url()?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- ChartJS -->
<script src="<?= base_url()?>assets/admin/plugins/chart.js/Chart.min.js"></script>
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
              <li class="breadcrumb-item active">Dashboard</li>
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
          <h3 class="card-title">Dashboard</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <?php if($this->checkusers->users_login()->level == 'admin'):?>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                  <div class="inner">
                      <h3><?= $penjualan?></h3>

                      <p>Data Penjualan</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-newspaper"></i>
                  </div>
                  <a href="<?= base_url('dataPenjualan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                  <div class="inner">
                      <h3><?= $order?></h3>

                      <p>Informasi Order</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-window-maximize"></i>
                  </div>
                  <a href="<?= base_url('informasi_order')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                  <div class="inner">
                      <h3><?= $request?></h3>

                      <p>Informasi Request</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-keyboard"></i>
                  </div>
                  <a href="<?= base_url('informasi_request')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                  <div class="inner">
                      <h3><?= $users?></h3>

                      <p>Users</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-users"></i>
                  </div>
                  <a href="<?= base_url('users')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              </div>
          </div>
        <?php endif;?>
        <!-- /.card-body -->
        <?php if($this->checkusers->users_login()->level == 'gudang'):?>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                  <div class="inner">
                      <h3><?= $kategori?></h3>

                      <p>Kategori Barang</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-cube"></i>
                  </div>
                  <a href="<?= base_url('kategori_barang')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                  <div class="inner">
                      <h3><?= $barang?></h3>

                      <p>Barang</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-cubes"></i>
                  </div>
                  <a href="<?= base_url('barang')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                  <div class="inner">
                      <h3><?= $pengirimanOrder?></h3>

                      <p>Pengiriman Barang Order</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-truck"></i>
                  </div>
                  <a href="<?= base_url('pengiriman_order')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                  <div class="inner">
                      <h3><?= $pengirimanRequest?></h3>

                      <p>Pengiriman Barang Request</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-bus"></i>
                  </div>
                  <a href="<?= base_url('pengiriman_request')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              </div>
          </div>
        <?php endif;?>
        <!-- /.card-body -->
        <?php if($this->checkusers->users_login()->level == 'user'):?>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                  <div class="inner">
                      <h3><?= $pending?></h3>

                      <p>Pending</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-download"></i>
                  </div>
                  <span class="small-box-footer">
                    Transaksi Pending
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                  <div class="inner">
                      <h3><?= $proses?></h3>

                      <p>Proses</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-recycle"></i>
                  </div>
                  <span class="small-box-footer">
                    Transaksi Proses
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                  <div class="inner">
                      <h3><?= $delivery?></h3>

                      <p>Delivery</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-rocket"></i>
                  </div>
                  <span class="small-box-footer">
                    Transaksi Delivery
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                  <div class="inner">
                      <h3><?= $failed?></h3>

                      <p>Failed</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-trash"></i>
                  </div>
                  <span class="small-box-footer">
                    Transaksi Failed
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              </div>
          </div>
        <?php endif;?>
        <!-- /.card-body -->
        <?php if($this->checkusers->users_login()->level == 'superadmin'):?>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                  <div class="inner">
                      <h3><?= $allpending?></h3>

                      <p>Total Pending</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-download"></i>
                  </div>
                  <span class="small-box-footer">
                    Total Pending
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                  <div class="inner">
                      <h3><?= $allproses?></h3>

                      <p>Total Proses</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-recycle"></i>
                  </div>
                  <span class="small-box-footer">
                    Total Proses
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                  <div class="inner">
                      <h3><?= $alldelivery?></h3>

                      <p>Total Delivery</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-rocket"></i>
                  </div>
                  <span class="small-box-footer">
                    Total Delivery
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                  <div class="inner">
                      <h3><?= $allfailed?></h3>

                      <p>Total Failed</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-solid fa-trash"></i>
                  </div>
                  <span class="small-box-footer">
                    Total Failed
                  </span>
                  </div>
              </div>
              <!-- ./col -->
              </div>
          </div>
        <?php endif;?>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <?php if($this->checkusers->users_login()->level == 'superadmin'):?>
        <!-- AREA CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Line Chart Data Penjualan Barang</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <?php
                if(!$data){
                  echo "Tidak Ada Barang Terjual";
                }else{
                  $barang = array();
                  $penjualan = array();
                  foreach($data as $dt){
                    $barang[] = $dt->nama_barang;
                    $penjualan[] = (float) $dt->penjualan;
                  }
                  // var_dump($barang);
                  // die();
                }
              ?>
              <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      <?php endif;?>

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  <script>
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

        var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
        var areaChartData = {
          labels  : <?php echo json_encode($barang);?>,
          datasets: [
            {
              backgroundColor     : 'rgba(60,141,188,0.9)',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : true,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : <?php echo json_encode($penjualan);?>
            },
          ]
        }

        var areaChartOptions = {
          maintainAspectRatio : false,
          responsive : true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              gridLines : {
                display : true,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              }
            }]
          }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
          type: 'line',
          data: areaChartData,
          options: areaChartOptions
        })

  </script>