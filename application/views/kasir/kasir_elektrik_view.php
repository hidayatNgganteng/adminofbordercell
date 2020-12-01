<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <link href="<?= base_url() ?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
  <title>kasir</title>
  <style>
      @media print{
          #wrapper {
              display:none;
              }
          
          .modal-footer, .modal-header {
              display:none;
              }

          title{
            display: none;
          }
          }
          .message {
        padding: 15px 15px;
        background-color: #ff3300;
      }
      .textMessage {
        text-align: center;
        color: #ffffff; 
        font-weight: bold; 
        animation: blinker 1s linear infinite;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <?php $this->load->view('kasir/menu') ?>

    <div id="content-wrapper" class="d-flex flex-column">
      <?php $this->load->view('kasir/message') ?>
      
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div class="h3 ml-auto">Kasir elektrik</div>

          <?php $this->load->view('kasir/menu_kanan') ?>
        </nav>

        <div class="container-fluid">
          <div class="col-sm-12">
            <?php if($this->session->flashdata('error') != "") { ?>
              <p class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error') ?>
              </p>
            <?php } ?>

            <?php if($this->session->flashdata('success') != "") { ?>
              <p class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success') ?>
              </p>
            <?php } ?>

            <div class="row">
              <div class="col-sm-12 col-md-6 ">

                  <form class="form-horizontal" id="form_transaksi" role="form" method="post" action="<?= site_url() ?>option/save_produk_elektrik" name="input_form" onsubmit="return validateForm()">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"> Nama Produk</label>
                        <div class="col-md-9">
                          <input class="form-control reset" type="text" id="nama_brg" name="nama_brg" placeholder="nama" >
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"> Pembayaran</label>
                        <div class="col-md-9">
                          <select class="form-control" name="pembayaran" id="pembayaran">
                            <option value="cash">Cash</option>
                            <option value="hutang">Hutang</option>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"> Harga beli</label>
                        <div class="col-md-9">
                          <input class="form-control reset" type="text" name="harga_beli" id="harga_beli"  placeholder="0">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"> Harga jual</label>
                        <div class="col-md-9">
                          <input class="form-control reset" type="text" name="harga_jual" id="harga_jual"  placeholder="0">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"> Pilih saldo</label>
                        <div class="col-md-9">
                          <select class="form-control" name="jenis_saldo" id="jenis_saldo">
                            <option value="mitra">Mitra</option>
                            <option value="orderkuota">Order Kuota</option>
                            <option value="digipos">Digipos (chip tsel)</option>
                            <option value="isimple">I-Simple (chip isat)</option>
                            <option value="rita">Rita (chip tri)</option>
                          </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-md btn-primary" id="input"> Selesai</button>
                  </form>
              </div>
            </div>
          </div>
        </div>

      </div>

      <?php $this->load->view('kasir/footer') ?>

    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div style="position: absolute; width: 100%; height: 100%; display:none; align-items: center; justify-content: center; left: 0; top: 0; background-color: rgba(0,0,0,0.75);" id="loading">
    <img style="width: 500px; height: auto" src="<?php echo base_url(); ?>assets/images/loading.gif" />
  </div>

  <script src="<?= base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap-4.1.3/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
  <script src="<?= base_url() ?>assets/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url() ?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script>
    function validateForm() {
      var nama_brg = document.forms["input_form"]["nama_brg"].value;
      var pembayaran = document.forms["input_form"]["pembayaran"].value;
      var harga_beli = document.forms["input_form"]["harga_beli"].value;
      var harga_jual = document.forms["input_form"]["harga_jual"].value;
      var jenis_saldo = document.forms["input_form"]["jenis_saldo"].value;

      if (nama_brg === '' || pembayaran === '' || harga_beli === '' || harga_jual === '' || jenis_saldo === '') {
        alert("Semua input harus diisi");
        return false;
      } else {
        $("#loading").css('display', 'flex')  
      }
    }
  </script>
</body>

</html>
