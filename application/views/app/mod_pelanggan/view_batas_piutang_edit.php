<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Batas Piutang</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/bataspiutang_pelanggan',$attributes); 
              $pelanggan = $this->db->query("SELECT * FROM mu_kategori_pelanggan where id_kategori_pelanggan='$row[id_kategori_pelanggan]'")->row_array();
              $kategori = $this->db->query("SELECT * FROM mu_type_pelanggan where id_type_pelanggan='$row[id_type_pelanggan]'")->row_array();
              
              $negara = $this->db->query("SELECT * FROM mu_country where country_id='$row[country_id]'")->row_array();
              $provinsi = $this->db->query("SELECT * FROM mu_state where state_id='$row[state_id]'")->row_array();
              $kota = $this->db->query("SELECT * FROM mu_city where city_id='$row[city_id]'")->row_array();
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_pelanggan]'>
                    <tr><th width='150px' scope='row'>Kategori Pelanggan</th>    <td>$pelanggan[nama_kategori_pelanggan]</td></tr>
                    <tr><th scope='row'>Type Pelanggan</th>     <td>$kategori[type_pelanggan]</td></tr>
                    <tr><th scope='row'>Nama Pelanggan</th>     <td>$row[nama_pelanggan]</td></tr>
                    <tr><th scope='row'>Kontak Person</th>      <td>$row[kontak_pelanggan]</td></tr>
                    <tr><th scope='row'>Alamat 1</th>           <td>$row[alamat_pelanggan_1]</td></tr>
                    <tr><th scope='row'>Negara</th>             <td>$negara[name]</td></tr>
                    <tr><th scope='row'>Propinsi</th>           <td>$provinsi[name]</td></tr>
                    <tr><th scope='row'>Kota</th>               <td>$kota[name]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Telepon</th>    <td>$row[telpon_pelanggan]</td></tr>
                    <tr><th scope='row'>Hp</th>                 <td>$row[hp_pelanggan]</td></tr>
                    <tr><th scope='row'>Email</th>              <td>$row[email_pelanggan]</td></tr>
                    <tr><th scope='row'>Website</th>            <td>$row[website_pelanggan]</td></tr>
                    <tr><th scope='row'>Kode Pos</th>           <td>$row[kode_pos_pelanggan]</td></tr>
                    <tr><th scope='row'>Fax</th>                <td>$row[fax_pelanggan]</td></tr>
                    <tr><th scope='row'>Chat</th>               <td>$row[chat_pelanggan]</td></tr>
                    <tr><th scope='row'>Keterangan</th>         <td>$row[keterangan]</td></tr>

                  </tbody>
                  </table>
                </div>

                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                    <tbody>
                      <input type='hidden' name='a' value='".$this->uri->segment(3)."'>
                      <tr><th width='150px' scope='row'>Batas Piutang</th>  <td><input type='number' class='form-control' name='b'></td></tr>
                      <tr><th scope='row'>Batas Frekuensi</th>              <td><input type='number' class='form-control' name='c'></td></tr>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                    <a href='".base_url()."app/bataspiutang'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";