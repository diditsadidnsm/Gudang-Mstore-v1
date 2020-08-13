<?php 
$tot = $this->db->query("SELECT sum((jumlah_jual*harga_jual)-diskon_jual) as subtotal FROM `mu_transaksi_detail` where id_transaksi='".$this->session->id_transaksi."' AND status='1'")->row_array();
$tot2 = $this->db->query("SELECT (biaya_kirim-diskon_persen/100*biaya_kirim-diskon_rupiah) as total, gratis_kirim, diskon_belanja, jumlah_bayar, keterangan FROM `mu_transaksi` where id_transaksi='".$this->session->id_transaksi."'")->row_array();
if ($tot2['gratis_kirim']=='1'){ $total = $tot['subtotal']-$tot2['diskon_belanja']; }else{ $total = $tot['subtotal']+$tot2['total']; }

if ($status=='total_bayar'){
  echo "<input class='form-control input-sm bayar' type='text' name='cc' id='tampil_bayar' value='".rupiah($total-$tot2['diskon_belanja'])."' disabled>";
}elseif ($status=='uang_kembali'){
  echo " <input class='form-control input-sm bayar' type='text' value='".rupiah($tot2['jumlah_bayar']-($total-$tot2['diskon_belanja']))."' name='cc' disabled>";
}elseif ($status=='sub_total'){
  echo " <input class='form-control input-sm bayar' type='text' value='".rupiah($total)."' name='cc' disabled>";
}
?>
