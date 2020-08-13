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
  $keterangan = $row['keterangan'];
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

          echo "<h2><center>PURCHASE ORDER</center></h2>
                  <hr>
                  <table class='left'>
                    <tr><td colspan='2'><strong>$rows[nama_perusahaan]</strong></td></tr>
                    <tr><td colspan='2'>$rows[alamat_perusahaan]</td></tr>
                    <tr><td colspan='2'>$rows[city], $rows[state], $rows[country]</td></tr>

                    <tr><td colspan='2'><br></td></tr>
                    <tr><td>Telp. </td> <td> : $rows[telepon]</td><tr>
                    <tr><td>Fax  </td> <td> : $rows[fax]</td><tr>
                  </table>

                  <table class='right'>
                    <tr><td widtd='150px' scope='row'>No. P.O</td><td> : $kode_pembelian</td></tr>
                    <tr><td scope='row'>Tanggal P.O</td>              <td> : $tgl_kirim</td></tr>
                    <tr><td scope='row'>Tanggal Kirim</td>              <td> : $tgl_pembelian</td></tr>
                    <tr><td scope='row'>Reff</td>                   <td> : $referensi</td></tr>
                    <tr><td scope='row'>Type bayar</td>                 <td> : $nama_type_bayar</td></tr>
                    <tr><td scope='row'>Kontak</td>                 <td> : $nama_karyawan</td></tr>
                  </table>

                <div style='clear:both'></div>
                <hr>

                <table class='left'>
                    <tr><td colspan='2'><strong>$spp[nama_supplier]</strong></td></tr>
                    <tr><td colspan='2'>$spp[alamat_1]</td></tr>
                    <tr><td colspan='2'>$spp[city], $spp[state], $spp[country]</td></tr>
                  </table>

                  <table class='right'>
                    <tr><td widtd='150px' scope='row'>Kepada</td><td> : $spp[kepada_attention]</td></tr>
                    <tr><td scope='row'>Telp.</td>              <td> : $spp[telepon]</td></tr>
                    <tr><td scope='row'>Fax</td>              <td> : $spp[fax]</td></tr>
                  </table>

                <div style='clear:both'><br></div>

                <table id='tablemodul1' width='100%' border='1'>
                      <thead>
                        <tr bgcolor='#e3e3e3'>
                          <th width='20px'>No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Sat</th>
                          <th>Harga</th>
                          <th>Total Harga</th>
                        </tr>
                        </thead>
                      <tbody>";

                        $no = 1;
                        $penyesuaian_detail = $this->db->query("SELECT * FROM mu_pembelian_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_pembelian='".$this->uri->segment(3)."' ORDER BY a.id_pembelian_detail DESC");
                        foreach ($penyesuaian_detail->result_array() as $r){
                          echo "<tr>
                                <td>$no</td>
                                <td>$r[kode_barang]</td>
                                <td>$r[nama_barang]</td>
                                <td align=right>$r[jml_pesan]</td>
                                <td align=center>$r[kode_satuan]</td>
                                <td align=right>$r[harga_pesan]</td>
                                <td align=right>".rupiah($r['harga_pesan']*$r['jml_pesan'])."</td>
                              </tr>";
                          $no++;
                        }
                        $tot = $this->db->query("SELECT sum(jml_pesan*harga_pesan) as tharga FROM `mu_pembelian_detail` where id_pembelian='".$this->uri->segment(3)."'")->row_array();
                      echo "</tbody>
                      <tr class='alert alert-danger'>
                          <td colspan='7'>
                            <b style='float:right'>Jumlah Total : Rp ".rupiah($tot['tharga'])."</b><div style='clear:both'></div>
                            Terbilang : ".terbilang($tot['tharga'])."
                          </td>
                      </tr>
                  </table>";
?>

