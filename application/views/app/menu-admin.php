        <?php $users = $this->model_app->edit('mu_karyawan', array('id_karyawan' => $this->session->id_users))->row_array(); ?>
        <section class="sidebar">

          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()."asset/images/$users[foto_karyawan]" ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $users['nama_karyawan']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU ADMINISTRATOR</li>
            <li><a href="<?php echo base_url(); ?>app/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-archive"></i> <span>Barang</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>app/barang"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
                <li><a href="<?php echo base_url(); ?>app/promosi"><i class="fa fa-circle-o"></i> Daftar Promosi</a></li>
                <li><a href="<?php echo base_url(); ?>app/penyesuaian"><i class="fa fa-circle-o"></i> Daftar Penyesuaian</a></li>
                <li><a href="<?php echo base_url(); ?>app/barcode"><i class="fa fa-circle-o"></i> Label Barcode</a></li>
                <li><a href="<?php echo base_url(); ?>app/barang/ya"><i class="fa fa-circle-o"></i> Dijual</a></li>
                <li><a href="<?php echo base_url(); ?>app/barang/tidak"><i class="fa fa-circle-o"></i> Tidak Dijual</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Penjualan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>app/transaksi_penjualan"><i class="fa fa-circle-o"></i> Transaksi Penjualan <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>app/transaksi_sekarang"><i class="fa fa-circle-o"></i> Sekarang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/transaksi_penjualan_tunggu"><i class="fa fa-circle-o"></i> Tunggu</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>app/transaksi_return_penjualan"><i class="fa fa-circle-o"></i> Return Penjualan</a></li>
                <li><a href="<?php echo base_url(); ?>app/daftar_penjualan"><i class="fa fa-circle-o"></i> Daftar Penjualan <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>app/list_transaksi_penjualan"><i class="fa fa-circle-o"></i> Jual</a></li>
                    <li><a href="<?php echo base_url(); ?>app/list_transaksi_return"><i class="fa fa-circle-o"></i> Return</a></li>
                  </ul>
                </li>
                <!--<li><a href="<?php echo base_url(); ?>app/piutang_dagang"><i class="fa fa-circle-o"></i> Piutang Dagang</a></li>-->
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-cart-plus"></i> <span>Pembelian</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>app/pembelian"><i class="fa fa-circle-o"></i> Daftar Pembelian</a></li>
                <li><a href="<?php echo base_url(); ?>app/pembelian_terima"><i class="fa fa-circle-o"></i> Daftar Terima</a></li>
                <li><a href="<?php echo base_url(); ?>app/pembelian_return"><i class="fa fa-circle-o"></i> Daftar Return</a></li>
                <!--<li><a href="<?php echo base_url(); ?>app/hutang_dagang"><i class="fa fa-circle-o"></i> Hutang Dagang</a></li>-->
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>app/supplier"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-users"></i> <span>Pelanggan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>app/pelanggan"><i class="fa fa-circle-o"></i> Data Pelanggan</a></li>
                <li><a href="<?php echo base_url(); ?>app/bataspiutang"><i class="fa fa-circle-o"></i> Batas Piutang</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-odnoklassniki"></i> <span>Karyawan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>app/karyawan"><i class="fa fa-circle-o"></i> Daftar Karyawan</a></li>
                <li><a href="<?php echo base_url(); ?>app/jabatan"><i class="fa fa-circle-o"></i> Jabatan</a></li>
                <li><a href="<?php echo base_url(); ?>app/departemen"><i class="fa fa-circle-o"></i> Departemen</a></li>
                <!--<li><a href="<?php echo base_url(); ?>app/#"><i class="fa fa-circle-o"></i> Hak Akses</a></li>-->
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-money"></i> <span>Keuangan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>app/bebanbiaya"><i class="fa fa-circle-o"></i> Beban Biaya</a></li>
                <li><a href="<?php echo base_url(); ?>app/pendapatan"><i class="fa fa-circle-o"></i> Pendapatan</a></li>
                <li><a href="<?php echo base_url(); ?>app/perkiraan"><i class="fa fa-circle-o"></i> Data Perkiraan</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-book"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Barang <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>laporan/barang"><i class="fa fa-circle-o"></i> Data barang</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/jumlah_minimal"><i class="fa fa-circle-o"></i> Jumlah Minimal</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/tidak_terjual"><i class="fa fa-circle-o"></i> Tidak Terjual</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/penyesuaian"><i class="fa fa-circle-o"></i> Penyesuaian</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/promosi_barang"><i class="fa fa-circle-o"></i> Promosi Barang</a></li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Penjualan <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>laporan/penjualan"><i class="fa fa-circle-o"></i> Data Penjualan</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/penjualan_perbarang"><i class="fa fa-circle-o"></i> Penj. Perbarang</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/penjualan_barang_terlaris"><i class="fa fa-circle-o"></i> Barang Terlaris</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/pelanggan_tersering"><i class="fa fa-circle-o"></i> Pelanggan Tersering</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/return_penjualan"><i class="fa fa-circle-o"></i> Return Penjualan</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/return_perbarang"><i class="fa fa-circle-o"></i> Return Perbarang</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/pengiriman_barang"><i class="fa fa-circle-o"></i> Pengiriman Barang</a></li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Pembelian <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>laporan/pembelian"><i class="fa fa-circle-o"></i> Data Pembelian</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/pembelian_perbarang"><i class="fa fa-circle-o"></i> Pemb. Perbarang</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/barang_terbanyak"><i class="fa fa-circle-o"></i> Barang Terbanyak</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/return_pembelian"><i class="fa fa-circle-o"></i> Return Pembelian</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/return_perbarang"><i class="fa fa-circle-o"></i> Return Perbarang</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>laporan/supplier"><i class="fa fa-circle-o"></i> Supplier</a></li>
                <li><a href="<?php echo base_url(); ?>laporan/pelanggan"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
                <li><a href="<?php echo base_url(); ?>laporan/karyawan"><i class="fa fa-circle-o"></i> Karyawan</a></li>
                <li><a href="<?php echo base_url(); ?>laporan/keuangan"><i class="fa fa-circle-o"></i> Keuangan</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Data Pendukung <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>laporan/satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/rak"><i class="fa fa-circle-o"></i> Rak Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/kategori"><i class="fa fa-circle-o"></i> Kategori Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/subkategori"><i class="fa fa-circle-o"></i> Subkategori Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/kategori_pelanggan"><i class="fa fa-circle-o"></i> Kategori Pelanggan</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/agen_ekspedisi"><i class="fa fa-circle-o"></i> Agen Ekspedisi</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/sebab_alasan"><i class="fa fa-circle-o"></i> Sebab / Alasan</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/negara"><i class="fa fa-circle-o"></i> Data Negara</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/provinsi"><i class="fa fa-circle-o"></i> Data Propinsi</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/kota"><i class="fa fa-circle-o"></i> Data Kota</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/pendidikan"><i class="fa fa-circle-o"></i> Pendidikan</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/bahasa"><i class="fa fa-circle-o"></i> Bahasa</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Konfigurasi</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Data Pendukung <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>app/satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/rak"><i class="fa fa-circle-o"></i> Rak Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/kategori"><i class="fa fa-circle-o"></i> Kategori Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/subkategori"><i class="fa fa-circle-o"></i> Subkategori Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/kategori_pelanggan"><i class="fa fa-circle-o"></i> Kategori Pelanggan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/agen_ekspedisi"><i class="fa fa-circle-o"></i> Agen Ekspedisi</a></li>
                    <li><a href="<?php echo base_url(); ?>app/sebab_alasan"><i class="fa fa-circle-o"></i> Sebab / Alasan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/negara"><i class="fa fa-circle-o"></i> Data Negara</a></li>
                    <li><a href="<?php echo base_url(); ?>app/provinsi"><i class="fa fa-circle-o"></i> Data Propinsi</a></li>
                    <li><a href="<?php echo base_url(); ?>app/kota"><i class="fa fa-circle-o"></i> Data Kota</a></li>
                    <li><a href="<?php echo base_url(); ?>app/pendidikan"><i class="fa fa-circle-o"></i> Pendidikan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/bahasa"><i class="fa fa-circle-o"></i> Bahasa</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Data Aplikasi <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>app/conf_perusahaan"><i class="fa fa-circle-o"></i> Perusahaan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/conf_barang"><i class="fa fa-circle-o"></i> Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/conf_penjualan"><i class="fa fa-circle-o"></i> Penjualan</a></li>
                  </ul>
                </li>
                <!--
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Data Format Cetak <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="<?php echo base_url(); ?>app/conf_perusahaan"><i class="fa fa-circle-o"></i> Faktur Penjualan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/conf_barang"><i class="fa fa-circle-o"></i> Surat Jalan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/conf_penjualan"><i class="fa fa-circle-o"></i> Pembelian (PO)</a></li>
                    <li><a href="<?php echo base_url(); ?>app/conf_tampilan"><i class="fa fa-circle-o"></i> Kartu Piutang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/conf_database"><i class="fa fa-circle-o"></i> Kartu Hutang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/conf_barcode"><i class="fa fa-circle-o"></i> Laporan</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>app/conf_barcode"><i class="fa fa-circle-o"></i> Label Barcode</a></li>
                -->
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>app/edit_karyawan/<?php echo $this->session->id_users; ?>"><i class="glyphicon glyphicon-user"></i> <span>Edit Profile</span></a></li>
            <li><a href="<?php echo base_url(); ?>app/logout"><i class="glyphicon glyphicon-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>