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
          <div class="h3 ml-auto">Kasir Produk</div>

          <?php $this->load->view('kasir/menu_kanan') ?>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6 ">

                        <form class="form-horizontal" name="input_form" onsubmit="return validateForm()" action="<?= site_url() ?>option/shoping" method="post" id="form_transaksi" role="form">

                          <div class="form-group row">
                            <label class="col-md-3 col-form-label"> Type penjualan</label>
                              <div class="col-md-9">
                                <select class="form-control" name="type_penjualan" id="type_penjualan">
                                  <option value="" selected>Pilih dulu coy!</option>
                                  <option value="offline">Offline</option>
                                  <option value="online">Online</option>
                                  <option value="reseller">Reseller</option>
                                </select>
                              </div>
                          </div>

                          <div class="form-group row" style="display: none" id="box_pembayaran">
                            <label class="col-md-3 col-form-label"> Pembayaran</label>
                              <div class="col-md-9">
                                <select class="form-control" name="pembayaran" id="pembayaran">
                                  <option value="cash">Cash</option>
                                  <option value="transfer">Transfer</option>
                                  <option value="hutang">Hutang</option>
                                </select>
                              </div>
                          </div>

                          <div class="form-group row" style="display: none" id="box_peminjam">
                            <label class="col-md-3 col-form-label"> Peminjam</label>
                              <div class="col-md-9">
                                <input class="form-control reset" type="text" id="peminjam" name="peminjam" placeholder="peminjam" >
                              </div>
                          </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Nama Produk</label>
                                <div class="col-md-9">
                                  <input class="form-control reset" id="pencarian" readonly  name="id" type="text" placeholder="cari produk" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-9">
                                  <input class="form-control reset" type="text" id="nama_barang" name="nama" readonly="" placeholder="" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label"> Harga jual</label>
                                <div class="col-md-9">
                                  <input class="form-control reset" type="text" name="harga" id="harga"  readonly="" placeholder="0"value="">
                                  <p style="color: red; font; font-style: italic; margin-top: 10px">Jika harga belum sesuai, silahkan disesuaikan!</p>
                                </div>
                            </div>
                                
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Quantity</label>
                                <div class="col-md-9">
                                  <input class="form-control reset" type="number" readonly="readonly" id="qty" min="0" name="qty" placeholder="quantity">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary" id="selesai"> Selesai</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('kasir/footer') ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
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
      $(document).ready(function(){
          $("#type_penjualan").change(function() {
            if ($(this).val() == '') {
              $("#pencarian").attr('readonly', true).val('')
              $("#harga").attr('readonly', true).val('')
              $("#qty").attr('readonly', true).val('')
              $("#box_pembayaran").css('display', 'none')
            } else {
              $("#pencarian").attr('readonly', false).val('')
              $("#harga").attr('readonly', false).val('')
              $("#qty").attr('readonly', false).val('')

              if ($(this).val() === 'offline') {
                $("#box_pembayaran").css('display', 'flex')
              } else {
                $("#box_pembayaran").css('display', 'none')
                $("#box_peminjam").css('display', 'none')
              }
            }
          })

          $("#pembayaran").change(function() {
            if ($(this).val() === 'hutang') {
              $("#box_peminjam").css('display', 'flex')
            } else {
              $("#box_peminjam").css('display', 'none')
            }
          })
       });

       function validateForm() {
          var type_penjualan = document.forms["input_form"]["type_penjualan"].value;
          var pembayaran = document.forms["input_form"]["pembayaran"].value;
          var peminjam = document.forms["input_form"]["peminjam"].value;
          var id = document.forms["input_form"]["id"].value;
          var nama = document.forms["input_form"]["nama"].value;
          var harga = document.forms["input_form"]["harga"].value;
          var qty = document.forms["input_form"]["qty"].value;

          if (type_penjualan === "") {
            alert("Semua input harus diisi");
            return false;
          } else {
            if (type_penjualan === "offline") {
              if (pembayaran === 'hutang') {
                if (id === '' || nama === '' || harga === '' || qty === '' || peminjam === '') {
                  alert("Semua input harus diisi");
                  return false;
                } else {
                  $("#loading").css('display','flex')
                }
              } else {
                if (id === '' || nama === '' || harga === '' || qty === '') {
                  alert("Semua input harus diisi");
                  return false;
                } else {
                  $("#loading").css('display','flex')
                }
              }
            } else {
              if (id === '' || nama === '' || harga === '' || qty === '') {
                alert("Semua input harus diisi");
                return false;
              } else {
                $("#loading").css('display','flex')
              }
            }
          }
        }
       
       function reload_table(){
           table.ajax.reload(null,false);
       }
    	
      // function convertToRupiah(angka)
      // {
      //     var rupiah = '';
      //     var angkarev = angka.toString().split('').reverse().join('');
      //     for(var i = 0; i < angkarev.length; i++)
      //     if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      //     return rupiah.split('',rupiah.length-1).reverse().join('');
      // }
       
       $(function(){
            $("#pencarian").autocomplete({
                minLength: 1,
                delay : 400,
                source: function(request, response) { 
                    jQuery.ajax({
                        url:      "<?php echo base_url(); ?>option/cari_barang",
                        data: {
                          keyword : request.term
                        },
                        dataType: "json",
                        success: function(data){
                          response(data);
                        }   
                    })
                },

                select:  function(e, ui){
                    var nama = ui.item.nama_barang;
                    var code = ui.item.id_barang;
                    const typePenjualan = $("#type_penjualan").val()
                    
                    $("#pencarian").val(code);
                    $("#nama_barang").val(nama);
                    
                    if (typePenjualan == 'offline') {
                      $("#harga").val(ui.item.harga_jual);
                    } else if (typePenjualan == 'online') {
                      $("#harga").val(ui.item.harga_jual_online);
                    } else {
                      $("#harga").val(ui.item.harga_jual_reseller);
                    }

                    $('#qty').removeAttr("readonly");
                    $('#qty').focus();
                    return false;
                }
            })
            .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
               return $( "<li>" )
               .append( "<a>" + item.id_barang + " " + item.nama_barang + "</a>" )
               .appendTo( ul );
            };
        })
  </script>
</body>

</html>
