<?php if ($this->session->level == 'admin'){ ?> 
  <a style='color:#000' href='<?php echo base_url(); ?>app/list_transaksi_penjualan'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Penjualan</span>
        <?php $jmla = $this->db->query("SELECT * FROM mu_transaksi where status='selesai'")->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmla ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a style='color:#000' href='<?php echo base_url(); ?>app/pembelian'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pembelian</span>
        <?php $jmlb = $this->db->query("SELECT * FROM mu_pembelian")->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmlb ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a style='color:#000' href='<?php echo base_url(); ?>app/barang'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-archive"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Barang</span>
        <?php $jmlc = $this->db->query("SELECT * FROM mu_barang")->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmlc ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a style='color:#000' href='<?php echo base_url(); ?>app/pelanggan'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pelanggan</span>
        <?php $jmld = $this->db->query("SELECT * FROM mu_pelanggan")->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmld ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>
<?php } ?>
  <div style='clear:both'></div>

  <div class='col-md-7'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Application Buttons</h3>
        </div>
        <div class='box-body'>
          <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola data-data pada aplikasi ini
              atau pilih ikon-ikon pada Control Panel di bawah ini : </p>

          <a href="<?php echo base_url(); ?>app/satuan" class='btn btn-app'><i class='fa fa-file-image-o'></i> Satuan</a>
          <a href="<?php echo base_url(); ?>app/rak" class='btn btn-app'><i class='fa fa-file-image-o'></i> Rak Barang</a>
          <a href="<?php echo base_url(); ?>app/kategori" class='btn btn-app'><i class='fa fa-circle-thin'></i> Kategori</a>
          <a href="<?php echo base_url(); ?>app/subkategori" class='btn btn-app'><i class='fa fa-file'></i> Subkategori</a>
          <a href="<?php echo base_url(); ?>app/kategori_pelanggan" class='btn btn-app'><i class='fa fa-circle'></i> Kategori Pelanggan</a>
          <a href="<?php echo base_url(); ?>app/agen_ekspedisi" class='btn btn-app'><i class='fa fa-file-text'></i> Agen Ekspedisi</a>
          <a href="<?php echo base_url(); ?>app/sebab_alasan" class='btn btn-app'><i class='fa fa-bed'></i> Sebab Alasan</a>
          <a href="<?php echo base_url(); ?>app/negara" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Negara</a>
          <a href="<?php echo base_url(); ?>app/provinsi" class='btn btn-app'><i class='glyphicon glyphicon-queen'></i> Propinsi</a>
          <a href="<?php echo base_url(); ?>app/kota" class='btn btn-app'><i class='glyphicon glyphicon-pawn'></i> Kota</a>
          <a href="<?php echo base_url(); ?>app/pendidikan" class='btn btn-app'><i class='glyphicon glyphicon-pencil'></i> Data Pendidikan </a>
          <a href="<?php echo base_url(); ?>app/bahasa" class='btn btn-app'><i class='glyphicon glyphicon-flag'></i> Data Bahasa </a>

          <a href="<?php echo base_url(); ?>app/barang" class='btn btn-app'><i class='fa fa-th'></i> Data Barang</a>
          <a href="<?php echo base_url(); ?>app/promosi" class='btn btn-app'><i class='fa fa-th-large'></i> Barang Promosi</a>
          <a href="<?php echo base_url(); ?>app/penyesuaian" class='btn btn-app'><i class='fa fa-television'></i> Penyesuaian Barang </a>
          <a href="<?php echo base_url(); ?>app/barcode" class='btn btn-app'><i class='fa fa-bars'></i> Barcode</a>
          <a href="<?php echo base_url(); ?>app/pembelian" class='btn btn-app'><i class='fa fa-comments'></i> Pembelian</a>
          <a href="<?php echo base_url(); ?>app/supplier" class='btn btn-app'><i class='fa fa-bell-slash'></i> Supplier</a>
          <a href="<?php echo base_url(); ?>app/pelanggan" class='btn btn-app'><i class='glyphicon glyphicon-ok'></i> Pelanggan</a>
          <a href="<?php echo base_url(); ?>app/karyawan" class='btn btn-app'><i class='glyphicon glyphicon-ok'></i> Karyawan</a>
          <a href="<?php echo base_url(); ?>app/jabatan" class='btn btn-app'><i class='fa fa-th-list'></i> Jabatan</a>
          <a href="<?php echo base_url(); ?>app/departemen" class='btn btn-app'><i class='fa fa-bar-chart-o'></i> Departemen</a>
          <a href="<?php echo base_url(); ?>app/bebanbiaya" class='btn btn-app'><i class='fa fa-file-image-o'></i> Beban Biaya</a>
          <a href="<?php echo base_url(); ?>app/pendapatan" class='btn btn-app'><i class='fa fa-file-image-o'></i> Pendapatan</a>
          <a href="<?php echo base_url(); ?>app/perkiraan" class='btn btn-app'><i class='fa fa-file-image-o'></i> Perkiraan</a>
          <a href="<?php echo base_url(); ?>app/conf_perusahaan" class='btn btn-app'><i class='fa fa-file-image-o'></i> Conf. Perusahaan</a>
          <a href="<?php echo base_url(); ?>app/conf_barang" class='btn btn-app'><i class='fa fa-file-image-o'></i> Conf. Barang</a>
          <a href="<?php echo base_url(); ?>app/conf_penjualan" class='btn btn-app'><i class='fa fa-file-image-o'></i> Conf. Penjualan</a>
          <a href="<?php echo base_url(); ?>app/edit_karyawan/<?php echo $this->session->id_users; ?>" class='btn btn-app'><i class='fa fa-edit'></i> Profile</a>
          <a href="<?php echo base_url(); ?>app/logout" class='btn btn-app'><i class='glyphicon glyphicon-off'></i> Logout</a>
        </div>
      </div>
  </div>

<?php 
$users = $this->model_app->edit('mu_karyawan', array('id_karyawan' => $this->session->id_users))->row_array();
  echo "<div class='col-md-5'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Identitas Login</h3>
        </div>
        <div class='box-body'>
        <div class='box box-widget widget-user'>
            <div class='widget-user-header bg-aqua-active'>
              <h3 class='widget-user-username'>$users[nama_karyawan]</h3>
              <h5 class='widget-user-desc'>Administrator</h5>
            </div>
            <div class='widget-user-image'>
              <img class='img-circle' src='".base_url()."asset/images/$users[foto_karyawan]' alt='User Avatar'>
            </div>
            <div class='box-footer' style='padding-bottom:0px'>
              <div class='row'>
                <center><br>
                <p style='width:90%'>Haloo Selamat datang!, Silahkan mengelola data-data melalui menu-menu yang sudah tersedia pada bagian sebelah kiri halaman ini, 
                    Berikut data informasi detail akun anda saat ini : </p>
                </center>
              </div>
            </div>
          </div>
          <dl class='dl-horizontal'>
                <dt>Nama Lengkap</dt>
                <dd>$users[nama_karyawan]</dd>

                <dt>Alamat Email</dt>
                <dd>$users[email_karyawan]</dd>

                <dt>No. Handphone</dt>
                <dd>$users[hp_karyawan]</dd>

                <dt>Alamat Lengkap</dt>
                <dd>$users[alamat_karyawan_1]</dd>

              </dl>
              <a class='btn btn-block btn-sm btn-default' href='".base_url()."app/edit_karyawan/".$this->session->id_users."'>Edit Data Profile</a><br>";
        ?>
          

        </div>
      </div>
   </div>
            