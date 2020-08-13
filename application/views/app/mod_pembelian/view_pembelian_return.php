<style type="text/css">
  .anu tbody td {
    padding:3px !important;
    border:1px solid #e3e3e3;

  .rapat tbody tr td{
    padding:0px !important;
  }
  }
</style>
<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Return Pembelian (PO)</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/return_pembelian',$attributes); 
                $tgltrm = $this->db->query("SELECT GROUP_CONCAT(DATE_FORMAT(tanggal_terima, '%d/%m/%Y') SEPARATOR ', ') as tanggal  FROM `mu_pembelian_terima` where id_pembelian='".$row['id_pembelian']."'")->row_array();
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered rapat'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_pembelian_terima]'>
                    <tr><th width='150px' scope='row'>No. Pembelian</th><td>: $row[kode_pembelian]</td></tr>
                    <tr><th scope='row'>Tanggal Kirim</th>              <td>: $row[tgl_kirim]</td></tr>
                    <tr><th scope='row'>Oleh Karyawan</th>              <td>: $row[nama_karyawan]</td></tr>
                    <tr><th scope='row'>Supplier</th>                   <td>: $row[nama_supplier]</td></tr>
                    <tr><th scope='row'>Type bayar</th>                 <td>: $row[nama_type_bayar]</td></tr>
                    <tr><th scope='row'>Keterangan</th>                 <td>: $row[ket_pembelian]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Tanggal Pembelian</th> <td>: $row[tgl_pembelian]</td></tr>
                    <tr><th width='150px' scope='row'>Tanggal Terima</th>    <td>: $tgltrm[tanggal]</td></tr>
                    <tr><th width='150px' scope='row'>Referensi</th>         <td>: $row[referensi]</td></tr>
                    <tr><th width='150px' scope='row'>Kepada / Attention</th><td>: $row[kepada_attention]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div style='clear:both'><hr></div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>No Terima PO</th> <td>: $row[no_pembelian_terima]</td></tr>
                    <tr><th scope='row'>No Surat Jalan</th>             <td>: $row[no_surat_jalan]</td></tr>
                    <tr><th scope='row'>Pengirim Barang</th>            <td>: $row[pengirim_barang]</td></tr>
                    <tr><th scope='row'>Keterangan</th>                 <td>: $row[ket_po]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Tanggal Terima</th> <td>: $row[tanggal_terima]</td></tr>
                    <tr><th scope='row'>Penerima Barang</th>              <td>: $row[penerima_barang]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div style='clear:both'><hr></div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>No Return</th>    <td><input style='width:40%; display:inline-block' type='text' class='form-control' name='a' required></td></tr>
                    <tr><th width='150px' scope='row'>Tanggal Kirim</th>    <td><input type='text' id='datepicker' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Type bayar</th>    <td><select name='c' class='form-control'>";
                                                                foreach ($type_bayar as $rows){
                                                                    echo "<option value='$rows[id_type_bayar]'>$rows[nama_type_bayar]</option>";
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='d' style='height:60px'></textarea></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Tanggal Return</th>    <td><input type='text' id='datepickerr' class='form-control' name='e' required></td></tr>
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
                          <th width='110px'>Terima</th>
                          <th width='100px'>Return</th>
                          <th width='100px'>Hrg. Return</th>
                          <th width='115px'>Stok Sekarang</th>
                        </tr>
                        </thead>
                      <tbody>";

                        $no = 1;
                        $penyesuaian_detail = $this->db->query("SELECT * FROM mu_pembelian_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_pembelian='$row[id_pembelian]' ORDER BY a.id_pembelian_detail DESC");
                        foreach ($penyesuaian_detail->result_array() as $r){
                          $stok = $this->model_app->stok($r['id_barang'])->row_array();
                          $trm = $this->db->query("SELECT sum(a.jml_terima) as terima FROM `mu_pembelian_terima_detail` a JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima where a.id_pembelian_terima='".$this->uri->segment(3)."' AND a.id_barang='".$r['id_barang']."'")->row_array();
                          echo "<tr>
                                <input type='hidden' name='f[$no]' value='$r[id_barang]' style='width:100%; padding-left:5px;'>
                                <td>$no</td>
                                <td>$r[nama_barang]</td>
                                <td>$r[jml_pesan]</td>
                                <td>$r[kode_satuan]</td>
                                <td>".rupiah($r['harga_pesan'])."</td>
                                <td>".rupiah($trm['terima'])."</td>
                                <td><input type='number' name='g[$no]' value='0' style='width:100%; padding-left:5px;'></td>
                                <td><input type='number' name='h[$no]' value='$r[harga_pesan]' style='width:100%; padding-left:5px;'></td>
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
