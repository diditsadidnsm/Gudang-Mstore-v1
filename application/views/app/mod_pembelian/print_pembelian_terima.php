<!DOCTYPE html>
<html>
<head>
  <title>Print Data</title>
  <style type="text/css">
  .left{
    float:left;
    width:50%;
  }

  .right{
    float:right;
    width:50%;
  }
  </style>
  <link rel="stylesheet" type="text/css" href="<?php echo  base_url(); ?>asset/printer.css">
</head>
<body onload="window.print()">
<?php 
  $kode_pembelian = $row['kode_pembelian'];
  $tgl_kirim = tgl_slash($row['tgl_kirim']);
  $nama_karyawan = $row['nama_karyawan'];
  $nama_supplier = $row['nama_supplier'];
  $nama_type_bayar = $row['nama_type_bayar'];
  $tgl_pembelian = tgl_slash($row['tgl_pembelian']);
  $tgl_terima = '-';
  $referensi = $row['referensi'];
  $kepada_attention = $row['kepada_attention'];
  $spp = $this->db->query("SELECT a.kepada_attention, b.*, c.name as city, d.name as state, e.name as country FROM `mu_pembelian` a 
                            JOIN mu_supplier b ON a.id_supplier=b.id_supplier 
                              JOIN mu_city c ON b.city_id=c.city_id
                                JOIN mu_state d ON b.state_id=d.state_id
                                  JOIN mu_country e ON b.country_id=e.country_id
                                    where a.id_pembelian='".$this->uri->segment(3)."'")->row_array();

          echo "<h2><center>PURCHASE RECEIVE</center></h2>
                  <hr>
                  <table class='left'>
                    <tr><td colspan='2'><strong>$rows[nama_perusahaan]</strong></td></tr>
                    <tr><td colspan='2'>$rows[alamat_perusahaan]</td></tr>
                    <tr><td colspan='2'>$rows[city], $rows[state], $rows[country]</td></tr>

                    <tr><td colspan='2'><br></td></tr>
                    <tr><td width='50px'>Telp. </td> <td> : $rows[telepon]</td><tr>
                    <tr><td>Fax  </td> <td> : $rows[fax]</td><tr>
                  </table>

                  <table class='right'>
                    <tr><td width='120px' scope='row'>No. P.O</td>    <td width='6px'>:</td><td> $kode_pembelian</td></tr>
                    <tr><td scope='row'>Tanggal P.O</td>              <td width='6px'>:</td><td> $tgl_kirim</td></tr>
                    <tr><td scope='row'>Tanggal Kirim</td>            <td width='6px'>:</td><td> $tgl_pembelian</td></tr>
                    <tr><td scope='row'>Reff</td>                     <td width='6px'>:</td><td> $referensi</td></tr>
                    <tr><td scope='row'>Type bayar</td>               <td width='6px'>:</td><td> $nama_type_bayar</td></tr>
                    <tr><td scope='row'>Kontak</td>                   <td width='6px'>:</td><td> $nama_karyawan</td></tr>
                  </table>

                <div style='clear:both'></div>
                <hr>

                <table class='left'>
                    <tr><td width='120px' scope='row'>Supplier</td> <td width='6px'>:</td><td> $spp[nama_supplier]</td></td></tr>
                    <tr><td scope='row' valign=top>Alamat</td>      <td valign=top width='6px'>:</td><td> $spp[alamat_1], $spp[city], $spp[state], $spp[country]</td></tr>
                    <tr><td scope='row'>No. Surat Jalan</td>        <td width='6px'>:</td><td> $row[no_surat_jalan]</td></tr>
                    <tr><td scope='row'>Pengirim Barang</td>        <td width='6px'>:</td><td> $row[pengirim_barang]</td></tr>
                    <tr><td scope='row'>Keterangan</td>             <td width='6px'>:</td><td> $row[ket_po]</td></tr>
                  </table>

                  <table class='right'>
                    <tr><td width='120px' scope='row'>No. Terima PO</td>  <td width='6px'>:</td><td> $row[no_pembelian_terima]</td></tr>
                    <tr><td scope='row'>Tanggal Terima</td>               <td width='6px'>:</td><td> $row[tanggal_terima]</td></tr>
                    <tr><td scope='row'>Penerima Barang</td>              <td width='6px'>:</td><td> $row[penerima_barang]</td></tr>
                  </table>

                <div style='clear:both'><br></div>

                <table id='tablemodul1' width='100%' border='1'>
                      <thead>
                        
                        <tr bgcolor='#e3e3e3'>
                          <th rowspan='2' width='20px'>No</th>
                          <th rowspan='2'>Kode Barang</th>
                          <th rowspan='2'>Nama Barang</th>
                          <th rowspan='2'>Jml</th>
                          <th rowspan='2'>Sat</th>
                          <th colspan='2'>Harga</th>
                          <th rowspan='2'>Terima</th>
                        </tr>
                        <tr>
                          <th>Satuan</th>
                          <th>Total</th>
                        </tr>
                        </thead>
                      <tbody>";

                        $no = 1;
                        $penyesuaian_detail = $this->db->query("SELECT * FROM mu_pembelian_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_pembelian='$row[id_pembelian]' ORDER BY a.id_pembelian_detail DESC");
                        foreach ($penyesuaian_detail->result_array() as $r){
                          $stok = $this->model_app->view_one('mu_barang',array('id_barang' => $r['id_barang']),'id_barang')->row_array();
                          $stok_tambah = $this->db->query("SELECT sum(jml_terima) as stok_tambah FROM `mu_pembelian_terima_detail` where id_barang='".$r['id_barang']."'")->row_array();
                          $stok_kurang = $this->db->query("SELECT sum(jml_return) as stok_kurang FROM `mu_pembelian_return_detail` where id_barang='".$r['id_barang']."'")->row_array();
                          $trm = $this->db->query("SELECT sum(a.jml_terima) as terima FROM `mu_pembelian_terima_detail` a JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima where a.id_pembelian_terima='".$this->uri->segment(3)."' AND a.id_barang='".$r['id_barang']."'")->row_array();

                          echo "<tr>
                                <td>$no</td>
                                <td>$r[kode_barang]</td>
                                <td>$r[nama_barang]</td>
                                <td align=right>$r[jml_pesan]</td>
                                <td>$r[kode_satuan]</td>
                                <td align=right>".rupiah($r['harga_pesan'])."</td>
                                <td align=right>".rupiah($trm['terima']*$r['harga_pesan'])."</td>
                                <td align=right>".rupiah($trm['terima'])."</td>
                              </tr>";
                          $no++;
                        }
                        $tot = $this->db->query("SELECT sum(jml_terima) as jml, sum(harga_pembelian*jml_terima) as total FROM `mu_pembelian_terima_detail` where id_pembelian_terima='".$this->uri->segment(3)."'")->row_array();
                      echo "</tbody>
                      <tr class='alert alert-danger'>
                          <td colspan='3'><b style='float:right'>Jumlah Total : </b></td>
                          <td colspan='1'></td>
                          <td></td>
                          <td colspan='2'><b style='float:right'>Rp ".rupiah($tot['total'])."</b></td>
                          <td align=right>$tot[jml]</td>
                      </tr>
                      <tr class='alert alert-danger'>
                          <td colspan='8'>Terbilang : ".terbilang($tot['total'])."</td>
                      </tr>
                  </table>";
?>

