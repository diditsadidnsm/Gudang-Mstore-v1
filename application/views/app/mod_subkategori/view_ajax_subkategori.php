<?php
  echo "<option value=''>- Pilih -</option>";
  foreach ($sub_kategori as $row){
      echo "<option value='$row[id_subkategori]'>$row[nama_subkategori]</option>";
  }