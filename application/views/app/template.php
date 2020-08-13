<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Selamat Datang Di Gudang Multigroup</title>
    <meta name="author" content="Nashiruddien Sadid Mustaqim">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/style.css">
    <link href="<?php echo base_url(); ?>asset/bootstrap-combobox.css" media="screen" rel="stylesheet" type="text/css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
    <script src="<?php echo base_url(''); ?>asset/js/phpmu.js"></script>
    <script src="<?php echo base_url(''); ?>asset/ckeditor/ckeditor.js"></script>
    
    <script src="<?php echo base_url(''); ?>asset/js/format_rp.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('#angka1').maskMoney();
          $('#angka2').maskMoney({prefix:'US$'});
          $('#jumlah_bayar').maskMoney({prefix:'', thousands:',', precision:0});
          $('#diskon_belanja').maskMoney({prefix:'', thousands:',', precision:0});
          $('#biaya_kirim').maskMoney({prefix:'', thousands:',', precision:0});
          $('#diskon_kirim').maskMoney({prefix:'', thousands:',', precision:0});
          $('#harga_beli').maskMoney({prefix:'', thousands:',', precision:0});
          $('#result').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
          $('#angka4').maskMoney();
        });
    </script>

    <script language="javascript" type="text/javascript">
      function popitup(url) {
        newwindow=window.open(url,'name','height=700,width=550');
        if (window.focus) {newwindow.focus()}
        return false;
      }
    </script>
    <script language="javascript" type="text/javascript">
      function popup(url) {
        newwindow=window.open(url,'name','height=500,width=1050');
        if (window.focus) {newwindow.focus()}
        return false;
      }
    </script>
    <?php if ($this->uri->segment(2)=='tambah_pembelian'){ ?>
      <script type="text/javascript">
        $(document).ready(function(){     
          autosave_pembelian();
        });

        function autosave_pembelian(){
          var t = setTimeout("autosave_pembelian()", 1000); 
          var a = $("#a").val();
          var g = $("#g").val();
          var c = $("#c").val();
          var d = $("#d").val();
          var e = $("#e").val();
          var f = $("#f").val();
          var b = $("#b").val();
          var h = $("#h").val();
          var i = $("#i").val();
          var j = $("#j").val();
              
             $.ajax({
                type: "POST",
                url:"<?php echo site_url('app/tambah_pembelian_autosave'); ?>",
                data: "a=" + a + "&g=" + g + "&c=" + c + "&d=" + d + "&e=" + e + "&f=" + f + "&g=" + g + "&h=" + h + "&i=" + i + "&j=" + j,
                cache: false,
             });  
        }
      </script>
    <?php } ?>

    <?php if ($this->uri->segment(2)=='transaksi_penjualan'){ ?>
    <script type="text/javascript">
      $(document).ready(function(){     
          autosave();
          autosave_keranjang();
          total_bayar();
          uang_kembali();
          sub_total();
      });

      function autosave(){
        var t = setTimeout("autosave()", 1000); 
        var id_pelanggan = $("#id_pelanggan").val();
        var id_type_bayar = $("#id_type_bayar").val();
        var expedisi = $("#expedisi").val();
        var no_resi = $("#no_resi").val();
        var biaya_kirim = $("#biaya_kirim").val();
        var diskon_expedisi = $("#diskon_expedisi").val();
        var diskon_kirim = $("#diskon_kirim").val();
        var diskon_belanja = $("#diskon_belanja").val();
        var gratis_biaya = $("#gratis_biaya").val();
        var jumlah_bayar = $("#jumlah_bayar").val();
        var keterangan = $("#keterangan").val();
            
           $.ajax({
              type: "POST",
              url:"<?php echo site_url('app/transaksi_penjualan_autosave'); ?>",
              data: "id_pelanggan=" + id_pelanggan + "&id_type_bayar=" + id_type_bayar + "&expedisi=" + expedisi + "&no_resi=" + no_resi + "&biaya_kirim=" + biaya_kirim + "&diskon_expedisi=" + diskon_expedisi + "&diskon_kirim=" + diskon_kirim + "&diskon_belanja=" + diskon_belanja + "&gratis_biaya=" + gratis_biaya + "&jumlah_bayar=" + jumlah_bayar + "&keterangan=" + keterangan,
              cache: false,
           });  
      } 

      function autosave_keranjang(){
        var t = setTimeout("autosave_keranjang()", 1000); 
        var id_transaksi_detail = $("#id_transaksi_detail").val();
        var jumlah_jual = $("#jumlah_jual").val();
        var kode_satuan = $("#kode_satuan").val();
           $.ajax({
              type: "POST",
              url:"<?php echo site_url('app/transaksi_penjualan_autosave_keranjang'); ?>",
              data: "id_transaksi_detail=" + id_transaksi_detail + "&jumlah_jual=" + jumlah_jual + "&kode_satuan=" + kode_satuan,
              cache: false,
           });  
      }

      function total_bayar(){
        setTimeout("total_bayar()", 1000);
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('app/total_bayar'); ?>"
            }).done(function( data ) {
            $('#total_bayar').html(data);
        });
      }

      function uang_kembali(){
        setTimeout("uang_kembali()", 1000);
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('app/uang_kembali'); ?>"
            }).done(function( data ) {
            $('#uang_kembali').html(data);
        });
      }

      function sub_total(){
        setTimeout("sub_total()", 1000);
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('app/sub_total'); ?>"
            }).done(function( data ) {
            $('#sub_total').html(data);
        });
      }
    </script>

    <script src="<?php echo base_url(''); ?>asset/js/shortcut.js" type="text/javascript"></script>
    <script>
        shortcut.add("F1",function() {
          window.open('<?php echo base_url(); ?>app/transaksi_selesai/<?php echo $this->session->id_transaksi; ?>', '_self');
        });

        shortcut.add("F2",function() {
          window.open('<?php echo base_url(); ?>app/transaksi_tunggu/<?php echo $this->session->id_transaksi; ?>', '_self');
        });

        shortcut.add("F3",function() {
          var r = confirm('Anda yakin ingin batalkan transaksi ini?');
            if (r == true) {
                window.open('<?php echo base_url(); ?>app/transaksi_batal/<?php echo $this->session->id_transaksi; ?>', '_self');
            } else {
                window.open('<?php echo base_url(); ?>app/transaksi_penjualan', '_self');
            }
        });

        shortcut.add("F4",function() {
          return popitup('<?php echo base_url(); ?>app/transaksi_penjualan_print/<?php echo $this->session->id_transaksi; ?>', '_self');
        });
      </script>

    <?php } ?>


    <?php if ($this->uri->segment(2)=='transaksi_return_penjualan'){ ?>
    <script type="text/javascript">
      $(document).ready(function(){     
          autosave_return();
          uang_kembali_return();
          total_bayar_return();
      });

      function autosave_return(){
        var t = setTimeout("autosave_return()", 1000); 
        var id_type_bayar = $("#id_type_bayar").val();
        var bayar_return = $("#bayar_return").val();
        var ket_return = $("#ket_return").val();
            
           $.ajax({
              type: "POST",
              url:"<?php echo site_url('app/transaksi_penjualan_return_autosave'); ?>",
              data: "id_type_bayar=" + id_type_bayar + "&bayar_return=" + bayar_return + "&ket_return=" + ket_return,
              cache: false,
           });  
      } 

      function uang_kembali_return(){
        setTimeout("uang_kembali_return()", 1000);
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('app/uang_kembali_return'); ?>"
            }).done(function( data ) {
            $('#uang_kembali_return').html(data);
        });
      }

      function total_bayar_return(){
        setTimeout("total_bayar_return()", 1000);
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('app/total_bayar_return'); ?>"
            }).done(function( data ) {
            $('#total_bayar_return').html(data);
        });
      }
    </script>
    <?php } ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#country').change(function(){
          var country_id = $(this).val();
          $.ajax({
            type:"POST",
            url:"<?php echo site_url('app/state'); ?>",
            data:"count_id="+country_id,
            success: function(response){
              $('#state').html(response);
            }
          })
        })

        $('#state').change(function(){
          var state_id = $(this).val();
          $.ajax({
            type:"POST",
            url:"<?php echo site_url('app/city'); ?>",
            data:"stat_id="+state_id,
            success: function(response){
              $('#city').html(response);
            }
          })
        })

        $('#kategori').change(function(){
          var kategori_id = $(this).val();
          $.ajax({
            type:"POST",
            url:"<?php echo site_url('app/sub_kategori'); ?>",
            data:"kat_id="+kategori_id,
            success: function(response){
              $('#subkategori').html(response);
            }
          })
        })

      })

      $(document).ready(function() {
        /// make loader hidden in start
        $('#loading').hide();
         $('#code').blur(function(){
            var code_val = $("#code").val();
                // show loader
                $('#loading').show();
                $.post("<?php echo site_url()?>app/code_check", {
                    a: code_val
                }, function(response){
                    $('#loading').hide();
                    $('#message').html('').html(response.message).show();
                });
                return false;
        });
      });  

      $(document).ready(function() {
        /// make loader hidden in start
        $('#loading').hide();
         $('#barang').blur(function(){
            var barang_val = $("#barang").val();
                // show loader
                $('#loading').show();
                $.post("<?php echo site_url()?>app/barang_check", {
                    a: barang_val
                }, function(response){
                    $('#loading').hide();
                    $('#message').html('').html(response.message).show();
                });
                return false;
        });
      }); 

      $(document).ready(function() {
        /// make loader hidden in start
        $('#loading').hide();
         $('#pembelian').blur(function(){
            var pembelian_val = $("#pembelian").val();
                // show loader
                $('#loading').show();
                $.post("<?php echo site_url()?>app/pembelian_check", {
                    a: pembelian_val
                }, function(response){
                    $('#loading').hide();
                    $('#message').html('').html(response.message).show();
                });
                return false;
        });
      });  
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <?php $row = $this->model_app->view_one_address('mu_conf_perusahaan',array('id_perusahaan' => 1),'id_perusahaan')->row_array(); ?>
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>
      
      <aside class="main-sidebar">
          <?php 
            include "menu-admin.php";  
          ?>
      </aside>

      <div class="content-wrapper">

      <div class="alert alert-warning"  style='border-radius:0px'>
      <img class='pull-left' style='width:50px; margin-right:10px; border:1px solid #e3e3e3' src='<?php echo base_url()."asset/images/$row[logo]"; ?>'>
        <h3 style='margin:0px;'><b><?php echo $row['nama_perusahaan'] ?></b></h3>
        <p style='color:#000'><?php echo "$row[alamat_perusahaan] - $row[city], $row[state], $row[country]"; ?></p>

      </div>
        <section class="content">

            <?php echo $contents; ?>
        </section>
        <div style='clear:both'></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    
    <!-- jQuery UI 1.11.4 -->

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>asset/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/admin/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-combobox.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.combobox').combobox()
        });
    </script>
    <script>
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy"});
    $('#datepickerr').datepicker({
        format: "dd/mm/yyyy"});
    $('#datepickerrr').datepicker({
        format: "dd/mm/yyyy"});
    $("#datepicker1").datepicker({
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });

      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });

      var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).closest('.treeview').addClass('active');
    </script>
    
    <script>
      $(function () {
        $(".textarea").wysihtml5();
      });

      CKEDITOR.replace('editor1' ,{
        filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder'); ?>'
      });
    </script>

    <script>
        $(function(){
            $(document).on('click','.detail-barang',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post("<?php echo site_url()?>app/detail_barang",
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>

    <script>
        $(function(){
            $(document).on('click','.riwayat-pembelian',function(e){
                e.preventDefault();
                $("#myModalRiwayat").modal('show');
                $.post("<?php echo site_url()?>app/detail_pembelian",
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>

    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer"></div>
          </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="myModalRiwayat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer"></div>
          </div>
      </div>
    </div>

  </body>
</html>
