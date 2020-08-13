<?php 
$totr1 = $this->db->query("SELECT sum((a.jumlah_return*b.harga_jual)-b.diskon_jual) as total FROM `mu_transaksi_return_detail` a JOIN mu_transaksi_detail b ON a.id_transaksi_detail=b.id_transaksi_detail where a.id_transaksi_return='".$this->session->id_return."'")->row_array();
$totr2 = $this->db->query("SELECT (bayar_return-$totr1[total]) as kembali FROM `mu_transaksi_return` where id_transaksi_return='".$this->session->id_return."'")->row_array();

if ($status=='total_bayar_return'){
  echo " <input class='form-control input-sm bayar' type='number' value='$totr1[total]' name='cc' disabled>";
}elseif ($status=='uang_kembali_return'){
  echo " <input class='form-control input-sm bayar' type='number' value='$totr2[kembali]' name='cc' disabled>";
}
?>
