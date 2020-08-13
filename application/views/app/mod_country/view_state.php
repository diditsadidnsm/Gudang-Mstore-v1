<?php
  echo "<option value=''>- Pilih -</option>";
  foreach ($provinsi as $row){
      echo "<option value='$row[state_id]'>$row[name]</option>";
  }