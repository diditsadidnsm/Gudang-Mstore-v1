<style type="text/css">
  .anu tbody td {
    padding:3px !important;
    border:1px solid #e3e3e3;
  }
</style>
<?php 
$kode = $this->db->query("SELECT id_pembelian_terima FROM mu_pembelian_terima ORDER BY id_pembelian_terima DESC LIMIT 1")->row();
$kode_terima = "TR-".sprintf("%06s", $kode->id_pembelian_terima+1);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Terima Pembelian (PO)</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/terima_pembelian',$attributes); 
                $kode_pembelian = $row['kode_pembelian'];
                $tgl_kirim = tgl_slash($row['tgl_kirim']);
                $nama_karyawan = $row['nama_karyawan'];
                $keterangan = $row['keterangan'];
                $nama_supplier = $row['nama_supplier'];
                $nama_type_bayar = $row['nama_type_bayar'];
                $tgl_pembelian = tgl_slash($row['tgl_pembelian']);
                $tgl_terima = '-';
                $referensi = $row['referensi'];
                $kepada_attention = $row['kepada_attention'];

                $tgltrm = $this->db->query("SELECT GROUP_CONCAT(DATE_FORMAT(tanggal_terima, '%d/%m/%Y') SEPARATOR ', ') as tanggal  FROM `mu_pembelian_terima` where id_pembelian='".$this->uri->segment(3)."'")->row_array();
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_pembelian]'>
                    <tr><th width='150px' scope='row'>No. Pembelian</th><td>: $kode_pembelian</td></tr>
                    <tr><th scope='row'>Tanggal Kirim</th>              <td>: $tgl_kirim</td></tr>
                    <tr><th scope='row'>Oleh Karyawan</th>              <td>: $nama_karyawan</td></tr>
                    <tr><th scope='row'>Supplier</th>                   <td>: $nama_supplier</td></tr>
                    <tr><th scope='row'>Type bayar</th>                 <td>: $nama_type_bayar</td></tr>
                    <tr><th scope='row'>Keterangan</th>                 <td>: $keterangan</td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Tanggal Pembelian</th> <td>: $tgl_pembelian</td></tr>
                    <tr><th width='150px' scope='row'>Tanggal Terima</th>    <td>: $tgltrm[tanggal]</td></tr>
                    <tr><th width='150px' scope='row'>Referensi</th>         <td>: $referensi</td></tr>
                    <tr><th width='150px' scope='row'>Kepada / Attention</th><td>: $kepada_attention</td></tr>
                  </tbody>
                  </table>
                </div>

                <div style='clear:both'><hr></div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>No Terima PO</th>    <td><input style='width:40%; display:inline-block' type='text' class='form-control' id='code' name='a' value='$kode_terima'>
                                                                                <label generated='true' class='error' id='message'></label></td></tr>
                    <tr><th scope='row'>No Surat Jalan</th>    <td><input type='text' class='form-control' name='b'></td></tr>
                    <tr><th scope='row'>Pengirim Barang</th>    <td><input type='text' class='form-control' name='c'></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='d' style='height:60px'></textarea></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Tanggal Terima</th>    <td><input type='text' id='datepicker' class='form-control' name='e' required></td></tr>
                    <tr><th scope='row'>Penerima Barang</th>    <td><select name='f' class='combobox form-control'>
                                                                  <option value='' selected>Cari Karyawan</option>";
                                                                foreach ($karyawan as $rows){
                                                                    echo "<option value='$rows[id_karyawan]'>$rows[nama_karyawan]</option>";
                                                                }
                                                             echo "</select></td></tr>
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
                          <th width='110px'>Hrg Satuan</th>
                          <th width='110px'>Sudah Terima</th>
                          <th width='100px'><input type='checkbox' name='terima' id='checker'/> Terima </th>
                          <th width='100px'>Kurang</th>
                          <th width='115px'>Stok Sekarang</th>
                        </tr>
                        </thead>
                      <tbody>";

                        $no = 1;
                        $penyesuaian_detail = $this->db->query("SELECT * FROM mu_pembelian_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_pembelian='".$this->uri->segment(3)."' ORDER BY a.id_pembelian_detail DESC");
                        foreach ($penyesuaian_detail->result_array() as $r){
                          ?>
                            <script>
                            $(document).ready(function(){
                                    $("input#checker").bind("click",function(o){
                                        if($("input#checker:checked").length){
                                            $("#terima<?php echo "$no"; ?>").val($("#kurang<?php echo "$no"; ?>").val());
                                        }else{
                                            $("#terima<?php echo "$no"; ?>").val("0");
                                            $("#kurang<?php echo "$no"; ?>").val("0");
                                        }
                                    });
                                }
                            );
                            </script>
                          <?php
                          $stok = $this->model_app->stok($r['id_barang'])->row_array();
                          $trm = $this->db->query("SELECT sum(a.jml_terima) as terima FROM `mu_pembelian_terima_detail` a JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima where b.id_pembelian='".$this->uri->segment(3)."' AND a.id_barang='".$r['id_barang']."'")->row_array();
                          $kurang = $r['jml_pesan']-$trm['terima'];
                          if ($r['jml_pesan']==$trm['terima']){ $read = "disabled"; $color = "red"; }else{ $read = ""; $color = "#000"; }
                          echo "<tr>
                                <input type='hidden' value='$r[id_barang]' name='g[$no]'>
                                <input type='hidden' value='$kurang' id='kurang$no'>
                                <td>$no</td>
                                <td>$r[nama_barang]</td>
                                <td>$r[jml_pesan]</td>
                                <td>$r[kode_satuan]</td>
                                <td><input type='text' name='h[$no]' value='$r[harga_pesan]' style='width:100%; padding-left:5px; color:$color' $read></td>
                                <td>".rupiah($trm['terima'])."</td>
                                <td><input type='text' name='i[$no]' id='terima$no' value='0' style='width:100%; padding-left:5px; color:$color' $read></td>
                                <td>".($r['jml_pesan']-$trm['terima'])."</td>
                                <td>".rupiah($stok['stok'])."</td>
                              </tr>";
                          $no++;
                        }
                      echo "</tbody>
                  </table>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Proses dan Selesai</button>
                  </div>
            </div></form>";
?>
