<?php 
  $ppn = $this->db->query("SELECT * FROM mu_conf_penjualan ORDER BY id_conf_penjualan DESC LIMIT 1")->row_array();
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Transaksi Penjualan</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/transaksi_penjualan',$attributes); 

          echo "<div class='col-md-9'>
                  <select name='a' class='combobox form-control' required autofocus>
                    <option value=''> Ketikan Kode / Nama atau scan barcode... </option>"; 
                    foreach ($barang as $rows){
                        echo "<option value='$rows[id_barang]'>$rows[kode_barang] - $rows[nama_barang]</option>";
                    }
                 echo "</select><input class='hidden btn btn-success btn-sm' type='submit' name='submit'>
                  </form>";

                  echo form_open_multipart('app/update_keranjang',$attributes); 
                  echo "<table style='margin-top:5px' class='table table-bordered table-striped table-condensed'>
                        <thead>
                          <tr bgcolor='#e3e3e3'>
                            <th width='20px'>No</th>
                            <th>Nama Barang</th>
                            <th width='80px'>Jml</th>
                            <th width='80px'>Sat</th>
                            <th width='100px'>Harga</th>
                            <th width='100px'>Disk (Rp)</th>
                            <th width='100px'>Total</th>
                            <th style='width:50px'></th>
                          </tr>
                          </thead>
                        <tbody>";
                          $no = 1;
                          $transaksi_detail = $this->db->query("SELECT a.*, b.nama_barang FROM mu_transaksi_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_transaksi='".$this->session->id_transaksi."' ORDER BY a.id_transaksi_detail DESC");
                          if ($row['id_kategori_pelanggan']==''){ $id_kategori_pelanggan = '1'; }else{ $id_kategori_pelanggan = $row['id_kategori_pelanggan']; }
                          foreach ($transaksi_detail->result_array() as $r){
                            echo "<tr>
                                  <input type='hidden' name='idb[$no]' value='$r[id_barang]'>
                                  <input type='hidden' name='id[$no]' value='$r[id_transaksi_detail]'>
                                  <input type='hidden' name='ikp[$no]' value='$id_kategori_pelanggan'>
                                  <td>$no</td>
                                  <td>$r[nama_barang] "; if ($r['status']=='0'){ echo "<small class='free'>(Gratis)</small>"; } echo "</td>";
                                  if ($r['status']=='1'){
                                    echo "<td><input type='number' name='jml[$no]' value='$r[jumlah_jual]' style='width:100%; text-align:center'></td>
                                          <td><select name='satuan[$no]' value='$r[kode_satuan]' style='width:100%; padding:2px'>";
                                            $satuan = $this->db->query("SELECT * FROM mu_barang_harga where id_barang='$r[id_barang]' AND id_kategori_pelanggan='$id_kategori_pelanggan'");
                                            foreach ($satuan->result_array() as $s) {
                                              if ($r['kode_satuan']==$s['satuan']){
                                                echo "<option value='$s[satuan]' selected>$s[satuan]</option>";
                                              }else{
                                                echo "<option value='$s[satuan]'>$s[satuan]</option>";
                                              }
                                            }
                                    echo "</select></td>";
                                  }else{
                                    echo "<input type='hidden' name='jml[$no]' value='$r[jumlah_jual]'>
                                          <input type='hidden' name='satuan[$no]' value='$r[kode_satuan]'>
                                          <td align=center><span style='margin-left:-15px'>$r[jumlah_jual]</span></td>
                                          <td><span style='margin-left:7px'>$r[kode_satuan]</span></td>";
                                  }

                                  echo "<td>".rupiah($r['harga_jual'])."</td>
                                        <td>".rupiah($r['diskon_jual'])."</td>";

                                  if ($r['status']=='1'){
                                    echo "<td>".rupiah(($r['jumlah_jual']*$r['jumlah_satuan']*$r['harga_jual'])-$r['diskon_jual'])."</td>";
                                  }else{
                                    echo "<td>0</td>";
                                  }

                                  echo "<td align=center><a href='".base_url()."app/delete_transaksi_barang/$r[id_transaksi_detail]' class='text-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
                                </tr>";
                            $no++;
                          }
                        echo "</tbody>
                    </table>
                    <input class='hidden btn btn-success btn-sm' type='submit' name='submit'>
                    </form>";
                    if ($row['gratis_kirim']=='1'){ $gratis_kirim = 'checked'; }else{ $gratis_kirim = ''; }
                    $brt = $this->db->query("SELECT sum(jumlah_jual*berat_bruto) as berat FROM `mu_transaksi_detail` a JOIN mu_barang b ON a.id_barang=b.id_barang where id_transaksi='".$this->session->id_transaksi."' AND status='1'")->row_array();
                    $tot = $this->db->query("SELECT sum((jumlah_jual*harga_jual)-diskon_jual) as subtotal FROM `mu_transaksi_detail` where id_transaksi='".$this->session->id_transaksi."'")->row_array();
                    $tot2 = $this->db->query("SELECT (biaya_kirim-diskon_persen/100*biaya_kirim-diskon_rupiah) as total, gratis_kirim, diskon_belanja, jumlah_bayar, keterangan FROM `mu_transaksi` where id_transaksi='".$this->session->id_transaksi."'")->row_array();
                    if ($tot2['gratis_kirim']=='1'){
                      $total = $tot['subtotal']-$tot2['diskon_belanja'];
                    }else{
                      $total = $tot['subtotal']+$tot2['total'];
                    }
                    echo "<div style='background:#e3e3e3; padding:10px'>  
                      <input type='checkbox' id='gratis_biaya' name='gratis_biaya' $gratis_kirim> Gratis Biaya Pengiriman
                      <span class='pull-right' style='margin-right:10px'>Total Berat Bruto : ".number_format($brt['berat'],1)." Kg</span>
                      <div style='clear:both'><hr style='margin:10px'></div>

                      Expedisi    : <select class='form-control input-sm bayar_combo' id='expedisi' name='expedisi'  style='width:10%; display:inline-block'>
                                      <option value=''>- Pilih -</option>";
                                      foreach ($agen_ekspedisi as $rows){
                                        if ($row['id_agen_ekspedisi']==$rows['id_agen_ekspedisi']){
                                          echo "<option value='$rows[id_agen_ekspedisi]' selected>$rows[nama]</option>";
                                        }else{
                                          echo "<option value='$rows[id_agen_ekspedisi]'>$rows[nama]</option>";
                                        }
                                      }
                                    echo "</select>
                      No Resi     : <input class='form-control input-sm bayar_combo' type='text' id='no_resi' name='no_resi' value='$row[no_resi]' style='width:75%; display:inline-block'><hr style='margin:5px'>
                      Biaya Kirim : <input class='form-control input-sm bayar_combo' type='text' id='biaya_kirim' name='biaya_kirim' value='".rupiah($row['biaya_kirim'])."' style='width:15%; display:inline-block'>
                      Diskon (%) Ekspedisi    : <input class='form-control input-sm bayar_combo' type='text' id='diskon_expedisi' name='diskon_expedisi' value='$row[diskon_persen]' style='width:15%; display:inline-block'>
                      Diskon (Rp) Biaya Kirim : <input class='form-control input-sm bayar_combo' type='text' id='diskon_kirim' name='diskon_kirim' value='".rupiah($row['diskon_rupiah'])."' style='width:15%; display:inline-block'>
                    </div>
                  </div>

                  <div class='col-md-3'>
                    <a href='".base_url()."app/transaksi_penjualan_print/".$this->session->id_transaksi."' title='Tambahkan Pelangan Baru' onclick=\"return popup('".base_url()."pelanggan/index')\"><i class='fa fa-plus'></i></a>
                    <div class='col-sm-11'>
                    <select id='id_pelanggan' name='id_pelanggan' class='combobox form-control'>
                        <option value='$row[id_pelanggan]'> Cari Pelanggan</option>"; 
                        foreach ($pelanggan->result_array() as $rows){
                          if ($row['id_pelanggan']==$rows['id_pelanggan']){
                            echo "<option value='$rows[id_pelanggan]' selected>$rows[nama_pelanggan] - $rows[nama_kategori_pelanggan]</option>";
                          }else{
                            echo "<option value='$rows[id_pelanggan]'>$rows[nama_pelanggan] - $rows[nama_kategori_pelanggan]</option>";
                          }
                        }
                     echo "</select>
                     </div>

                    <table class='table table-bordered table-striped table-condensed'>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Sub Total</td>    <td width='5px'>:</td><td width='60%'><div id='sub_total'></div> </td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Diskon</td>       <td width='5px'>:</td><td> <input class='form-control input-sm bayar' type='text' id='diskon_belanja' name='diskon_belanja' value='".rupiah($tot2['diskon_belanja'])."'></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Total Bayar</td>  <td width='5px'>:</td><td> <div id='total_bayar'></div></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Tipe Bayar</td>   <td width='5px'>:</td><td> <select id='id_type_bayar' name='id_type_bayar' class='form-control input-sm bayar_combo'>";  
                                                                                                                            foreach ($type_bayar as $rows){
                                                                                                                              if ($rows['id_type_bayar']==$row['id_type_bayar']){
                                                                                                                                echo "<option value='$rows[id_type_bayar]' selected>$rows[nama_type_bayar]</option>";
                                                                                                                              }else{
                                                                                                                                echo "<option value='$rows[id_type_bayar]'>$rows[nama_type_bayar]</option>";
                                                                                                                              }
                                                                                                                            }
                                                                                                                         echo "</select></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Jumlah Bayar</td> <td width='5px'>:</td><td> <input class='form-control input-sm bayar' type='text' value='".rupiah($tot2['jumlah_bayar'])."' id='jumlah_bayar' name='jumlah_bayar'></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Uang Kembali</td> <td width='5px'>:</td><td> <div id='uang_kembali'></div></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Keterangan</td>   <td width='5px'>:</td><td> <textarea class='form-control input-sm' id='keterangan' name='keterangan'>$tot2[keterangan]</textarea></td></tr>
                    </table>
                    <center>
                      <a href='".base_url()."app/transaksi_selesai/".$this->session->id_transaksi."' ><button type='button' style='padding:5px' class='btn btn-info btn-sm'>(F1) Selesai</button></a>
                      <a href='".base_url()."app/transaksi_tunggu/".$this->session->id_transaksi."'><button type='button' style='padding:5px' class='btn btn-warning btn-sm'>(F2) Tunggu</button></a>
                      <a href='".base_url()."app/transaksi_batal/".$this->session->id_transaksi."'><button type='button' style='padding:5px' class='btn btn-danger btn-sm'>(F3) Batal</button></a>
                      <a href='".base_url()."app/transaksi_penjualan_print/".$this->session->id_transaksi."' onclick=\"return popitup('".base_url()."app/transaksi_penjualan_print/".$this->session->id_transaksi."')\"><button type='button' class='btn btn-default btn-sm'>(F4) <i class='fa fa-print'></i></button></a>
                    </center>
                  </div>
              </div>
              <div class='box-footer'>
                    
              </div>
            </div>";
?>
