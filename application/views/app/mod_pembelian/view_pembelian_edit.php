<style type="text/css">
  .anu tbody td {
    padding:3px !important;
    border:1px solid #e3e3e3;
  }
</style>
<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/edit_pembelian',$attributes); 
                $kode_pembelian = $row['kode_pembelian'];
                $tgl_kirim = tgl_slash($row['tgl_kirim']);
                $id_karyawan = $row['id_karyawan'];
                $keterangan = $row['keterangan'];
                $id_supplier = $row['id_supplier'];
                $id_type_bayar = $row['id_type_bayar'];
                $tgl_pembelian = tgl_slash($row['tgl_pembelian']);
                $tgl_terima = '-';
                $referensi = $row['referensi'];
                $kepada_attention = $row['kepada_attention'];
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_pembelian]'>
                    <tr><th width='150px' scope='row'>No. Pembelian</th>    <td><input type='text' class='form-control' name='a' value='$kode_pembelian' required></td></tr>
                    <tr><th scope='row'>Tanggal Kirim</th>    <td><input type='text' id='datepicker' class='form-control' name='b' value='$tgl_kirim' required></td></tr>
                    <tr><th scope='row'>Oleh Karyawan</th>    <td><select name='c' class='combobox form-control'>
                                                                  <option value='' selected>Cari Karyawan</option>";
                                                                foreach ($karyawan as $rows){
                                                                  if ($id_karyawan==$rows['id_karyawan']){
                                                                    echo "<option value='$rows[id_karyawan]' selected>$rows[nama_karyawan]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[id_karyawan]'>$rows[nama_karyawan]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Supplier</th>    <td><select name='d' class='combobox form-control'>
                                                              <option value='' selected>Cari Supplier</option>";
                                                                foreach ($supplier as $rows){
                                                                  if ($id_supplier==$rows['id_supplier']){
                                                                    echo "<option value='$rows[id_supplier]' selected>$rows[nama_supplier]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[id_supplier]'>$rows[nama_supplier]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Type bayar</th>    <td><select name='e' class='form-control'>";
                                                                foreach ($type_bayar as $rows){
                                                                  if ($id_type_bayar==$rows['id_type_bayar']){
                                                                    echo "<option value='$rows[id_type_bayar]' selected>$rows[nama_type_bayar]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[id_type_bayar]'>$rows[nama_type_bayar]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='f' style='height:60px'>$keterangan</textarea></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Tanggal Pembelian</th>    <td><input type='text' id='datepickerr' class='form-control' name='g' value='$tgl_pembelian' required></td></tr>
                    <tr><th width='150px' scope='row'>Tanggal Terima</th>    <td><input type='text' class='form-control' name='h' value='$tgl_terima' readonly='on'></td></tr>
                    <tr><th width='150px' scope='row'>Referensi</th>    <td><input type='text' class='form-control' name='i' value='$referensi' required></td></tr>
                    <tr><th width='150px' scope='row'>Kepada / Attention</th>    <td><input type='text' class='form-control' name='j' value='$kepada_attention' required></td></tr>
                  </tbody>
                  </table>
                </div>

                <table class='table table-bordered table-striped'>
                      <thead>
                        <tr bgcolor='#e3e3e3'>
                          <th width='20px'>No</th>
                          <th>Nama Barang</th>
                          <th width='80px'>Jml</th>
                          <th width='80px'>Sat</th>
                          <th width='150px'>Harga Satuan</th>
                          <th width='100px'>Terima</th>
                          <th width='100px'>Kurang</th>
                          <th style='width:50px'>Action</th>
                        </tr>

                        <tr>
                          <td></td>
                          <td><select name='aa' class='combobox form-control' onchange=\"changeValue(this.value)\" autofocus>
                                                                <option value=''> Cari Barang </option>";
                                                                $jsArray = "var prdName = new Array();\n";    
                                                                foreach ($barang as $rows){
                                                                    echo "<option value='$rows[id_barang]'>$rows[kode_barang] - $rows[nama_barang]</option>";
                                                                    $jsArray .= "prdName['" . $rows['id_barang'] . "'] = {name:'" . addslashes($rows['harga_beli']) . "',desc:'".addslashes($rows['kode_satuan'])."'};\n";
                                                                }
                                                             echo "</select></td>
                          <td><input class='form-control' type='number' name='bb'></td>
                          <td><input class='form-control' type='text' name='cc' id='satuan' readonly='on'> </td>
                          <td><input class='form-control' type='number' name='dd' id='harga'> </td>
                          <td><input class='form-control' type='number' name='ee' readonly='on'> </td>
                          <td><input class='form-control' type='text' name='ff' readonly='on'> </td>
                          <td><button type='submit' name='submit' class='btn btn-success'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button></td>
                        </tr>
                        </thead>
                      <tbody>";

                        $no = 1;
                        $penyesuaian_detail = $this->db->query("SELECT * FROM mu_pembelian_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_pembelian='".$this->uri->segment(3)."' ORDER BY a.id_pembelian_detail DESC");
                        foreach ($penyesuaian_detail->result_array() as $r){
                          $terima = $this->db->query("SELECT sum(a.jml_terima) as jml_terima, b.id_pembelian, a.* FROM mu_pembelian_terima_detail a JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima where a.id_barang='$r[id_barang]' AND b.id_pembelian='".$this->uri->segment(3)."'")->row_array();
                          echo "<tr>
                                <td>$no</td>
                                <td>$r[nama_barang]</td>
                                <td>$r[jml_pesan]</td>
                                <td>$r[kode_satuan]</td>
                                <td>".rupiah($r['harga_pesan'])."</td>
                                <td>".rupiah($terima['jml_terima'])."</td>
                                <td>".($r['jml_pesan']-$terima['jml_terima'])."</td>
                                <td align=center><a href='".base_url()."app/delete_pembelian_detail/$r[id_pembelian_detail]/".$this->uri->segment(3)."' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\" class='text-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
                              </tr>";
                          $no++;
                        }
                        $tot = $this->db->query("SELECT sum(jml_pesan*harga_pesan) as tharga, sum(jml_pesan) as tjumlah FROM `mu_pembelian_detail` where id_pembelian='".$this->uri->segment(3)."'")->row_array();
                        $ter = $this->db->query("SELECT sum(jml_terima) as tterima FROM mu_pembelian_terima_detail a JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima where b.id_pembelian='".$this->uri->segment(3)."'")->row_array();
                      echo "</tbody>
                      <tr class='alert alert-danger'>
                          <td colspan='2' align=right>Jumlah Total</td>
                          <td>".rupiah($tot['tjumlah'])."</td>
                          <td></td>
                          <td>".rupiah($tot['tharga'])."</td>
                          <td>".rupiah($ter['tterima'])."</td>
                          <td>".rupiah($tot['tjumlah']-$ter['tterima'])."</td>
                          
                      </tr>
                  </table>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit2' class='btn btn-info'>Proses dan Selesai</button>
                  </div>
            </div></form>";
?>

<script type="text/javascript">    
<?php echo $jsArray; ?>  
  function changeValue(id){  
    document.getElementById('harga').value = prdName[id].name;  
    document.getElementById('satuan').value = prdName[id].desc;  
  };  
</script> 
