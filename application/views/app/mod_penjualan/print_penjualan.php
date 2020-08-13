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

  .td {
    border-bottom: 1px dotted #000;
  }
  </style>
  <link rel="stylesheet" type="text/css" href="<?php echo  base_url(); ?>asset/printer.css">
</head>
<body onload="window.print()">
<?php 
          echo "<table border='0' class='left'>
                    <tr><td rowspan='4' width='71px'><img style='width:65px; margin-right:4px; border:1px solid #e3e3e3' src='".base_url()."asset/images/$rows[logo]'></td></tr>
                    <tr><td colspan='2'><strong>$rows[nama_perusahaan]</strong></td></tr>
                    <tr><td colspan='2'>$rows[alamat_perusahaan]</td></tr>
                    <tr><td colspan='2'>Telp. $rows[telepon]</td></tr>
                  </table>

                <div style='clear:both'><br></div>
                  <table class='left'>
                    <tr><td width='90px' scope='row'>Nopel</td><td> : $row[id_pelanggan]</td></tr>
                    <tr><td scope='row'>Pelanggan</td>              <td> : $row[nama_pelanggan]</td></tr>
                  </table>
                <div style='clear:both'><br></div>
                <table width='100%' border='0'>
                      <tbody>";
                        $no = 1;
                        $transaksi_detail = $this->db->query("SELECT a.*, b.nama_barang FROM mu_transaksi_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_transaksi='".$this->uri->segment(3)."' ORDER BY a.id_transaksi_detail DESC");
                        foreach ($transaksi_detail->result_array() as $r){
                            echo "<tr>
                                  <td class='td'>$no</td>
                                  <td class='td'>$r[nama_barang] "; if ($r['status']=='0'){ echo "<small class='free'>(Gratis)</small>"; } echo "</td>
                                  <td class='td' class='td' align=right>$r[jumlah_jual]</td>
                                  <td class='td'>$r[kode_satuan]</td>
                                  <td class='td' class='td' align=right>".rupiah($r['harga_jual'])."</td>";
                                  if ($r['status']=='1'){
                                    echo "<td class='td' align=right>".rupiah(($r['jumlah_jual']*$r['jumlah_satuan']*$r['harga_jual'])-$r['diskon_jual'])."</td>";
                                  }else{
                                    echo "<td class='td' align=right>0</td>";
                                  }
                                  
                                echo "</tr>";
                            $no++;
                          }
                    $tot = $this->db->query("SELECT sum((jumlah_jual*harga_jual)-diskon_jual) as subtotal FROM `mu_transaksi_detail` where id_transaksi='".$this->uri->segment(3)."' AND status='1'")->row_array();
                    $tot2 = $this->db->query("SELECT (biaya_kirim-diskon_persen/100*biaya_kirim-diskon_rupiah) as total, gratis_kirim, diskon_belanja, jumlah_bayar, keterangan FROM `mu_transaksi` where id_transaksi='".$this->uri->segment(3)."'")->row_array();
                    if ($tot2['gratis_kirim']=='1'){
                      $total = $tot['subtotal']-$tot2['diskon_belanja'];
                    }else{
                      $total = $tot['subtotal']+$tot2['total'];
                    }
                    $ppn = $this->db->query("SELECT * FROM mu_conf_penjualan ORDER BY id_conf_penjualan DESC LIMIT 1")->row_array();
                    $item = $this->db->query("SELECT * FROM mu_transaksi_detail where id_transaksi='".$this->uri->segment(3)."'")->num_rows();
                    $hitung_ppn = $this->db->query("SELECT sum(b.ppn/100*(((a.jumlah_jual*a.jumlah_satuan)*a.harga_jual)-a.diskon_jual)) as ppn FROM `mu_transaksi_detail` a JOIN mu_barang b On a.id_barang=b.id_barang where a.id_transaksi='".$this->uri->segment(3)."'")->row_array();
                    if ($ppn['terapkan_pajak']=='visible'){ $pajak = $hitung_ppn['ppn']; }else{ $pajak = 0; }  
                      echo "</tbody>
                      <tr><td colspan='5' align=right>Sub Total : </td>   <td class='td' align=right>".rupiah($total)."</td></tr>
                      <tr><td colspan='5' align=right>Diskon : </td>      <td class='td' align=right>".rupiah($row['diskon_belanja'])."</td></tr>
                      <tr><td colspan='5' align=right>Total : </td>       <td class='td' align=right>".rupiah($total-$row['diskon_belanja'])."</td></tr>
                      <tr><td colspan='5' align=right>Bayar Tunai : </td> <td class='td' align=right>".rupiah($row['jumlah_bayar'])."</td></tr>
                      <tr><td colspan='5' align=right>Kembali : </td>     <td class='td' align=right>".rupiah($row['jumlah_bayar']-($total-$row['diskon_belanja']))."</td></tr>
                      
                      <tr class='alert alert-danger'>
                          <td colspan='7'><i>Terbilang : ".terbilang($total)."</i> <br>
                                              $item Items, $row[waktu_proses]<br>
                                              +PPN : DPP = ".rupiah($total-$row['diskon_belanja']-$pajak).", PPN = $pajak<br>
                                              Kasir : $row[nama_karyawan]</td>
                      </tr>
                  </table>

                  <center>Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.<br>
                  <img style='width:150px' src='".base_url()."app/set_barcode/".$row['kode_transaksi']."'></center>";
?>

