<?php
  echo "<option value=''>- Pilih -</option>";
  foreach ($kota as $row){
      echo "<option value='$row[city_id]'>$row[name]</option>";
  }