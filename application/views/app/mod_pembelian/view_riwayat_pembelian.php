<?php
  echo "<table id='example1' class='table table-bordered table-striped table-condensed'>
    <thead>
      <tr bgcolor='#e3e3e3'>
        <th style='width:20px'>No</th>
        <th>No. PO</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>satuan</th>
        <th>Harga</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>";

    $no = 1;
    foreach ($record->result_array() as $row){
    echo "<tr><td>$no</td>
              <td>$row[kode_pembelian]</td>
              <td>".tgl_slash($row['tgl_pembelian'])."</td>
              <td>$row[jml_terima]</td>
              <td>$row[kode_satuan]</td>
              <td>$row[harga_pembelian]</td>
              <td>".rupiah($row['total'])."</td>
          </tr>";
      $no++;
    }
  ?>
  </tbody>
</table>