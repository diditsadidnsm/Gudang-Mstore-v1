<?php 
class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }
    
    public function view_all_desc($table,$order){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_all_asc($table,$order){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,"ASC");
        return $this->db->get()->result_array();
    }

    public function view_where_desc($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"DESC");
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_where_asc($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"DESC");
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_one($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"ASC");
        return $this->db->get($table);
    }

    public function view_address($table,$order){
        $this->db->select('*, mu_city.name as city, mu_state.name as state, mu_country.name as country');
        $this->db->from($table);
        $this->db->join('mu_city', $table.'.city_id=mu_city.city_id');
        $this->db->join('mu_state', 'mu_city.state_id=mu_state.state_id');
        $this->db->join('mu_country', 'mu_state.country_id=mu_country.country_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_one_address($table,$data,$order){
        $this->db->select('*, mu_city.name as city, mu_state.name as state, mu_country.name as country');
        $this->db->from($table);
        $this->db->join('mu_city', $table.'.city_id=mu_city.city_id');
        $this->db->join('mu_state', 'mu_city.state_id=mu_state.state_id');
        $this->db->join('mu_country', 'mu_state.country_id=mu_country.country_id');
        $this->db->where($data);
        $this->db->order_by($order,"DESC");
        return $this->db->get();
    }

    public function view_join_provinsi($order){
        $this->db->select('a.state_id, a.name as state, b.name as country');
        $this->db->from('mu_state a');
        $this->db->join('mu_country b', 'a.country_id=b.country_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_join_kota($order){
        $this->db->select('a.city_id, a.name as city, b.name as state, c.name as country');
        $this->db->from('mu_city a');
        $this->db->join('mu_state b', 'a.state_id=b.state_id');
        $this->db->join('mu_country c', 'b.country_id=c.country_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function edit_kota($data){
        $this->db->select('a.city_id, b.state_id, c.country_id, a.name as city, b.name as state, c.name as country');
        $this->db->from('mu_city a');
        $this->db->join('mu_state b', 'a.state_id=b.state_id');
        $this->db->join('mu_country c', 'b.country_id=c.country_id');
        $this->db->where($data);
        return $this->db->get();
    }

    public function view_join_satu($table1,$table2,$field){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        return $this->db->get();
    }

    public function view_join_dua($table1,$table2,$table3,$field,$field1){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1);
        return $this->db->get();
    }

    public function view_join($table1,$table2,$field,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_join_three($table1,$table2,$table3,$field,$field1,$where,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field, 'left');
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1, 'left');
        $this->db->where($where);
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get();
    }

    public function stok($id){
        return $this->db->query("SELECT (sum(z.jml)-sum(z.kurang)) as stok FROM 
                                    (SELECT sum(a.jml_terima) as jml, null as kurang FROM mu_pembelian_terima_detail a JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima where a.id_barang='$id' 
                                    UNION
                                    SELECT null as jml, sum(a.jml_return) as kurang FROM mu_pembelian_return_detail a JOIN mu_pembelian_return b ON a.id_pembelian_return=b.id_pembelian_return where a.id_barang='$id'
                                    UNION 
                                    SELECT sum(tambah) as jml, sum(kurang) as kurang FROM mu_penyesuaian_detail where id_barang='$id'
                                    UNION 
                                    SELECT null as jml, sum(b.jumlah_jual*b.jumlah_satuan) as kurang FROM `mu_transaksi` a JOIN mu_transaksi_detail b ON a.id_transaksi=b.id_transaksi where b.id_barang='$id'
                                    UNION
                                    SELECT sum(a.jumlah_return) as jml, null as kurang FROM `mu_transaksi_return_detail` a JOIN mu_transaksi_detail b ON a.id_transaksi_detail=b.id_transaksi_detail JOIN mu_transaksi_return c ON a.id_transaksi_return=c.id_transaksi_return where c.status='selesai' AND b.id_barang='$id') as z");
    }

    public function view_barang(){
        return $this->db->query("SELECT * FROM mu_barang a JOIN mu_kategori b ON a.id_kategori=b.id_kategori");
    }

    public function view_barang_where($status){
        return $this->db->query("SELECT * FROM mu_barang a JOIN mu_kategori b ON a.id_kategori=b.id_kategori where a.status_jual='$status'");
    }

    public function view_promosi(){
        return $this->db->query("SELECT a.*, b.ecer, b.grosir1, b.grosir2, b.grosir3, d.nama_kategori, e.nama_subkategori, f.nama_barang  FROM `mu_promosi` a 
                                    JOIN mu_promosi_detail b ON a.id_promosi=b.id_promosi 
                                        JOIN mu_kategori_pelanggan c ON b.id_kategori_pelanggan=c.id_kategori_pelanggan 
                                        LEFT JOIN mu_kategori d ON a.id_kategori=d.id_kategori 
                                        LEFT JOIN mu_subkategori e ON a.id_subkategori=e.id_subkategori 
                                        LEFT JOIN mu_barang f ON a.beli_barang=f.id_barang
                                        where c.permanen='y'");
    }

    public function view_pembelian(){
        return $this->db->query("SELECT a.*, b.nama_karyawan, c.nama_supplier, d.nama_type_bayar, sum(jml_pesan*harga_pesan) as tbayar FROM mu_pembelian a 
                                    JOIN mu_karyawan b ON a.id_karyawan=b.id_karyawan 
                                        JOIN mu_supplier c ON a.id_supplier=c.id_supplier
                                            JOIN mu_type_bayar d ON a.id_type_bayar=d.id_type_bayar
                                                JOIN mu_pembelian_detail e ON a.id_pembelian=e.id_pembelian GROUP BY a.id_pembelian");
    }

    public function pembelian_detail($id){
        return $this->db->query("SELECT a.*, b.nama_karyawan, c.nama_supplier, d.nama_type_bayar, sum(jml_pesan*harga_pesan) as tbayar FROM mu_pembelian a 
                                    JOIN mu_karyawan b ON a.id_karyawan=b.id_karyawan 
                                        JOIN mu_supplier c ON a.id_supplier=c.id_supplier
                                            JOIN mu_type_bayar d ON a.id_type_bayar=d.id_type_bayar
                                                JOIN mu_pembelian_detail e ON a.id_pembelian=e.id_pembelian where a.id_pembelian='$id'");
    }

    public function pembelian_detail_edit($id){
        return $this->db->query("SELECT b.id_karyawan, b.id_pembelian, b.kode_pembelian, b.tgl_kirim, c.nama_karyawan, d.nama_supplier, e.nama_type_bayar, b.keterangan as ket_pembelian, b.tgl_pembelian, b.referensi, b.kepada_attention, 
                                    a.id_pembelian_terima, a.no_pembelian_terima, a.no_surat_jalan, a.pengirim_barang, a.keterangan as ket_po, a.tanggal_terima, f.nama_karyawan as penerima_barang
                                    FROM `mu_pembelian_terima` a 
                                        JOIN mu_pembelian b ON a.id_pembelian=b.id_pembelian 
                                            JOIN mu_karyawan c ON b.id_karyawan=c.id_karyawan 
                                                JOIN mu_supplier d ON b.id_supplier=d.id_supplier
                                                    JOIN mu_type_bayar e ON b.id_type_bayar=e.id_type_bayar
                                                        JOIN mu_karyawan f ON a.id_karyawan=f.id_karyawan 
                                                            where a.id_pembelian_terima='$id'");
    }



    public function pembelian_return($id){
        return $this->db->query("SELECT b.id_pembelian, b.kode_pembelian, b.tgl_kirim, c.nama_karyawan, d.nama_supplier, e.nama_type_bayar, b.keterangan as ket_pembelian, b.tgl_pembelian, b.referensi, b.kepada_attention, 
                                    a.id_pembelian_terima, a.no_pembelian_terima, a.no_surat_jalan, a.pengirim_barang, a.keterangan as ket_po, a.tanggal_terima, f.nama_karyawan as penerima_barang
                                    FROM `mu_pembelian_terima` a 
                                        JOIN mu_pembelian b ON a.id_pembelian=b.id_pembelian 
                                            JOIN mu_karyawan c ON b.id_karyawan=c.id_karyawan 
                                                JOIN mu_supplier d ON b.id_supplier=d.id_supplier
                                                    JOIN mu_type_bayar e ON b.id_type_bayar=e.id_type_bayar
                                                        JOIN mu_karyawan f ON a.id_karyawan=f.id_karyawan 
                                                            where a.id_pembelian_terima='$id'");
    }

    public function edit_pembelian_return($id){
        return $this->db->query("SELECT z.id_pembelian_return, z.no_return, z.tgl_kirim_return, z.id_type_bayar as id_type_bayar_return, z.keterangan_return, z.tanggal_return, b.id_pembelian, b.kode_pembelian, b.tgl_kirim, c.nama_karyawan, d.nama_supplier, e.nama_type_bayar, b.keterangan as ket_pembelian, b.tgl_pembelian, b.referensi, b.kepada_attention, 
                                    a.id_pembelian_terima, a.no_pembelian_terima, a.no_surat_jalan, a.pengirim_barang, a.keterangan as ket_po, a.tanggal_terima, f.nama_karyawan as penerima_barang
                                    FROM mu_pembelian_return z 
                                        JOIN mu_pembelian_terima a ON z.id_pembelian_terima=a.id_pembelian_terima
                                            JOIN mu_pembelian b ON a.id_pembelian=b.id_pembelian 
                                                JOIN mu_karyawan c ON b.id_karyawan=c.id_karyawan 
                                                    JOIN mu_supplier d ON b.id_supplier=d.id_supplier
                                                        JOIN mu_type_bayar e ON b.id_type_bayar=e.id_type_bayar
                                                            JOIN mu_karyawan f ON a.id_karyawan=f.id_karyawan 
                                                                where z.id_pembelian_return='$id'");
    }

    public function pembelian_return_detail($id){
        return $this->db->query("SELECT b.id_pembelian, b.kode_pembelian, b.tgl_kirim, c.nama_karyawan, d.nama_supplier, e.nama_type_bayar, b.keterangan as ket_pembelian, b.tgl_pembelian, b.referensi, b.kepada_attention, 
                                    a.id_pembelian_terima, a.no_pembelian_terima, a.no_surat_jalan, a.pengirim_barang, a.keterangan as ket_po, a.tanggal_terima, f.nama_karyawan as penerima_barang,
                                    g.no_return, h.nama_type_bayar as type_bayar_return, g.keterangan_return, g.tanggal_return, g.tgl_kirim_return
                                    FROM `mu_pembelian_terima` a 
                                        JOIN mu_pembelian b ON a.id_pembelian=b.id_pembelian 
                                            JOIN mu_karyawan c ON b.id_karyawan=c.id_karyawan 
                                                JOIN mu_supplier d ON b.id_supplier=d.id_supplier
                                                    JOIN mu_type_bayar e ON b.id_type_bayar=e.id_type_bayar
                                                        JOIN mu_karyawan f ON a.id_karyawan=f.id_karyawan 
                                                        
                                                            JOIN mu_pembelian_return g ON a.id_pembelian_terima=g.id_pembelian_terima
                                                            JOIN mu_type_bayar h ON g.id_type_bayar=h.id_type_bayar
                                                            where a.id_pembelian_terima='$id'");
    }

    public function view_pembelian_terima(){
        return $this->db->query("SELECT a.*, b.kode_pembelian, b.tgl_pembelian, c.nama_karyawan, d.nama_supplier FROM `mu_pembelian_terima` a 
                                    JOIN mu_pembelian b ON a.id_pembelian=b.id_pembelian 
                                        JOIN mu_karyawan c ON a.id_karyawan=c.id_karyawan 
                                            JOIN mu_supplier d ON b.id_supplier=d.id_supplier");
    }

    public function view_pembelian_return(){
        return $this->db->query("SELECT a.*, c.kode_pembelian, d.nama_karyawan, e.nama_supplier, f.nama_type_bayar 
                                    FROM `mu_pembelian_return` a 
                                        JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima 
                                            JOIN mu_pembelian c ON b.id_pembelian=c.id_pembelian 
                                                JOIN mu_karyawan d ON c.id_karyawan=d.id_karyawan 
                                                    JOIN mu_supplier e ON c.id_supplier=e.id_supplier 
                                                        JOIN mu_type_bayar f ON c.id_type_bayar=f.id_type_bayar ");
    }

    public function view_penyesuaian(){
        return $this->db->query("SELECT a.*, b.nama_sebab_alasan FROM mu_penyesuaian a JOIN mu_sebab_alasan b ON a.id_sebab_alasan=b.id_sebab_alasan ORDER BY a.id_penyesuaian DESC");
    }

    public function view_join_city($table1,$table2,$field,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join('mu_city', $table1.'.city_id=mu_city.city_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function list_transaksi_penjualan($status){
        return $this->db->query("SELECT a.id_transaksi, a.waktu_proses, d.nama_karyawan, b.nama_pelanggan, c.nama_type_bayar, a.jumlah_bayar, a.keterangan FROM `mu_transaksi` a LEFT JOIN mu_pelanggan b ON a.id_pelanggan=b.id_pelanggan LEFT JOIN mu_type_bayar c ON a.id_type_bayar=c.id_type_bayar JOIN mu_karyawan d ON a.id_karyawan=d.id_karyawan where a.status='$status'");
    }

    public function list_transaksi_return($status){
        return $this->db->query("SELECT a.id_transaksi_return, a.waktu_return, d.nama_karyawan, b.nama_pelanggan, c.nama_type_bayar, a.bayar_return, a.ket_return FROM `mu_transaksi_return` a JOIN mu_transaksi e ON a.id_transaksi=e.id_transaksi LEFT JOIN mu_pelanggan b ON e.id_pelanggan=b.id_pelanggan LEFT JOIN mu_type_bayar c ON a.id_type_bayar=c.id_type_bayar JOIN mu_karyawan d ON a.id_karyawan=d.id_karyawan where a.status='$status'");
    }

    public function cek_promosi_barang($id_barang,$id_transaksi){
        $query = $this->db->query("SELECT *, REPLACE(tgl_mulai,'-',''), REPLACE(tgl_selesai,'-','') FROM mu_promosi where kode_terapkan='barang' AND beli_barang='$id_barang' AND '".date('Ymd')."'>=REPLACE(tgl_mulai,'-','') AND '".date('Ymd')."'<=REPLACE(tgl_selesai,'-','')");
        if ($query->num_rows()>=1){
            $promo = $query->row_array();
            if ($promo['jml_beli']==1){
                $stok_gratis = $this->model_app->stok($promo['bonus_barang'])->row_array();
                if ($stok_gratis['stok']>=$promo['jml_bonus']){
                    $trxx = $this->db->query("SELECT * FROM mu_barang_harga where id_kategori_pelanggan='1' AND id_jenis_jual='1' AND id_barang='".$promo['bonus_barang']."'")->row_array();
                    $dataa = array('id_transaksi' => $id_transaksi,
                                  'id_barang' => $promo['bonus_barang'],
                                  'jumlah_jual' => $promo['jml_bonus'],
                                  'kode_satuan' => $trxx['satuan'],
                                  'jumlah_satuan' => $trxx['jumlah'],
                                  'diskon_jual' => $trxx['diskon'],
                                  'harga_jual' => $trxx['harga'],
                                  'status' => '0');
                    $this->model_app->insert('mu_transaksi_detail',$dataa);
                }
            }
        }
    }

    public function cek_promosi_barang_update($id_barang,$id_transaksi,$jml,$id_kategori_pelanggan,$satuan,$id_jenis_jual){
        $query = $this->db->query("SELECT *, REPLACE(tgl_mulai,'-',''), REPLACE(tgl_selesai,'-','') FROM mu_promosi where kode_terapkan='barang' AND beli_barang='$id_barang' AND '".date('Ymd')."'>=REPLACE(tgl_mulai,'-','') AND '".date('Ymd')."'<=REPLACE(tgl_selesai,'-','')");
        if ($query->num_rows()>=1){
            $promo = $query->row_array();
            $bonusx = floor($jml/$promo['jml_beli'])*$promo['jml_bonus'];
                $trxx = $this->db->query("SELECT * FROM mu_barang_harga where id_barang='$promo[bonus_barang]' AND satuan='$satuan'")->row_array();
                $stok_gratis = $this->model_app->stok($promo['bonus_barang'])->row_array();
                if ($stok_gratis['stok']>=$bonusx){
                    $cekkeranjang = $this->db->query("SELECT * FROM mu_transaksi_detail where id_transaksi='$id_transaksi' AND id_barang='$promo[bonus_barang]' AND status='0'");
                        
                        if($id_jenis_jual=='1'){ $statusjual = 'ecer'; }elseif($id_jenis_jual=='2'){ $statusjual = 'grosir1'; }elseif($id_jenis_jual=='3'){ $statusjual = 'grosir2'; }elseif($id_jenis_jual=='4'){ $statusjual = 'grosir3'; }
                        $cek_diskon = $this->db->query("SELECT $statusjual as diskon FROM mu_promosi_detail where id_promosi='$promo[id_promosi]' AND id_kategori_pelanggan='$id_kategori_pelanggan'")->row_array();
                        if ($promo['jenis_diskon']=='uang'){ $diskonrp = $cek_diskon['diskon']; }elseif($promo['jenis_diskon']=='persen'){ $diskonrp = $cek_diskon['diskon']/100*$trxx['harga']; }
                        $this->db->query("UPDATE mu_transaksi_detail SET diskon_jual=diskon_jual+$diskonrp where id_transaksi='$id_transaksi' AND id_barang='$promo[beli_barang]' AND status='1'");

                    if ($cekkeranjang->num_rows()>=1){
                        $dataa = array('jumlah_jual' => $bonusx);
                        $where = array('id_transaksi' => $id_transaksi, 'id_barang'=>$promo['bonus_barang'], 'status'=>'0');
                        $this->model_app->update('mu_transaksi_detail', $dataa, $where);
                    }else{
                        
                        $dataa = array('id_transaksi' => $id_transaksi,
                                      'id_barang' => $promo['bonus_barang'],
                                      'jumlah_jual' => $bonusx,
                                      'kode_satuan' => $trxx['satuan'],
                                      'jumlah_satuan' => $trxx['jumlah'],
                                      'diskon_jual' => '0',
                                      'harga_jual' => $trxx['harga'],
                                      'status' => '0');
                        $this->model_app->insert('mu_transaksi_detail',$dataa);
                    }

                    if ($jml/$promo['jml_beli']<1){
                        $this->db->query("DELETE FROM mu_transaksi_detail where id_barang='$promo[bonus_barang]' AND id_transaksi='$id_transaksi' AND status='0'");
                    }
                }
        }
    }
}