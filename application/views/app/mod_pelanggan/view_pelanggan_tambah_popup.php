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
<style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url(''); ?>asset/js/phpmu.js"></script>
    <div class="wrapper">
      <section class="content">
          <?php 
          echo "<div class='col-md-12'>
                    <div class='box box-info'>
                      <div class='box-header with-border'>
                        <h3 class='box-title'>Tambahkan Data Pelanggan</h3>
                        <a href='".base_url()."pelanggan/index' class='btn btn-sm btn-warning pull-right'>Kembali</a>
                      </div>
                    <div class='box-body'>";
                    $attributes = array('class'=>'form-horizontal','role'=>'form');
                    echo form_open_multipart('pelanggan/tambah_pelanggan_popup',$attributes); 
                echo "<div class='col-md-6'>
                        <table class='table table-condensed table-bordered'>
                        <tbody>
                          <input type='hidden' name='id' value=''>
                          <tr><th width='150px' scope='row'>Kategori Pelanggan</th>    <td><select class='form-control' name='a' required>
                                                                  <option value=''>- Pilih -</option>";
                                                                  foreach ($kategori_pelanggan as $r) {
                                                                      echo "<option value='$r[id_kategori_pelanggan]'>$r[nama_kategori_pelanggan]</option>";
                                                                  }
                                                              echo "</select></td></tr>
                          <tr><th scope='row'>Type Pelanggan</th>    <td><select class='form-control' name='b' required>
                                                                  <option value=''>- Pilih -</option>";
                                                                  foreach ($type_pelanggan as $r) {
                                                                      echo "<option value='$r[id_type_pelanggan]'>$r[type_pelanggan]</option>";
                                                                  }
                                                              echo "</select></td></tr>
                          <tr><th scope='row'>Nama Pelanggan</th>    <td><input type='text' class='form-control' name='c' required></td></tr>
                          <tr><th scope='row'>Kontak Person</th>    <td><input type='text' class='form-control' name='d'></td></tr>
                          <tr><th scope='row'>Alamat 1</th>    <td><input type='text' class='form-control' name='e'></td></tr>
                          <tr><th scope='row'>Alamat 2</th>    <td><input type='text' class='form-control' name='f'></td></tr>
                          <tr><th scope='row'>Negara</th>    <td><select class='form-control' name='i' id='country' required>
                                                                  <option value=''>- Pilih -</option>";
                                                                  foreach ($negara as $rows) {
                                                                    if ($row['country_id']==$rows['country_id']){
                                                                      echo "<option value='$rows[country_id]' selected>$rows[name]</option>";
                                                                    }else{
                                                                      echo "<option value='$rows[country_id]'>$rows[name]</option>";
                                                                    }
                                                                  }
                                                              echo "</select></td></tr>
                          <tr><th scope='row'>Propinsi</th>     <td><select class='form-control' name='h' id='state' required>
                                                                      <option value=''>- Pilih -</option>
                                                                    </select></td></tr>
                          <tr><th scope='row'>Kota</th>         <td><select class='form-control' name='g' id='city' required>
                                                                      <option value=''>- Pilih -</option>
                                                                    </select></td></tr>
                        </tbody>
                        </table>
                      </div>

                      <div class='col-md-6'>
                        <table class='table table-condensed table-bordered'>
                        <tbody>
                          <tr><th width='150px' scope='row'>Telepon</th>    <td><input type='number' class='form-control' name='j'></td></tr>
                          <tr><th scope='row'>Hp</th>    <td><input type='number' class='form-control' name='k'></td></tr>
                          <tr><th scope='row'>Email</th>    <td><input type='email' class='form-control' name='l'></td></tr>
                          <tr><th scope='row'>Website</th>    <td><input type='url' class='form-control' name='m'></td></tr>
                          <tr><th scope='row'>Kode Pos</th>    <td><input type='number' class='form-control' name='n'></td></tr>
                          <tr><th scope='row'>Fax</th>    <td><input type='number' class='form-control' name='o'></td></tr>
                          <tr><th scope='row'>Chat</th>    <td><input type='text' class='form-control' name='p'></td></tr>
                          <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='q'></textarea></td></tr>
                        </tbody>
                        </table>
                      </div>

                    </div>
                    <div class='box-footer'>
                          <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                          <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                          
                        </div>
                  </div></form>";
          ?>

        </div>
      </div>
    </div>
  </section>
</div>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
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
<script>
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
</script>