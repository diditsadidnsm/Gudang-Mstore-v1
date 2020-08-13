<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Transaksi Return Penjualan</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/transaksi_return_penjualan',$attributes); 

              echo "<div class='col-md-9'><input type='text' class='form-control' name='a' value='".$this->input->post('a')."' placeholder='Ketik atau Scan No Faktur Penjualan...'>
                                          <input class='hidden btn btn-success btn-sm' type='submit' name='submit'>
                      </form>";

                  echo form_open_multipart('app/update_return_penjualan',$attributes);     
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
                            <th style='width:50px'>Return</th>
                          </tr>
                          </thead>
                        <tbody>";
                          $no = 1;
                          if ($this->session->id_transaksi_return!=''){
                            $transaksi_detail = $this->db->query("SELECT a.*, b.nama_barang FROM mu_transaksi_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_transaksi='".$this->session->id_transaksi_return."' ORDER BY a.id_transaksi_detail DESC");
                            foreach ($transaksi_detail->result_array() as $r){
                              $row = $this->db->query("SELECT * FROM mu_transaksi_return_detail where id_transaksi_return='".$this->session->id_return."' AND id_transaksi_detail='$r[id_transaksi_detail]'")->row_array();
                              if ($row['jumlah_return']==''){ $return_jml = '0'; }else{ $return_jml = $row['jumlah_return']; }
                              echo "<tr>
                                    <input type='hidden' name='id[$no]' value='$r[id_transaksi_detail]'>
                                    <td>$no</td>
                                    <td>$r[nama_barang]</td>
                                    <td>$r[jumlah_jual]</td>
                                    <td>$r[kode_satuan]</td>
                                    <td>$r[harga_jual]</td>
                                    <td>$r[diskon_jual]</td>
                                    <td>".(($r['jumlah_jual']*$r['jumlah_satuan']*$r['harga_jual'])-$r['diskon_jual'])."</td>
                                    <td align=center><input type='number' name='jml[$no]' value='$return_jml' style='width:100%; text-align:center'></td>
                                  </tr>";
                              $no++;
                            }
                          }
                        echo "</tbody>
                    </table>
                    <input class='hidden btn btn-success btn-sm' type='submit' name='submit'>
                    </form>
                </div>";
          $tot2 = $this->db->query("SELECT bayar_return, ket_return FROM `mu_transaksi_return` where id_transaksi_return='".$this->session->id_return."'")->row_array();
          echo "<div class='col-md-3'>
                    <table class='table table-bordered table-striped table-condensed'>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Total Bayar</td>  <td width='5px'>:</td><td width='60%'> <div id='total_bayar_return'></div></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Tipe Bayar</td>   <td width='5px'>:</td><td> <select id='id_type_bayar' name='id_type_bayar' class='form-control input-sm bayar_combo'>";  
                                                                                                                            foreach ($type_bayar as $rows){
                                                                                                                              if ($rows['id_type_bayar']==$row['id_type_bayar']){
                                                                                                                                echo "<option value='$rows[id_type_bayar]' selected>$rows[nama_type_bayar]</option>";
                                                                                                                              }else{
                                                                                                                                echo "<option value='$rows[id_type_bayar]'>$rows[nama_type_bayar]</option>";
                                                                                                                              }
                                                                                                                            }
                                                                                                                         echo "</select></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Jumlah Bayar</td> <td width='5px'>:</td><td> <input class='form-control input-sm bayar' type='number' value='$tot2[bayar_return]' id='bayar_return' name='jumlah_bayar'></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Uang Kembali</td> <td width='5px'>:</td><td> <div id='uang_kembali_return'></div></td></tr>
                      <tr class='alert alert-default'><td style='font-weight:bold' align=right>Keterangan</td>   <td width='5px'>:</td><td> <textarea class='form-control input-sm' id='ket_return' name='keterangan'>$tot2[ket_return]</textarea></td></tr>
                    </table>
                    <center>
                      <a href='".base_url()."app/transaksi_return_selesai/".$this->session->id_return."'><button type='button' class='btn btn-info btn-sm'>Selesai</button></a>
                      <a href='".base_url()."app/transaksi_return_batal/".$this->session->id_return."'><button type='button' class='btn btn-danger btn-sm'>Batal</button></a>
                    </center>
                  </div>
              </div>
              <div class='box-footer'>
                    
              </div>
            </div>";
?>
