<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App extends CI_Controller {
	function index(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = md5($this->input->post('b'));
			$cek = $this->model_users->cek_login($username,$password,'mu_karyawan');
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata(array('id_users'=>$row['id_karyawan'],
											   'username'=>$row['username'],
							   				   'level'=>'admin'));
				redirect('app/home');
			}else{
				$data['title'] = 'Users &rsaquo; Log In';
				$this->load->view('app/view_login',$data);
			}
		}else{
			if ($this->session->level != ''){
				redirect('app/home');
			}else{
				$data['title'] = 'Users &rsaquo; Log In';
				$this->load->view('app/view_login',$data);
			}
		}
	}

	public function code_check(){
        if($this->input->is_ajax_request()) {
	        $code = $this->input->post('a');
            if(!$this->form_validation->is_unique($code, 'mu_pembelian_terima.no_pembelian_terima')) {          
	         	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-danger">Nomor ini sudah Terpakai.</i>')));
            }elseif($code==''){
            	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-info">Kode akan di generate System.</i>')));
            }else{
            	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-success">Oke Nomor Belum Terpakai.</i>')));
            }

        }
    }

    public function barang_check(){
        if($this->input->is_ajax_request()) {
	        $code = $this->input->post('a');
            if(!$this->form_validation->is_unique($code, 'mu_barang.kode_barang')) {          
	         	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-danger">Kode ini sudah Terpakai.</i>')));
            }elseif($code==''){
            	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-info">Kode akan di generate System.</i>')));
            }else{
            	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-success">Oke Kode Belum Terpakai.</i>')));
            }

        }
    }

    public function pembelian_check(){
        if($this->input->is_ajax_request()) {
	        $code = $this->input->post('a');
            if(!$this->form_validation->is_unique($code, 'mu_pembelian.kode_pembelian')) {          
	         	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-danger">Kode ini sudah Terpakai.</i>')));
            }elseif($code==''){
            	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-info">Kode akan di generate System.</i>')));
            }else{
            	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i class="text-success">Oke Kode Belum Terpakai.</i>')));
            }

        }
    }

	function home(){
		cek_session_admin();
		$this->template->load('app/template','app/view_home');
	}

	function state(){
		cek_session_admin();
		$country_id = $this->input->post('count_id');
		$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $country_id),'state_id');
		$this->load->view('app/mod_country/view_state',$data);
	}

	function city(){
		cek_session_admin();
		$state_id = $this->input->post('stat_id');
		$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $state_id),'city_id');
		$this->load->view('app/mod_country/view_city',$data);
	}

	function sub_kategori(){
		cek_session_admin();
		$kat_id = $this->input->post('kat_id');
		$data['sub_kategori'] = $this->model_app->view_where_desc('mu_subkategori',array('id_kategori' => $kat_id),'id_subkategori');
		$this->load->view('app/mod_subkategori/view_ajax_subkategori',$data);
	}

	function conf_perusahaan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/images/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '10000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('l');
	        $hasil=$this->upload->data();
	        if ($hasil['file_name']==''){      	
				$data = array('nama_perusahaan' => $this->input->post('a'),
							  'npwp_perusahaan' => $this->input->post('b'),
							  'alamat_perusahaan' => $this->input->post('c'),
							  'city_id' => $this->input->post('d'),
							  'state_id' => $this->input->post('e'),
							  'country_id' => $this->input->post('f'),
							  'telepon' => $this->input->post('g'),
							  'email' => $this->input->post('h'),
							  'fax' => $this->input->post('i'),
							  'website' => $this->input->post('j'),
							  'kode_pos' => $this->input->post('k'));
			}else{
				$data = array('nama_perusahaan' => $this->input->post('a'),
							  'npwp_perusahaan' => $this->input->post('b'),
							  'alamat_perusahaan' => $this->input->post('c'),
							  'city_id' => $this->input->post('d'),
							  'state_id' => $this->input->post('e'),
							  'country_id' => $this->input->post('f'),
							  'telepon' => $this->input->post('g'),
							  'email' => $this->input->post('h'),
							  'fax' => $this->input->post('i'),
							  'website' => $this->input->post('j'),
							  'kode_pos' => $this->input->post('k'),
							  'logo' => $hasil['file_name']);
			}
	    	$where = array('id_perusahaan' => $this->input->post('id'));
			$this->model_app->update('mu_conf_perusahaan', $data, $where);
			redirect('app/conf_perusahaan');
		}else{
			$proses = $this->model_app->view_one_address('mu_conf_perusahaan', array('id_perusahaan' => 1),'id_perusahaan')->row_array();
			$data = array('row' => $proses);
			$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
			$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$this->template->load('app/template','app/configurasi/edit_perusahaan',$data);
		}
	}

	function conf_barang(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){    	
				$data = array('kode_barang' => $this->input->post('a'),
							  'harga_grosir' => $this->input->post('b'),
							  'grosir_berdasarkan' => $this->input->post('c'),
							  'harga_kategori_pelanggan' => $this->input->post('d'),
							  'kode_satuan' => $this->input->post('e'),
							  'konversi_satuan_beli' => $this->input->post('f'),
							  'sertakan_gambar' => $this->input->post('g'));
	    	$where = array('id_conf_barang' => $this->input->post('id'));
			$this->model_app->update('mu_conf_barang', $data, $where);
			redirect('app/conf_barang');
		}else{
			$proses = $this->model_app->view_join_satu('mu_conf_barang','mu_satuan','kode_satuan')->row_array();
			$data = array('row' => $proses);
			$data['satuan'] = $this->model_app->view_all_desc('mu_satuan','kode_satuan');
			$this->template->load('app/template','app/configurasi/edit_barang',$data);
		}
	}

	function conf_penjualan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){    	
				$data = array('terapkan_pajak' => $this->input->post('a'),
							  'font_totalbayar_besar' => $this->input->post('b'),
							  'posisi_totalbayar_besar' => $this->input->post('c'),
							  'font_jumlahbayar_besar' => $this->input->post('d'),
							  'tipe_diskon' => $this->input->post('e'),
							  'terapkan_perubahan_diskon' => $this->input->post('f'),
							  'terapkan_perubahan_harga' => $this->input->post('g'),
							  'terapkan_batas_piutang' => $this->input->post('h'),
							  'id_jatuh_tempo' => $this->input->post('i'),
							  'menunjang_penjualan_tunggu' => $this->input->post('j'),
							  'sertakan_nama_penjual' => $this->input->post('k'),
							  'sertakan_biaya_kirim' => $this->input->post('l'),
							  'diskon_agen_expadisi' => $this->input->post('m'),
							  'tipe_diskon_ekspedisi' => $this->input->post('n'),
							  'diskon_untuk_pelanggan' => $this->input->post('o'),
							  'tipe_diskon_pelanggan' => $this->input->post('p'),
							  'kode_satuan' => $this->input->post('q'),
							  'keterangan_perbarang' => $this->input->post('r'));
	    	$where = array('id_conf_penjualan' => $this->input->post('id'));
			$this->model_app->update('mu_conf_penjualan', $data, $where);
			redirect('app/conf_penjualan');
		}else{
			$proses = $this->model_app->view_join_dua('mu_conf_penjualan','mu_jatuh_tempo','mu_satuan','id_jatuh_tempo','kode_satuan')->row_array();
			$data = array('row' => $proses);
			$data['satuan'] = $this->model_app->view_all_desc('mu_satuan','kode_satuan');
			$data['jatuh_tempo'] = $this->model_app->view_all_desc('mu_jatuh_tempo','id_jatuh_tempo');
			$data['tipe_diskon'] = $this->model_app->view_all_desc('mu_tipe_diskon','tipe_diskon');
			$this->template->load('app/template','app/configurasi/edit_penjualan',$data);
		}
	}


	function supplier(){
		cek_session_admin();
		$data = $this->model_app->view_address('mu_supplier','id_supplier');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_supplier/view_supplier',$data);
	}

	function tambah_supplier(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_supplier' => $this->input->post('a'), 
						  'kontak_person' => $this->input->post('b'),
						  'alamat_1' => $this->input->post('c'),
						  'alamat_2' => $this->input->post('d'),
						  'city_id' => $this->input->post('e'),
						  'state_id' => $this->input->post('f'),
						  'country_id' => $this->input->post('g'),
						  'telepon' => $this->input->post('h'),
						  'hp' => $this->input->post('i'),
						  'email' => $this->input->post('j'),
						  'website' => $this->input->post('k'),
						  'kode_pos' => $this->input->post('l'),
						  'fax' => $this->input->post('m'),
						  'chat' => $this->input->post('n'),
						  'id_users' => $this->session->id_users,
						  'keterangan' => $this->input->post('o'));
			$this->model_app->insert('mu_supplier',$data);
			redirect('app/supplier');
		}else{
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$this->template->load('app/template','app/mod_supplier/view_supplier_tambah',$data);
		}
	}

	function edit_supplier(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_supplier' => $this->input->post('a'), 
						  'kontak_person' => $this->input->post('b'),
						  'alamat_1' => $this->input->post('c'),
						  'alamat_2' => $this->input->post('d'),
						  'city_id' => $this->input->post('e'),
						  'state_id' => $this->input->post('f'),
						  'country_id' => $this->input->post('g'),
						  'telepon' => $this->input->post('h'),
						  'hp' => $this->input->post('i'),
						  'email' => $this->input->post('j'),
						  'website' => $this->input->post('k'),
						  'kode_pos' => $this->input->post('l'),
						  'fax' => $this->input->post('m'),
						  'chat' => $this->input->post('n'),
						  'keterangan' => $this->input->post('o'));
	    	$where = array('id_supplier' => $this->input->post('id'));
			$this->model_app->update('mu_supplier', $data, $where);
			redirect('app/supplier');
		}else{
			$proses = $this->model_app->edit('mu_supplier', array('id_supplier' => $id))->row_array();
			$data = array('row' => $proses);
			$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
			$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$this->template->load('app/template','app/mod_supplier/view_supplier_edit',$data);
		}
	}

	function delete_supplier($id){
		$id = array('id_supplier' => $id);
		$this->model_app->delete('mu_supplier',$id);
		redirect('app/supplier');
	}


	function satuan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_satuan','kode_satuan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_satuan/view_satuan',$data);
	}

	function tambah_satuan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('kode_satuan' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_satuan',$data);
			redirect('app/satuan');
		}else{
			$this->template->load('app/template','app/mod_satuan/view_satuan_tambah');
		}
	}

	function edit_satuan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('kode_satuan' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'));
	    	$where = array('kode_satuan' => $this->input->post('id'));
			$this->model_app->update('mu_satuan', $data, $where);
			redirect('app/satuan');
		}else{
			$data['row'] = $this->model_app->edit('mu_satuan', array('kode_satuan' => $id))->row_array();
			$this->template->load('app/template','app/mod_satuan/view_satuan_edit',$data);
		}
	}

	function delete_satuan(){
		$id = $this->uri->segment(3);
		$idd = array('kode_satuan' => $id);
		$this->model_app->delete('mu_satuan',$idd);
		redirect('app/satuan');
	}

	function rak(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_rak','id_rak');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_rak/view_rak',$data);
	}

	function tambah_rak(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_rak' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_rak',$data);
			redirect('app/rak');
		}else{
			$this->template->load('app/template','app/mod_rak/view_rak_tambah');
		}
	}

	function edit_rak(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_rak' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'));
	    	$where = array('id_rak' => $this->input->post('id'));
			$this->model_app->update('mu_rak', $data, $where);
			redirect('app/rak');
		}else{
			$data['row'] = $this->model_app->edit('mu_rak', array('id_rak' => $id))->row_array();
			$this->template->load('app/template','app/mod_rak/view_rak_edit',$data);
		}
	}

	function delete_rak(){
		$id = $this->uri->segment(3);
		$idd = array('id_rak' => $id);
		$this->model_app->delete('mu_rak',$idd);
		redirect('app/rak');
	}


	function kategori(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_kategori','id_kategori');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_kategori/view_kategori',$data);
	}

	function tambah_kategori(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_kategori' => $this->input->post('a'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_kategori',$data);
			redirect('app/kategori');
		}else{
			$this->template->load('app/template','app/mod_kategori/view_kategori_tambah');
		}
	}

	function edit_kategori(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_kategori' => $this->input->post('a'));
	    	$where = array('id_kategori' => $this->input->post('id'));
			$this->model_app->update('mu_kategori', $data, $where);
			redirect('app/kategori');
		}else{
			$data['row'] = $this->model_app->edit('mu_kategori', array('id_kategori' => $id))->row_array();
			$this->template->load('app/template','app/mod_kategori/view_kategori_edit',$data);
		}
	}

	function delete_kategori(){
		$id = $this->uri->segment(3);
		$idd = array('id_kategori' => $id);
		$this->model_app->delete('mu_kategori',$idd);
		redirect('app/kategori');
	}


	function subkategori(){
		cek_session_admin();
		$data = $this->model_app->view_join('mu_subkategori','mu_kategori','id_kategori','id_subkategori');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_subkategori/view_subkategori',$data);
	}

	function tambah_subkategori(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('id_kategori' => $this->input->post('a'),
						  'nama_subkategori' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_subkategori',$data);
			redirect('app/subkategori');
		}else{
			$data = $this->model_app->view_all_desc('mu_kategori','id_kategori');
        	$data = array('record' => $data);
			$this->template->load('app/template','app/mod_subkategori/view_subkategori_tambah',$data);
		}
	}

	function edit_subkategori(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_kategori' => $this->input->post('a'),
						  'nama_subkategori' => $this->input->post('b'));
	    	$where = array('id_subkategori' => $this->input->post('id'));
			$this->model_app->update('mu_subkategori', $data, $where);
			redirect('app/subkategori');
		}else{
			$data = $this->model_app->view_all_desc('mu_kategori','id_kategori');
        	$data = array('record' => $data);
			$data['row'] = $this->model_app->edit('mu_subkategori', array('id_subkategori' => $id))->row_array();
			$this->template->load('app/template','app/mod_subkategori/view_subkategori_edit',$data);
		}
	}

	function delete_subkategori(){
		$id = $this->uri->segment(3);
		$idd = array('id_subkategori' => $id);
		$this->model_app->delete('mu_subkategori',$idd);
		redirect('app/subkategori');
	}


	function kategori_pelanggan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_kategori_pelanggan','id_kategori_pelanggan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_kategori_pelanggan/view_kategori_pelanggan',$data);
	}

	function tambah_kategori_pelanggan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_kategori_pelanggan' => $this->input->post('a'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_kategori_pelanggan',$data);
			redirect('app/kategori_pelanggan');
		}else{
			$this->template->load('app/template','app/mod_kategori_pelanggan/view_kategori_pelanggan_tambah');
		}
	}

	function edit_kategori_pelanggan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_kategori_pelanggan' => $this->input->post('a'));
	    	$where = array('id_kategori_pelanggan' => $this->input->post('id'));
			$this->model_app->update('mu_kategori_pelanggan', $data, $where);
			redirect('app/kategori_pelanggan');
		}else{
			$data['row'] = $this->model_app->edit('mu_kategori_pelanggan', array('id_kategori_pelanggan' => $id))->row_array();
			$this->template->load('app/template','app/mod_kategori_pelanggan/view_kategori_pelanggan_edit',$data);
		}
	}

	function delete_kategori_pelanggan(){
		$id = $this->uri->segment(3);
		$idd = array('id_kategori_pelanggan' => $id);
		$this->model_app->delete('mu_kategori_pelanggan',$idd);
		redirect('app/kategori_pelanggan');
	}


	function agen_ekspedisi(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_agen_ekspedisi','id_agen_ekspedisi');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_agen_ekspedisi/view_agen_ekspedisi',$data);
	}

	function tambah_agen_ekspedisi(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama' => $this->input->post('a'),
						  'alamat' => $this->input->post('b'),
						  'city_id' => $this->input->post('c'),
						  'state_id' => $this->input->post('i'),
						  'country_id' => $this->input->post('h'),
						  'telepon' => $this->input->post('d'),
						  'email' => $this->input->post('e'),
						  'fax' => $this->input->post('f'),
						  'chat' => $this->input->post('g'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_agen_ekspedisi',$data);
			redirect('app/agen_ekspedisi');
		}else{
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$this->template->load('app/template','app/mod_agen_ekspedisi/view_agen_ekspedisi_tambah', $data);
		}
	}

	function edit_agen_ekspedisi(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama' => $this->input->post('a'),
						  'alamat' => $this->input->post('b'),
						  'city_id' => $this->input->post('c'),
						  'state_id' => $this->input->post('i'),
						  'country_id' => $this->input->post('h'),
						  'telepon' => $this->input->post('d'),
						  'email' => $this->input->post('e'),
						  'fax' => $this->input->post('f'),
						  'chat' => $this->input->post('g'));
	    	$where = array('id_agen_ekspedisi' => $this->input->post('id'));
			$this->model_app->update('mu_agen_ekspedisi', $data, $where);
			redirect('app/agen_ekspedisi');
		}else{
			$proses = $this->model_app->edit('mu_agen_ekspedisi', array('id_agen_ekspedisi' => $id))->row_array();
			$data = array('row' => $proses);

			$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
			$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$this->template->load('app/template','app/mod_agen_ekspedisi/view_agen_ekspedisi_edit',$data);
		}
	}

	function delete_agen_ekspedisi(){
		$id = $this->uri->segment(3);
		$idd = array('id_agen_ekspedisi' => $id);
		$this->model_app->delete('mu_agen_ekspedisi',$idd);
		redirect('app/agen_ekspedisi');
	}



	function sebab_alasan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_sebab_alasan','id_sebab_alasan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_sebab_alasan/view_sebab_alasan',$data);
	}

	function tambah_sebab_alasan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_sebab_alasan' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_sebab_alasan',$data);
			redirect('app/sebab_alasan');
		}else{
			$this->template->load('app/template','app/mod_sebab_alasan/view_sebab_alasan_tambah');
		}
	}

	function edit_sebab_alasan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_sebab_alasan' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'));
	    	$where = array('id_sebab_alasan' => $this->input->post('id'));
			$this->model_app->update('mu_sebab_alasan', $data, $where);
			redirect('app/sebab_alasan');
		}else{
			$data['row'] = $this->model_app->edit('mu_sebab_alasan', array('id_sebab_alasan' => $id))->row_array();
			$this->template->load('app/template','app/mod_sebab_alasan/view_sebab_alasan_edit',$data);
		}
	}

	function delete_sebab_alasan(){
		$id = $this->uri->segment(3);
		$idd = array('id_sebab_alasan' => $id);
		$this->model_app->delete('mu_sebab_alasan',$idd);
		redirect('app/sebab_alasan');
	}


	function negara(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_country','country_id');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_negara/view_negara',$data);
	}

	function tambah_negara(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('name' => $this->input->post('a'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_country',$data);
			redirect('app/negara');
		}else{
			$this->template->load('app/template','app/mod_negara/view_negara_tambah');
		}
	}

	function edit_negara(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('name' => $this->input->post('a'));
	    	$where = array('country_id' => $this->input->post('id'));
			$this->model_app->update('mu_country', $data, $where);
			redirect('app/negara');
		}else{
			$data['row'] = $this->model_app->edit('mu_country', array('country_id' => $id))->row_array();
			$this->template->load('app/template','app/mod_negara/view_negara_edit',$data);
		}
	}

	function delete_negara(){
		$id = $this->uri->segment(3);
		$idd = array('country_id' => $id);
		$this->model_app->delete('mu_country',$idd);
		redirect('app/negara');
	}


	function provinsi(){
		cek_session_admin();
		$data = $this->model_app->view_join_provinsi('state_id');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_provinsi/view_provinsi',$data);
	}

	function tambah_provinsi(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('country_id' => $this->input->post('a'),
						  'name' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_state',$data);
			redirect('app/provinsi');
		}else{
			$data = $this->model_app->view_all_desc('mu_country','country_id');
        	$data = array('record' => $data);
			$this->template->load('app/template','app/mod_provinsi/view_provinsi_tambah',$data);
		}
	}

	function edit_provinsi(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('country_id' => $this->input->post('a'),
						  'name' => $this->input->post('b'));
	    	$where = array('state_id' => $this->input->post('id'));
			$this->model_app->update('mu_state', $data, $where);
			redirect('app/provinsi');
		}else{
			$data = $this->model_app->view_all_desc('mu_country','country_id');
        	$data = array('record' => $data);
			$data['row'] = $this->model_app->edit('mu_state', array('state_id' => $id))->row_array();
			$this->template->load('app/template','app/mod_provinsi/view_provinsi_edit',$data);
		}
	}

	function delete_provinsi(){
		$id = $this->uri->segment(3);
		$idd = array('state_id' => $id);
		$this->model_app->delete('mu_state',$idd);
		redirect('app/provinsi');
	}


	function kota(){
		cek_session_admin();
		$data = $this->model_app->view_join_kota('city_id');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_kota/view_kota',$data);
	}

	function tambah_kota(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('state_id' => $this->input->post('a'),
						  'name' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_city',$data);
			redirect('app/kota');
		}else{
			$data = $this->model_app->view_all_desc('mu_country','country_id');
        	$data = array('record' => $data);
			$this->template->load('app/template','app/mod_kota/view_kota_tambah',$data);
		}
	}

	function edit_kota(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('state_id' => $this->input->post('a'),
						  'name' => $this->input->post('b'));
	    	$where = array('city_id' => $this->input->post('id'));
			$this->model_app->update('mu_city', $data, $where);
			redirect('app/kota');
		}else{
			$data = $this->model_app->view_all_desc('mu_country','country_id');
			$data1 = $this->model_app->view_all_desc('mu_state','state_id');
        	$data = array('record' => $data,'record1' => $data1);
			$data['row'] = $this->model_app->edit_kota(array('city_id' => $id))->row_array();
			$this->template->load('app/template','app/mod_kota/view_kota_edit',$data);
		}
	}

	function delete_kota(){
		$id = $this->uri->segment(3);
		$idd = array('city_id' => $id);
		$this->model_app->delete('mu_city',$idd);
		redirect('app/kota');
	}


	function pendidikan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_pendidikan','id_pendidikan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_pendidikan/view_pendidikan',$data);
	}

	function tambah_pendidikan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_pendidikan' => $this->input->post('a'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_pendidikan',$data);
			redirect('app/pendidikan');
		}else{
			$this->template->load('app/template','app/mod_pendidikan/view_pendidikan_tambah');
		}
	}

	function edit_pendidikan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_pendidikan' => $this->input->post('a'));
	    	$where = array('id_pendidikan' => $this->input->post('id'));
			$this->model_app->update('mu_pendidikan', $data, $where);
			redirect('app/pendidikan');
		}else{
			$data['row'] = $this->model_app->edit('mu_pendidikan', array('id_pendidikan' => $id))->row_array();
			$this->template->load('app/template','app/mod_pendidikan/view_pendidikan_edit',$data);
		}
	}

	function delete_pendidikan(){
		$id = $this->uri->segment(3);
		$idd = array('id_pendidikan' => $id);
		$this->model_app->delete('mu_pendidikan',$idd);
		redirect('app/pendidikan');
	}


	function bahasa(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_bahasa','id_bahasa');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_bahasa/view_bahasa',$data);
	}

	function tambah_bahasa(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_bahasa' => $this->input->post('a'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_bahasa',$data);
			redirect('app/bahasa');
		}else{
			$this->template->load('app/template','app/mod_bahasa/view_bahasa_tambah');
		}
	}

	function edit_bahasa(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_bahasa' => $this->input->post('a'));
	    	$where = array('id_bahasa' => $this->input->post('id'));
			$this->model_app->update('mu_bahasa', $data, $where);
			redirect('app/bahasa');
		}else{
			$data['row'] = $this->model_app->edit('mu_bahasa', array('id_bahasa' => $id))->row_array();
			$this->template->load('app/template','app/mod_bahasa/view_bahasa_edit',$data);
		}
	}

	function delete_bahasa(){
		$id = $this->uri->segment(3);
		$idd = array('id_bahasa' => $id);
		$this->model_app->delete('mu_bahasa',$idd);
		redirect('app/bahasa');
	}


	function pelanggan(){
		cek_session_admin();
		$data = $this->model_app->view_join_city('mu_pelanggan','mu_kategori_pelanggan','id_kategori_pelanggan','id_pelanggan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_pelanggan/view_pelanggan',$data);
	}

	function tambah_pelanggan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('id_kategori_pelanggan' => $this->input->post('a'),
						  'id_type_pelanggan' => $this->input->post('b'),
						  'nama_pelanggan' => $this->input->post('c'),
						  'kontak_pelanggan' => $this->input->post('d'),
						  'alamat_pelanggan_1' => $this->input->post('e'),
						  'alamat_pelanggan_2' => $this->input->post('f'),
						  'city_id' => $this->input->post('g'),
						  'state_id' => $this->input->post('h'),
						  'country_id' => $this->input->post('i'),
						  'telpon_pelanggan' => $this->input->post('j'),
						  'hp_pelanggan' => $this->input->post('k'),
						  'email_pelanggan' => $this->input->post('l'),
						  'website_pelanggan' => $this->input->post('m'),
						  'kode_pos_pelanggan' => $this->input->post('n'),
						  'fax_pelanggan' => $this->input->post('o'),
						  'chat_pelanggan' => $this->input->post('p'),
						  'keterangan' => $this->input->post('q'),
						  'id_users' => $this->session->id_users,
						  'waktu_daftar' => date('Y-m-d H:i:s'));
			$this->model_app->insert('mu_pelanggan',$data);
			redirect('app/pelanggan');
		}else{
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$data['kategori_pelanggan'] = $this->model_app->view_all_desc('mu_kategori_pelanggan','id_kategori_pelanggan');
			$data['type_pelanggan'] = $this->model_app->view_all_desc('mu_type_pelanggan','id_type_pelanggan');
			$this->template->load('app/template','app/mod_pelanggan/view_pelanggan_tambah', $data);
		}
	}

	function edit_pelanggan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_kategori_pelanggan' => $this->input->post('a'),
						  'id_type_pelanggan' => $this->input->post('b'),
						  'nama_pelanggan' => $this->input->post('c'),
						  'kontak_pelanggan' => $this->input->post('d'),
						  'alamat_pelanggan_1' => $this->input->post('e'),
						  'alamat_pelanggan_2' => $this->input->post('f'),
						  'city_id' => $this->input->post('g'),
						  'state_id' => $this->input->post('h'),
						  'country_id' => $this->input->post('i'),
						  'telpon_pelanggan' => $this->input->post('j'),
						  'hp_pelanggan' => $this->input->post('k'),
						  'email_pelanggan' => $this->input->post('l'),
						  'website_pelanggan' => $this->input->post('m'),
						  'kode_pos_pelanggan' => $this->input->post('n'),
						  'fax_pelanggan' => $this->input->post('o'),
						  'chat_pelanggan' => $this->input->post('p'),
						  'keterangan' => $this->input->post('q'));
	    	$where = array('id_pelanggan' => $this->input->post('id'));
			$this->model_app->update('mu_pelanggan', $data, $where);
			redirect('app/pelanggan');
		}else{
			$proses = $this->model_app->edit('mu_pelanggan', array('id_pelanggan' => $id))->row_array();
			$data = array('row' => $proses);

			$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
			$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$data['kategori_pelanggan'] = $this->model_app->view_all_desc('mu_kategori_pelanggan','id_kategori_pelanggan');
			$data['type_pelanggan'] = $this->model_app->view_all_desc('mu_type_pelanggan','id_type_pelanggan');
			$this->template->load('app/template','app/mod_pelanggan/view_pelanggan_edit',$data);
		}
	}

	function delete_pelanggan(){
		$id = $this->uri->segment(3);
		$idd = array('id_pelanggan' => $id);
		$this->model_app->delete('mu_pelanggan',$idd);
		redirect('app/pelanggan');
	}

	function bataspiutang(){
		cek_session_admin();
		$data = $this->model_app->view_join_city('mu_pelanggan','mu_kategori_pelanggan','id_kategori_pelanggan','id_pelanggan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_pelanggan/view_batas_piutang',$data);
	}

	function bataspiutang_pelanggan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$cek = $this->db->query("SELECT * FROm mu_pelanggan_piutang where id_pelanggan='".$this->input->post('a')."'")->num_rows();
			if ($cek >= 1){
				$data = array('id_pelanggan' => $this->input->post('a'),
							  'batas_piutang' => $this->input->post('b'),
							  'batas_frekuensi' => $this->input->post('c'));
		    	$where = array('id_karyawan' => $this->input->post('a'));
				$this->model_app->update('mu_pelanggan_piutang', $data, $where);
			}else{
				$data = array('id_pelanggan' => $this->input->post('a'),
							  'batas_piutang' => $this->input->post('b'),
							  'batas_frekuensi' => $this->input->post('c'));
				$this->model_app->insert('mu_pelanggan_piutang',$data);
			}

			redirect('app/bataspiutang');
		}else{
			$proses = $this->model_app->edit('mu_pelanggan', array('id_pelanggan' => $id))->row_array();
			$data = array('row' => $proses);
			$this->template->load('app/template','app/mod_pelanggan/view_batas_piutang_edit',$data);
		}
	}


	function jabatan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_jabatan','id_jabatan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_jabatan/view_jabatan',$data);
	}

	function tambah_jabatan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_jabatan' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_jabatan',$data);
			redirect('app/jabatan');
		}else{
			$this->template->load('app/template','app/mod_jabatan/view_jabatan_tambah');
		}
	}

	function edit_jabatan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_jabatan' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'));
	    	$where = array('id_jabatan' => $this->input->post('id'));
			$this->model_app->update('mu_jabatan', $data, $where);
			redirect('app/jabatan');
		}else{
			$data['row'] = $this->model_app->edit('mu_jabatan', array('id_jabatan' => $id))->row_array();
			$this->template->load('app/template','app/mod_jabatan/view_jabatan_edit',$data);
		}
	}

	function delete_jabatan(){
		$id = $this->uri->segment(3);
		$idd = array('id_jabatan' => $id);
		$this->model_app->delete('mu_jabatan',$idd);
		redirect('app/jabatan');
	}


	function departemen(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_departemen','id_departemen');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_departemen/view_departemen',$data);
	}

	function tambah_departemen(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_departemen' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'),
						  'id_users' => $this->session->id_users);
			$this->model_app->insert('mu_departemen',$data);
			redirect('app/departemen');
		}else{
			$this->template->load('app/template','app/mod_departemen/view_departemen_tambah');
		}
	}

	function edit_departemen(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_departemen' => $this->input->post('a'),
						  'keterangan' => $this->input->post('b'));
	    	$where = array('id_departemen' => $this->input->post('id'));
			$this->model_app->update('mu_departemen', $data, $where);
			redirect('app/departemen');
		}else{
			$data['row'] = $this->model_app->edit('mu_departemen', array('id_departemen' => $id))->row_array();
			$this->template->load('app/template','app/mod_departemen/view_departemen_edit',$data);
		}
	}

	function delete_departemen(){
		$id = $this->uri->segment(3);
		$idd = array('id_departemen' => $id);
		$this->model_app->delete('mu_departemen',$idd);
		redirect('app/departemen');
	}


	function karyawan(){
		cek_session_admin();
		$data = $this->model_app->view_join_city('mu_karyawan','mu_jabatan','id_jabatan','id_karyawan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_karyawan/view_karyawan',$data);
	}

	function tambah_karyawan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/images/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '10000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('w');
	        $hasil=$this->upload->data();
	        if ($hasil['file_name']==''){  
	        	if (trim($this->input->post('b'))==''){
					$data = array('username' => $this->input->post('a'),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
	        	}else{
					$data = array('username' => $this->input->post('a'),
								  'password' => md5($this->input->post('b')),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}
			}else{
				if (trim($this->input->post('b'))==''){
					$data = array('username' => $this->input->post('a'),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'foto_karyawan' => $hasil['file_name'],
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}else{
					$data = array('username' => $this->input->post('a'),
								  'password' => md5($this->input->post('b')),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'foto_karyawan' => $hasil['file_name'],
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}
			}

			$this->model_app->insert('mu_karyawan',$data);
			redirect('app/karyawan');
		}else{
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$data['jenis_kelamin'] = $this->model_app->view_all_desc('mu_jenis_kelamin','id_jenis_kelamin');
			$data['agama'] = $this->model_app->view_all_desc('mu_agama','id_agama');
			$data['status_pernikahan'] = $this->model_app->view_all_desc('mu_status_pernikahan','id_status_pernikahan');
			$data['jabatan'] = $this->model_app->view_all_desc('mu_jabatan','id_jabatan');
			$data['departemen'] = $this->model_app->view_all_desc('mu_departemen','id_departemen');
			$data['status_karyawan'] = $this->model_app->view_all_desc('mu_status_karyawan','id_status_karyawan');
			$this->template->load('app/template','app/mod_karyawan/view_karyawan_tambah', $data);
		}
	}

	function edit_karyawan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/images/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '10000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('w');
	        $hasil=$this->upload->data();
	        if ($hasil['file_name']==''){  
	        	if (trim($this->input->post('b'))==''){
					$data = array('username' => $this->input->post('a'),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
	        	}else{
					$data = array('username' => $this->input->post('a'),
								  'password' => md5($this->input->post('b')),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}
			}else{
				if (trim($this->input->post('b'))==''){
					$data = array('username' => $this->input->post('a'),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'foto_karyawan' => $hasil['file_name'],
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}else{
					$data = array('username' => $this->input->post('a'),
								  'password' => md5($this->input->post('b')),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'foto_karyawan' => $hasil['file_name'],
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}
			}
	    	$where = array('id_karyawan' => $this->input->post('id'));
			$this->model_app->update('mu_karyawan', $data, $where);
			if ($this->session->id_users == $this->input->post('id')){
				redirect('app/edit_karyawan/'.$this->session->id_users);
			}else{
				redirect('app/karyawan');
			}

		}else{
			$proses = $this->model_app->edit('mu_karyawan', array('id_karyawan' => $id))->row_array();
			$data = array('row' => $proses);

			$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
			$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$data['jenis_kelamin'] = $this->model_app->view_all_desc('mu_jenis_kelamin','id_jenis_kelamin');
			$data['agama'] = $this->model_app->view_all_desc('mu_agama','id_agama');
			$data['status_pernikahan'] = $this->model_app->view_all_desc('mu_status_pernikahan','id_status_pernikahan');
			$data['jabatan'] = $this->model_app->view_all_desc('mu_jabatan','id_jabatan');
			$data['departemen'] = $this->model_app->view_all_desc('mu_departemen','id_departemen');
			$data['status_karyawan'] = $this->model_app->view_all_desc('mu_status_karyawan','id_status_karyawan');
			$this->template->load('app/template','app/mod_karyawan/view_karyawan_edit',$data);
		}
	}

	function delete_karyawan(){
		$id = $this->uri->segment(3);
		$idd = array('id_karyawan' => $id);
		$this->model_app->delete('mu_karyawan',$idd);
		redirect('app/karyawan');
	}

	function barang(){
		cek_session_admin();
		if ($this->uri->segment(3)==''){
			$data = $this->model_app->view_barang();
		}else{
			$data = $this->model_app->view_barang_where($this->uri->segment(3));
		}
		$dataa = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
        $data = array('record' => $data, 'conf' => $dataa);
		$this->template->load('app/template','app/mod_barang/view_barang',$data);
	}

	function tambah_barang(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_barang/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '10000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('o');
	        $hasil=$this->upload->data();
	        
	        $kp = $this->model_app->view_one('mu_kategori_pelanggan',array('permanen' => 'y'),'id_kategori_pelanggan')->row_array();
	        if (trim($this->input->post('a'))==''){
	        	$kode = $this->db->query("SELECT id_barang FROM mu_barang ORDER BY id_barang DESC LIMIT 1")->row();
				$kode_barang = "BRG-".sprintf("%06s", $kode->id_barang+1);
	        }else{
	        	$kode_barang = $this->input->post('a');
	        }

	        if ($hasil['file_name']==''){  
				$data = array('kode_barang' => $kode_barang,
							  'nama_barang' => $this->input->post('b'),
							  'merek_brand' => $this->input->post('c'),
							  'model_type' => $this->input->post('d'),
							  'berat_bruto' => $this->input->post('e'),
							  'ukuran_volume' => $this->input->post('f'),
							  'warna' => $this->input->post('g'),
							  'id_kategori' => $this->input->post('h'),
							  'id_subkategori' => $this->input->post('i'),
							  'id_rak' => $this->input->post('j'),
							  'harga_beli' => str_replace(",","",$this->input->post('k')),
							  'jml_minimal' => $this->input->post('l'),
							  'jml_maksimal' => $this->input->post('m'),
							  'stok' => $this->input->post('q'),
							  'kode_satuan' => $this->input->post('r'),
							  'keterangan_barang' => $this->input->post('n'),
							  'status_jual' => $this->input->post('p'),
							  'id_users' => $this->session->id_users,
							  'waktu_input' => date('Y-m-d H:i:s'));
			}else{
				$data = array('kode_barang' => $kode_barang,
							  'nama_barang' => $this->input->post('b'),
							  'merek_brand' => $this->input->post('c'),
							  'model_type' => $this->input->post('d'),
							  'berat_bruto' => $this->input->post('e'),
							  'ukuran_volume' => $this->input->post('f'),
							  'warna' => $this->input->post('g'),
							  'id_kategori' => $this->input->post('h'),
							  'id_subkategori' => $this->input->post('i'),
							  'id_rak' => $this->input->post('j'),
							  'harga_beli' => str_replace(",","",$this->input->post('k')),
							  'jml_minimal' => $this->input->post('l'),
							  'jml_maksimal' => $this->input->post('m'),
							  'stok' => $this->input->post('q'),
							  'ppn' => $this->input->post('ppn'),
							  'kode_satuan' => $this->input->post('r'),
							  'keterangan_barang' => $this->input->post('n'),
							  'foto_barang' => $hasil['file_name'],
							  'status_jual' => $this->input->post('p'),
							  'id_users' => $this->session->id_users,
							  'waktu_input' => date('Y-m-d H:i:s'));
			}
			$this->model_app->insert('mu_barang',$data);
			$id = $this->db->insert_id();

			$kategori_pelanggan = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
            foreach ($kategori_pelanggan as $r) {
            	$idp = $r['id_kategori_pelanggan'];
            	$jenis_jual = $this->model_app->view_all_asc('mu_barang_jenis_jual','id_barang_jenis_jual');
            	$no = 0;
            	foreach ($jenis_jual as $j) {
	            	$data = array('id_barang' => $id,
								  'id_kategori_pelanggan' => $this->input->post('kat')[$idp],
								  'id_jenis_jual' => $j['id_barang_jenis_jual'],
								  'harga' => str_replace(",","",$this->input->post('aa')[$idp][$no]),
								  'persen_beli' => $this->input->post('bb')[$idp][$no],
								  'diskon' => $this->input->post('cc')[$idp][$no],
								  'jumlah' => $this->input->post('dd')[$idp][$no],
								  'satuan' => $this->input->post('ee')[$idp][$no]);
	            	$this->model_app->insert('mu_barang_harga',$data);
	            	$no++;
	            }
            }
			redirect('app/barang');
		}else{
			$data['kategori_pelanggan'] = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
			$data['kategori'] = $this->model_app->view_all_desc('mu_kategori','id_kategori');
			$data['subkategori'] = $this->model_app->view_all_desc('mu_subkategori','id_subkategori');
			$data['rak'] = $this->model_app->view_all_desc('mu_rak','id_rak');
			$data['satuan'] = $this->model_app->view_all_desc('mu_satuan','kode_satuan');
			$data['kategori_pel'] = $this->model_app->view_where_asc('mu_kategori_pelanggan',array('permanen' => 'n'),'id_kategori_pelanggan');
			$data['conf'] = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
			$this->template->load('app/template','app/mod_barang/view_barang_tambah', $data);
		}
	}

	function edit_barang(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_barang/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '10000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('o');
	        $hasil=$this->upload->data();
	        
	        $kp = $this->model_app->view_one('mu_kategori_pelanggan',array('permanen' => 'y'),'id_kategori_pelanggan')->row_array();
	        if (trim($this->input->post('a'))==''){
	        	$kode = $this->db->query("SELECT id_barang FROM mu_barang ORDER BY id_barang DESC LIMIT 1")->row();
				$kode_barang = "BRG-".sprintf("%06s", $kode->id_barang+1);
	        }else{
	        	$kode_barang = $this->input->post('a');
	        }

	        if ($hasil['file_name']==''){  
				$data = array('kode_barang' => $kode_barang,
							  'nama_barang' => $this->input->post('b'),
							  'merek_brand' => $this->input->post('c'),
							  'model_type' => $this->input->post('d'),
							  'berat_bruto' => $this->input->post('e'),
							  'ukuran_volume' => $this->input->post('f'),
							  'warna' => $this->input->post('g'),
							  'id_kategori' => $this->input->post('h'),
							  'id_subkategori' => $this->input->post('i'),
							  'id_rak' => $this->input->post('j'),
							  'harga_beli' => str_replace(",","",$this->input->post('k')),
							  'jml_minimal' => $this->input->post('l'),
							  'jml_maksimal' => $this->input->post('m'),
							  'stok' => $this->input->post('q'),
							  'ppn' => $this->input->post('ppn'),
							  'kode_satuan' => $this->input->post('r'),
							  'keterangan_barang' => $this->input->post('n'),
							  'status_jual' => $this->input->post('p'),
							  'id_users' => $this->session->id_users,
							  'waktu_input' => date('Y-m-d H:i:s'));
			}else{
				$data = array('kode_barang' => $kode_barang,
							  'nama_barang' => $this->input->post('b'),
							  'merek_brand' => $this->input->post('c'),
							  'model_type' => $this->input->post('d'),
							  'berat_bruto' => $this->input->post('e'),
							  'ukuran_volume' => $this->input->post('f'),
							  'warna' => $this->input->post('g'),
							  'id_kategori' => $this->input->post('h'),
							  'id_subkategori' => $this->input->post('i'),
							  'id_rak' => $this->input->post('j'),
							  'harga_beli' => str_replace(",","",$this->input->post('k')),
							  'jml_minimal' => $this->input->post('l'),
							  'jml_maksimal' => $this->input->post('m'),
							  'stok' => $this->input->post('q'),
							  'ppn' => $this->input->post('ppn'),
							  'kode_satuan' => $this->input->post('r'),
							  'keterangan_barang' => $this->input->post('n'),
							  'foto_barang' => $hasil['file_name'],
							  'status_jual' => $this->input->post('p'),
							  'id_users' => $this->session->id_users,
							  'waktu_input' => date('Y-m-d H:i:s'));
			}
			$where = array('id_barang' => $this->input->post('id'));
			$this->model_app->update('mu_barang', $data, $where);

			$kategori_pelanggan = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
            foreach ($kategori_pelanggan as $r) {
            	$idp = $r['id_kategori_pelanggan'];
            	$jenis_jual = $this->model_app->view_all_asc('mu_barang_jenis_jual','id_barang_jenis_jual');
            	$no = 0;
            	foreach ($jenis_jual as $j) {
	            	$data = array('id_barang' => $this->input->post('id'),
								  'id_kategori_pelanggan' => $this->input->post('kat')[$idp],
								  'id_jenis_jual' => $j['id_barang_jenis_jual'],
								  'harga' => str_replace(",","",$this->input->post('aa')[$idp][$no]),
								  'persen_beli' => $this->input->post('bb')[$idp][$no],
								  'diskon' => $this->input->post('cc')[$idp][$no],
								  'jumlah' => $this->input->post('dd')[$idp][$no],
								  'satuan' => $this->input->post('ee')[$idp][$no]);
	            	$where = array('id_barang' => $this->input->post('id'),'id_kategori_pelanggan' => $this->input->post('kat')[$idp],'id_jenis_jual' => $j['id_barang_jenis_jual']);
					$this->model_app->update('mu_barang_harga', $data, $where);
	            	$no++;
	            }
            }
			redirect('app/barang');
		}else{
			$proses = $this->model_app->edit('mu_barang', array('id_barang' => $id))->row_array();
			$data = array('row' => $proses);
			$data['kategori_pelanggan'] = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
			$data['kategori'] = $this->model_app->view_all_desc('mu_kategori','id_kategori');
			$data['subkategori'] = $this->model_app->view_where_desc('mu_subkategori',array('id_kategori' => $proses['id_kategori']),'id_subkategori');
			$data['rak'] = $this->model_app->view_all_desc('mu_rak','id_rak');
			$data['satuann'] = $this->model_app->view_all_desc('mu_satuan','kode_satuan');
			$data['kategori_pel'] = $this->model_app->view_where_asc('mu_kategori_pelanggan',array('permanen' => 'n'),'id_kategori_pelanggan');
			$data['conf'] = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
			$this->template->load('app/template','app/mod_barang/view_barang_edit',$data);
		}
	}

	function detail_barang(){
		cek_session_admin();
		$proses = $this->db->query("SELECT a.*, b.nama_kategori, c.nama_subkategori, d.nama_rak FROM `mu_barang` a JOIN mu_kategori b ON a.id_kategori=b.id_kategori
									LEFT JOIN mu_subkategori c ON b.id_kategori=c.id_kategori
									LEFT JOIN mu_rak d ON a.id_rak=d.id_rak where id_barang='".$this->input->post('id')."'")->row_array();
		$data = array('row' => $proses);
		$data['kategori_pelanggan'] = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
		$data['conf'] = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
		$this->load->view('app/mod_barang/view_barang_detail',$data);
	}

	function delete_barang(){
		$id = $this->uri->segment(3);
		$idd = array('id_barang' => $id);
		$this->model_app->delete('mu_barang',$idd);
		redirect('app/barang');
	}


	function promosi(){
		cek_session_admin();
		$data = $this->model_app->view_promosi();
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_barang/view_promosi',$data);
	}

	function tambah_promosi(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			if ($this->input->post('i')=='ya'){
				$bonus = $this->input->post('d');
			}else{
				$bonus = $this->input->post('j');
			}
			$data = array('tgl_mulai' => tgl_standard($this->input->post('a')),
						  'tgl_selesai' => tgl_standard($this->input->post('b')),
						  'kode_terapkan' => $this->input->post('c'),
						  'id_kategori' => $this->input->post('e'),
						  'id_subkategori' => $this->input->post('f'),
						  'beli_barang' => $this->input->post('d'),
						  'jml_beli' => $this->input->post('g'),
						  'bonus_barang' => $bonus,
						  'jml_bonus' => $this->input->post('h'),
						  'jenis_diskon' => $this->input->post('k'),
						  'keterangan' => $this->input->post('p'),
						  'id_users' => $this->session->id_users,
						  'waktu_promosi' => date('Y-m-d H:i:s'));
			$this->model_app->insert('mu_promosi',$data);
			$id = $this->db->insert_id();

			$kategori_pelanggan = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
            $no = 1;
            foreach ($kategori_pelanggan as $r) {
            	$idp = $r['id_kategori_pelanggan'];
            	$dataa = array('id_promosi' => $id,
							  'id_kategori_pelanggan' => $idp,
							  'ecer' => $this->input->post('l')[$idp][$no],
							  'grosir1' => $this->input->post('m')[$idp][$no],
							  'grosir2' => $this->input->post('n')[$idp][$no],
							  'grosir3' => $this->input->post('o')[$idp][$no],);
            	$this->model_app->insert('mu_promosi_detail',$dataa);
            	$no++;
            }
			redirect('app/promosi');
		}else{
			$data['promosi_terapkan'] = $this->model_app->view_all_asc('mu_promosi_terapkan','kode_terapkan');
			$data['barang'] = $this->model_app->view_all_desc('mu_barang','id_barang');
			$data['kategori'] = $this->model_app->view_all_desc('mu_kategori','id_kategori');
			$data['subkategori'] = $this->model_app->view_all_desc('mu_subkategori','id_subkategori');
			$data['kategori_pelanggan'] = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
			$this->template->load('app/template','app/mod_barang/view_promosi_tambah',$data);
		}
	}

	function edit_promosi(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			if ($this->input->post('i')=='ya'){
				$bonus = $this->input->post('d');
			}else{
				$bonus = $this->input->post('j');
			}
			$data = array('tgl_mulai' => tgl_standard($this->input->post('a')),
						  'tgl_selesai' => tgl_standard($this->input->post('b')),
						  'kode_terapkan' => $this->input->post('c'),
						  'id_kategori' => $this->input->post('e'),
						  'id_subkategori' => $this->input->post('f'),
						  'beli_barang' => $this->input->post('d'),
						  'jml_beli' => $this->input->post('g'),
						  'bonus_barang' => $bonus,
						  'jml_bonus' => $this->input->post('h'),
						  'jenis_diskon' => $this->input->post('k'),
						  'keterangan' => $this->input->post('p'),
						  'id_users' => $this->session->id_users,
						  'waktu_promosi' => date('Y-m-d H:i:s'));
			$where = array('id_promosi' => $this->input->post('id'));
			$this->model_app->update('mu_promosi', $data, $where);

			$kategori_pelanggan = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
            $no = 1;
            foreach ($kategori_pelanggan as $r) {
            	$idp = $r['id_kategori_pelanggan'];
            	$dataa = array('ecer' => $this->input->post('l')[$idp][$no],
							  'grosir1' => $this->input->post('m')[$idp][$no],
							  'grosir2' => $this->input->post('n')[$idp][$no],
							  'grosir3' => $this->input->post('o')[$idp][$no],);
            	$where = array('id_promosi' => $this->input->post('id'), 'id_kategori_pelanggan' => $idp);
				$this->model_app->update('mu_promosi_detail', $dataa, $where);
            	$no++;
            }
			redirect('app/promosi');
		}else{
			$data['row'] = $this->model_app->edit('mu_promosi', array('id_promosi' => $id))->row_array();
			$data['promosi_terapkan'] = $this->model_app->view_all_asc('mu_promosi_terapkan','kode_terapkan');
			$data['barang'] = $this->model_app->view_all_desc('mu_barang','id_barang');
			$data['kategori'] = $this->model_app->view_all_desc('mu_kategori','id_kategori');
			$data['subkategori'] = $this->model_app->view_all_desc('mu_subkategori','id_subkategori');
			$data['kategori_pelanggan'] = $this->model_app->view_all_asc('mu_kategori_pelanggan','id_kategori_pelanggan');
			$this->template->load('app/template','app/mod_barang/view_promosi_edit',$data);
		}
	}

	function delete_promosi(){
		$id = $this->uri->segment(3);
		$idd = array('id_promosi' => $id);
		$this->model_app->delete('mu_promosi',$idd);
		redirect('app/promosi');
	}


	function penyesuaian(){
		cek_session_admin();
		$this->session->unset_userdata('id_penyesuaian');
		$data = $this->model_app->view_penyesuaian();
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_penyesuaian/view_penyesuaian',$data);
	}

	function tambah_penyesuaian(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('id_sebab_alasan' => $this->input->post('b'),
						  'tanggal_penyesuaian' => tgl_standard($this->input->post('a')),
						  'keterangan' => $this->input->post('c'),
						  'id_users' => $this->session->id_users,
						  'tanggal_proses' => date('Y-m-d H:i:s'));
			if ($this->session->id_penyesuaian != ''){
				$where = array('id_penyesuaian' => $this->session->id_penyesuaian);
				$this->model_app->update('mu_penyesuaian', $data, $where);
				$id = $this->session->id_penyesuaian;
			}else{
				$this->model_app->insert('mu_penyesuaian',$data);
				$id = $this->db->insert_id();
			}

			$this->session->set_userdata(array('id_penyesuaian'=>$id));

			$dataa = array('id_penyesuaian' => $id,
						  'id_barang' => $this->input->post('d'),
						  'stok_history' => $this->input->post('e'),
						  'tambah' => $this->input->post('g'),
						  'kurang' => $this->input->post('h'),
						  'keterangan' => $this->input->post('i'));
			$this->model_app->insert('mu_penyesuaian_detail',$dataa);

			if ($this->input->post('g')!=''){
				$stok = $this->input->post('g')-$this->input->post('h');
				$this->db->query("UPDATE mu_barang SET stok=stok+$stok where id_barang='".$this->input->post('d')."'");
			}elseif($this->input->post('h')!=''){
				$stok = $this->input->post('h')-$this->input->post('g');
				$this->db->query("UPDATE mu_barang SET stok=stok-$stok where id_barang='".$this->input->post('d')."'");
			}
			redirect('app/tambah_penyesuaian');
		}else{
			if ($this->session->id_penyesuaian != ''){
				$data['row'] = $this->model_app->edit('mu_penyesuaian', array('id_penyesuaian' => $this->session->id_penyesuaian))->row_array();
			}
			$data['sebab_alasan'] = $this->model_app->view_all_asc('mu_sebab_alasan','id_sebab_alasan');
			$data['barang'] = $this->model_app->view_all_desc('mu_barang','id_barang');
			$this->template->load('app/template','app/mod_penyesuaian/view_penyesuaian_tambah',$data);
		}
	}

	function edit_penyesuaian(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit2'])){
			$data = array('id_sebab_alasan' => $this->input->post('b'),
						  'tanggal_penyesuaian' => tgl_standard($this->input->post('a')),
						  'keterangan' => $this->input->post('c'),
						  'id_users' => $this->session->id_users,
						  'tanggal_proses' => date('Y-m-d H:i:s'));
			$where = array('id_penyesuaian' => $this->input->post('id'));
			$this->model_app->update('mu_penyesuaian', $data, $where);
			redirect('app/penyesuaian');

		}elseif (isset($_POST['submit'])){

			$dataa = array('id_penyesuaian' => $this->input->post('id'),
						  'id_barang' => $this->input->post('d'),
						  'stok_history' => $this->input->post('e'),
						  'tambah' => $this->input->post('g'),
						  'kurang' => $this->input->post('h'),
						  'keterangan' => $this->input->post('i'));
			$this->model_app->insert('mu_penyesuaian_detail',$dataa);

			if ($this->input->post('g')!=''){
				$stok = $this->input->post('g')-$this->input->post('h');
				$this->db->query("UPDATE mu_barang SET stok=stok+$stok where id_barang='".$this->input->post('d')."'");
			}elseif($this->input->post('h')!=''){
				$stok = $this->input->post('h')-$this->input->post('g');
				$this->db->query("UPDATE mu_barang SET stok=stok-$stok where id_barang='".$this->input->post('d')."'");
			}
			redirect('app/edit_penyesuaian/'.$this->input->post('id'));
			
		}else{
			$data['sebab_alasan'] = $this->model_app->view_all_asc('mu_sebab_alasan','id_sebab_alasan');
			$data['barang'] = $this->model_app->view_all_desc('mu_barang','id_barang');
			$data['row'] = $this->model_app->edit('mu_penyesuaian', array('id_penyesuaian' => $id))->row_array();
			$this->template->load('app/template','app/mod_penyesuaian/view_penyesuaian_edit',$data);
		}
	}

	function delete_penyesuaian(){
		$id = $this->uri->segment(3);
		$idd = array('id_penyesuaian' => $id);
		$this->model_app->delete('mu_penyesuaian',$idd);
		$this->model_app->delete('mu_penyesuaian_detail',$idd);
		redirect('app/penyesuaian');
	}

	function delete_penyesuaian_detail(){
		$id = $this->uri->segment(4);
		$tambah = $this->uri->segment(5)-$this->uri->segment(6);
		$idd = array('id_penyesuaian_detail' => $id);
		$this->model_app->delete('mu_penyesuaian_detail',$idd);
		$this->db->query("UPDATE mu_barang SET stok=stok-$tambah where id_barang='".$this->uri->segment(7)."'");
		redirect('app/edit_penyesuaian/'.$this->uri->segment(3));
	}

	function delete_penyesuaian_detail2(){
		$id = $this->uri->segment(3);
		$tambah = $this->uri->segment(4)-$this->uri->segment(5);
		$idd = array('id_penyesuaian_detail' => $id);
		$this->model_app->delete('mu_penyesuaian_detail',$idd);
		$this->db->query("UPDATE mu_barang SET stok=stok-$tambah where id_barang='".$this->uri->segment(6)."'");
		redirect('app/tambah_penyesuaian');
	}


	function pembelian(){
		cek_session_admin();
		$this->session->unset_userdata('id_pembelian');
		$data = $this->model_app->view_pembelian();
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_pembelian/view_pembelian',$data);
	}

	function detail_pembelian(){
		cek_session_admin();
		$data = $this->db->query("SELECT c.id_pembelian, c.kode_pembelian, c.tgl_pembelian, a.jml_terima, d.kode_satuan, a.harga_pembelian, (a.jml_terima*a.harga_pembelian) as total FROM `mu_pembelian_terima_detail` a JOIN mu_pembelian_terima b ON a.id_pembelian_terima=b.id_pembelian_terima
							      JOIN mu_pembelian c ON b.id_pembelian=c.id_pembelian
							      JOIN mu_barang d ON a.id_barang=d.id_barang where a.id_barang='".$this->input->post('id')."'");
        $data = array('record' => $data);
		$this->load->view('app/mod_pembelian/view_riwayat_pembelian',$data);
	}

	function pembelian_terima(){
		cek_session_admin();
		$data = $this->model_app->view_pembelian_terima();
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_pembelian/view_pembelian_listterima',$data);
	}

	function tambah_pembelian(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			if (trim($this->input->post('a'))==''){
	        	$kode = $this->db->query("SELECT id_pembelian FROM mu_pembelian ORDER BY id_pembelian DESC LIMIT 1")->row();
				$kode_pembelian = "PO-".sprintf("%06s", $kode->id_pembelian+1);
	        }else{
	        	$kode_pembelian = $this->input->post('a');
	        }
			$data = array('kode_pembelian' => $kode_pembelian,
						  'tgl_kirim' => tgl_standard($this->input->post('b')),
						  'id_karyawan' => $this->input->post('c'),
						  'id_supplier' => $this->input->post('d'),
						  'id_type_bayar' => $this->input->post('e'),
						  'keterangan' => $this->input->post('f'),
						  'tgl_pembelian' => tgl_standard($this->input->post('g')),
						  'tgl_terima' => '0000-00-00',
						  'referensi' => $this->input->post('i'),
						  'kepada_attention' => $this->input->post('j'),
						  'id_users' => $this->session->id_users,
						  'waktu_pembelian' => date('Y-m-d H:i:s'));
			if ($this->session->id_pembelian != ''){
				$where = array('id_pembelian' => $this->session->id_pembelian);
				$this->model_app->update('mu_pembelian', $data, $where);
				$id = $this->session->id_pembelian;
			}else{
				$this->model_app->insert('mu_pembelian',$data);
				$id = $this->db->insert_id();
			}

			$this->session->set_userdata(array('id_pembelian'=>$id));

			$dataa = array('id_pembelian' => $id,
						  'id_barang' => $this->input->post('aa'),
						  'jml_pesan' => $this->input->post('bb'),
						  'harga_pesan' => $this->input->post('dd'));
			$this->model_app->insert('mu_pembelian_detail',$dataa);
			redirect('app/tambah_pembelian');
		}else{
			if ($this->session->id_pembelian != ''){
				$data['row'] = $this->model_app->edit('mu_pembelian', array('id_pembelian' => $this->session->id_pembelian))->row_array();
			}
			$data['karyawan'] = $this->model_app->view_all_asc('mu_karyawan','id_karyawan');
			$data['supplier'] = $this->model_app->view_all_desc('mu_supplier','id_supplier');
			$data['type_bayar'] = $this->model_app->view_all_asc('mu_type_bayar','id_type_bayar');
			$data['barang'] = $this->model_app->view_all_desc('mu_barang','id_barang');
			$this->template->load('app/template','app/mod_pembelian/view_pembelian_tambah',$data);
		}
	}

	function terima_pembelian(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			if (trim($this->input->post('a'))==''){
	        	$kode = $this->db->query("SELECT id_pembelian_terima FROM mu_pembelian_terima ORDER BY id_pembelian_terima DESC LIMIT 1")->row();
				$kode_terima = "TR-".sprintf("%06s", $kode->id_pembelian_terima+1);
	        }else{
	        	$kode_terima = $this->input->post('a');
	        }
			$data = array('id_pembelian' => $this->input->post('id'),
						  'no_pembelian_terima' => $kode_terima,
						  'no_surat_jalan' => $this->input->post('b'),
						  'pengirim_barang' => $this->input->post('c'),
						  'keterangan' => $this->input->post('d'),
						  'tanggal_terima' => tgl_standard($this->input->post('e')),
						  'id_karyawan' => $this->input->post('f'),
						  'id_users' => $this->session->id_users,
						  'waktu_proses' => date('Y-m-d H:i:s'));
			$this->model_app->insert('mu_pembelian_terima',$data);
			$id = $this->db->insert_id();

			$jml_data = count($this->input->post('g'));
			for ($i=1; $i <= $jml_data; $i++){
				$this->db->query("INSERT INTO mu_pembelian_terima_detail VALUES('','$id','".$this->input->post('g')[$i]."','".$this->input->post('h')[$i]."','".$this->input->post('i')[$i]."')");
			}

			redirect('app/pembelian');
		}else{
			$data['karyawan'] = $this->model_app->view_all_asc('mu_karyawan','id_karyawan');
			$data['row'] = $this->model_app->pembelian_detail($id)->row_array();
			$this->template->load('app/template','app/mod_pembelian/view_pembelian_terima',$data);
		}
	}

	function return_pembelian(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_pembelian_terima' => $this->input->post('id'),
						  'no_return' => $this->input->post('a'),
						  'tgl_kirim_return' => tgl_standard($this->input->post('b')),
						  'id_type_bayar' => $this->input->post('c'),
						  'keterangan_return' => $this->input->post('d'),
						  'tanggal_return' => tgl_standard($this->input->post('e')),
						  'id_users' => $this->session->id_users,
						  'waktu_return' => date('Y-m-d H:i:s'));
			$this->model_app->insert('mu_pembelian_return',$data);
			$id = $this->db->insert_id();

			$jml_data = count($this->input->post('f'));
			for ($i=1; $i <= $jml_data; $i++){
				$this->db->query("INSERT INTO mu_pembelian_return_detail VALUES('','$id','".$this->input->post('f')[$i]."','".$this->input->post('h')[$i]."','".$this->input->post('g')[$i]."')");
			}

			redirect('app/pembelian_return');
		}else{
			$data['karyawan'] = $this->model_app->view_all_asc('mu_karyawan','id_karyawan');
			$data['row'] = $this->model_app->pembelian_return($id)->row_array();
			$data['type_bayar'] = $this->model_app->view_all_asc('mu_type_bayar','id_type_bayar');
			$this->template->load('app/template','app/mod_pembelian/view_pembelian_return',$data);
		}
	}

	function pembelian_return(){
		cek_session_admin();
		$data = $this->model_app->view_pembelian_return();
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_pembelian/view_pembelian_listreturn',$data);
	}

	function edit_pembelian_return(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_pembelian_terima' => $this->input->post('id'),
						  'no_return' => $this->input->post('a'),
						  'tgl_kirim_return' => tgl_standard($this->input->post('b')),
						  'id_type_bayar' => $this->input->post('c'),
						  'keterangan_return' => $this->input->post('d'),
						  'tanggal_return' => tgl_standard($this->input->post('e')));
			$where = array('id_pembelian_return' => $this->input->post('id'));
			$this->model_app->update('mu_pembelian_return', $data, $where);
			redirect('app/pembelian_return');
		}else{
			$data['karyawan'] = $this->model_app->view_all_asc('mu_karyawan','id_karyawan');
			$data['type_bayar'] = $this->model_app->view_all_asc('mu_type_bayar','id_type_bayar');
			$data['row'] = $this->model_app->edit_pembelian_return($id)->row_array();
			$this->template->load('app/template','app/mod_pembelian/view_pembelian_return_edit',$data);
		}
	}

	function edit_pembelian(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit2'])){
			$data = array('kode_pembelian' => $this->input->post('a'),
						  'tgl_kirim' => tgl_standard($this->input->post('b')),
						  'id_karyawan' => $this->input->post('c'),
						  'id_supplier' => $this->input->post('d'),
						  'id_type_bayar' => $this->input->post('e'),
						  'keterangan' => $this->input->post('f'),
						  'tgl_pembelian' => tgl_standard($this->input->post('g')),
						  'tgl_terima' => '0000-00-00',
						  'referensi' => $this->input->post('i'),
						  'kepada_attention' => $this->input->post('j'));
			$where = array('id_pembelian' => $this->input->post('id'));
			$this->model_app->update('mu_pembelian', $data, $where);
			redirect('app/pembelian');

		}elseif (isset($_POST['submit'])){

			$dataa = array('id_pembelian' => $this->input->post('id'),
						  'id_barang' => $this->input->post('aa'),
						  'jml_pesan' => $this->input->post('bb'),
						  'harga_pesan' => $this->input->post('dd'));
			$this->model_app->insert('mu_pembelian_detail',$dataa);
			redirect('app/edit_pembelian/'.$this->input->post('id'));

		}else{

			$data['row'] = $this->model_app->edit('mu_pembelian', array('id_pembelian' => $id))->row_array();
			$data['karyawan'] = $this->model_app->view_all_asc('mu_karyawan','id_karyawan');
			$data['supplier'] = $this->model_app->view_all_desc('mu_supplier','id_supplier');
			$data['type_bayar'] = $this->model_app->view_all_asc('mu_type_bayar','id_type_bayar');
			$data['barang'] = $this->model_app->view_all_desc('mu_barang','id_barang');
			$this->template->load('app/template','app/mod_pembelian/view_pembelian_edit',$data);
		}
	}

	function edit_pembelian_terima(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('no_pembelian_terima' => $this->input->post('a'),
						  'no_surat_jalan' => $this->input->post('b'),
						  'pengirim_barang' => $this->input->post('c'),
						  'keterangan' => $this->input->post('d'),
						  'tanggal_terima' => tgl_standard($this->input->post('e')),
						  'id_karyawan' => $this->input->post('f'));

			$where = array('id_pembelian_terima' => $this->input->post('id'));
			$this->model_app->update('mu_pembelian_terima', $data, $where);
			redirect('app/pembelian_terima');
		}else{
			$data['karyawan'] = $this->model_app->view_all_asc('mu_karyawan','id_karyawan');
			$data['row'] = $this->model_app->pembelian_detail_edit($id)->row_array();
			$this->template->load('app/template','app/mod_pembelian/view_pembelian_terima_edit',$data);
		}
	}

	function print_pembelian(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		$data['row'] = $this->model_app->pembelian_detail($id)->row_array();
		$data['rows'] = $this->model_app->view_one_address('mu_conf_perusahaan',array('id_perusahaan' => 1),'id_perusahaan')->row_array();
		$this->load->view('app/mod_pembelian/print_pembelian',$data);
	}

	function print_pembelian_terima(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		$data['row'] = $this->model_app->pembelian_return($id)->row_array();
		$data['rows'] = $this->model_app->view_one_address('mu_conf_perusahaan',array('id_perusahaan' => 1),'id_perusahaan')->row_array();
		$this->load->view('app/mod_pembelian/print_pembelian_terima',$data);
	}

	function print_pembelian_return(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		$data['row'] = $this->model_app->pembelian_return_detail($id)->row_array();
		$data['rows'] = $this->model_app->view_one_address('mu_conf_perusahaan',array('id_perusahaan' => 1),'id_perusahaan')->row_array();
		$this->load->view('app/mod_pembelian/print_pembelian_return',$data);
	}

	function delete_pembelian(){
		$id = $this->uri->segment(3);
		$idd = array('id_pembelian' => $id);
		$this->model_app->delete('mu_pembelian',$idd);
		$this->model_app->delete('mu_pembelian_detail',$idd);
		redirect('app/pembelian');
	}

	function delete_pembelian_detail(){
		$id = $this->uri->segment(3);
		$idd = array('id_pembelian_detail' => $id);
		$this->model_app->delete('mu_pembelian_detail',$idd);
		redirect('app/edit_pembelian/'.$this->uri->segment(4));
	}

	function barcode(){
		cek_session_admin();
		$data = $this->model_app->view_barang();
		$dataa = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
        $data = array('record' => $data, 'conf' => $dataa);
		$this->template->load('app/template','app/mod_barcode/view_barang',$data);
	}

	function barcode_proses(){
		$this->load->view('app/mod_barcode/barcode_view');
    }

    function set_barcode($code){
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
    }

    function transaksi_penjualan_autosave(){
    	$dataa = array('id_pelanggan' => $this->input->post('id_pelanggan'),
					  'id_type_bayar' => $this->input->post('id_type_bayar'),
					  'id_agen_ekspedisi' => $this->input->post('expedisi'),
					  'no_resi' => $this->input->post('no_resi'),
					  'biaya_kirim' => str_replace(",","",$this->input->post('biaya_kirim')),
					  'diskon_persen' => $this->input->post('diskon_expedisi'),
					  'diskon_rupiah' => str_replace(",","",$this->input->post('diskon_kirim')),
					  'diskon_belanja' => str_replace(",","",$this->input->post('diskon_belanja')),
					  'gratis_kirim' => $this->input->post('gratis_biaya'),
					  'jumlah_bayar' => str_replace(",","",$this->input->post('jumlah_bayar')),
					  'keterangan' => $this->input->post('keterangan'));
		$where = array('id_transaksi' => $this->session->id_transaksi);
		$this->model_app->update('mu_transaksi', $dataa, $where);
    }

    function transaksi_penjualan_autosave_keranjang(){
    	$dataa = array('jumlah_jual' => $this->input->post('jumlah_jual'),
					   'kode_satuan' => $this->input->post('kode_satuan'));
		$where = array('id_transaksi_detail' => $this->input->post('id_transaksi_detail'));
		$this->model_app->update('mu_transaksi_detail', $dataa, $where);
    }

    function update_keranjang(){
    	for($i=1;$i<=count($_POST['id']);$i++){
    		$cek = $this->db->query("SELECT * FROM `mu_barang_harga` where id_barang='".$this->input->post('idb')[$i]."' AND id_kategori_pelanggan='".$this->input->post('ikp')[$i]."' AND satuan='".$this->input->post('satuan')[$i]."'")->row_array();
	    	$ck = $this->db->query("SELECT * FROM `mu_transaksi_detail` where id_barang='".$this->input->post('idb')[$i]."' AND id_transaksi='".$this->session->id_transaksi."'")->row_array();
	    	$stok = $this->model_app->stok($this->input->post('idb')[$i])->row_array();
	    	$jmlbeli = ($this->input->post('jml')[$i]-($ck['jumlah_jual']*$ck['jumlah_satuan']))*$cek['jumlah'];
	    	$brg = $this->db->query("SELECT nama_barang FROM mu_barang where id_barang='".$this->input->post('idb')[$i]."'")->row_array();
	    	if ($stok['stok']>=$jmlbeli){
		    	$dataa = array('jumlah_jual' => $this->input->post('jml')[$i],
							   'kode_satuan' => $this->input->post('satuan')[$i],
							   'jumlah_satuan' => $cek['jumlah'],
							   'diskon_jual' => $cek['diskon'],
							   'harga_jual' => $cek['harga']);
				$where = array('id_transaksi_detail ' => $this->input->post('id')[$i]);
				$this->model_app->update('mu_transaksi_detail', $dataa, $where);
				$this->model_app->cek_promosi_barang_update($this->input->post('idb')[$i],$this->session->id_transaksi,$this->input->post('jml')[$i],$this->input->post('ikp')[$i],$this->input->post('satuan')[$i],$cek['id_jenis_jual']);
				
			}
		}
		redirect('app/transaksi_penjualan');
    }

    function total_bayar(){
    	$data['status'] = 'total_bayar';
    	$this->load->view('app/mod_penjualan/view_bayar',$data);
    }

    function uang_kembali(){
    	$data['status'] = 'uang_kembali';
    	$this->load->view('app/mod_penjualan/view_bayar',$data);
    }

    function sub_total(){
    	$data['status'] = 'sub_total';
    	$this->load->view('app/mod_penjualan/view_bayar',$data);
    }

    function transaksi_penjualan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$dataa = array('id_pelanggan' => $this->input->post('id_pelanggan'),
						  'id_type_bayar' => $this->input->post('id_type_bayar'),
						  'id_agen_ekspedisi' => $this->input->post('expedisi'),
						  'no_resi' => $this->input->post('no_resi'),
						  'biaya_kirim' => $this->input->post('biaya_kirim'),
						  'diskon_persen' => $this->input->post('diskon_expedisi'),
						  'diskon_rupiah' => $this->input->post('diskon_kirim'),
						  'diskon_belanja' => $this->input->post('diskon_belanja'),
						  'gratis_kirim' => $this->input->post('gratis_biaya'),
						  'jumlah_bayar' => $this->input->post('jumlah_bayar'),
						  'keterangan' => $this->input->post('keterangan'));
			$where = array('id_transaksi' => $this->session->id_transaksi);
			$this->model_app->update('mu_transaksi', $dataa, $where);
			$trx = $this->db->query("SELECT * FROM mu_barang_harga where id_kategori_pelanggan='1' AND id_jenis_jual='1' AND id_barang='".$this->input->post('a')."'")->row_array();
			$stok = $this->model_app->stok($this->input->post('a'))->row_array();
	    	$brg = $this->db->query("SELECT nama_barang FROM mu_barang where id_barang='".$this->input->post('a')."'")->row_array();
	    	if ($stok['stok']<1){
	    		echo "<script>window.alert('Maaf, Stok untuk $brg[nama_barang] Telah habis...');
		                                  window.location=('".base_url()."app/transaksi_penjualan')</script>";
	    	}else{
	    		$this->model_app->cek_promosi_barang($this->input->post('a'),$this->session->id_transaksi);
				$cekkeranjang = $this->db->query("SELECT * FROM mu_transaksi_detail where id_transaksi='".$this->session->id_transaksi."' AND id_barang='".$this->input->post('a')."' AND status='1'");
				if ($cekkeranjang->num_rows()>=1){
					$rowk = $cekkeranjang->row_array();
					$totkeranjang = $rowk['jumlah_jual']+1;
					$dataa = array('jumlah_jual' => $totkeranjang);
					$where = array('id_transaksi' => $this->session->id_transaksi, 'id_barang'=>$this->input->post('a'));
					$this->model_app->update('mu_transaksi_detail', $dataa, $where);
				}else{
					$dataa = array('id_transaksi' => $this->session->id_transaksi,
								  'id_barang' => $this->input->post('a'),
								  'jumlah_jual' => '1',
								  'kode_satuan' => $trx['satuan'],
								  'jumlah_satuan' => $trx['jumlah'],
								  'diskon_jual' => $trx['diskon'],
								  'harga_jual' => $trx['harga']);
					$this->model_app->insert('mu_transaksi_detail',$dataa);
				}
				redirect('app/transaksi_penjualan');
			}
		}else{
			if ($this->uri->segment(3)!=''){
				$this->session->set_userdata(array('id_transaksi'=>$this->uri->segment(3),'transaksi_tunggu'=>'1'));
			}else{
				if ($this->session->transaksi_tunggu == ''){
					$cek = $this->db->query("SELECT id_transaksi FROM mu_transaksi where status='proses' AND id_karyawan='".$this->session->id_users."'");
					if ($cek->num_rows()=='1'){
						$row = $cek->row_array();
						$this->session->set_userdata(array('id_transaksi'=>$row['id_transaksi']));
					}else{
						if ($this->session->id_transaksi == ''){
					        $kode = $this->db->query("SELECT id_transaksi FROM mu_transaksi ORDER BY id_transaksi DESC LIMIT 1")->row();
							$kode_transaksi = "TRX-".sprintf("%07s", $kode->id_transaksi+1);
						   	$dataa = array('kode_transaksi' => $kode_transaksi,
						   				  'id_pelanggan' => '0',
										  'id_type_bayar' => '1',
										  'id_agen_ekspedisi' => '0',
										  'no_resi' => '',
										  'biaya_kirim' => '0',
										  'diskon_persen' => '0',
										  'diskon_rupiah' => '0',
										  'diskon_belanja' => '0',
										  'gratis_kirim' => '',
										  'jumlah_bayar' => '0',
										  'keterangan' => '',
										  'id_karyawan' => $this->session->id_users,
										  'waktu_proses' => date('Y-m-d H:i:s'));
							$this->model_app->insert('mu_transaksi',$dataa);
							$id_transaksi = $this->db->insert_id();
							$this->session->set_userdata(array('id_transaksi'=>$id_transaksi));
						}
					}
				}
			}


			$data['barang'] = $this->model_app->view_all_desc('mu_barang','id_barang');
			$data['agen_ekspedisi'] = $this->model_app->view_all_asc('mu_agen_ekspedisi','id_agen_ekspedisi');
			$data['type_bayar'] = $this->model_app->view_all_asc('mu_type_bayar','id_type_bayar');
			$data['pelanggan'] = $this->model_app->view_join_satu('mu_pelanggan','mu_kategori_pelanggan','id_kategori_pelanggan');
			$data['row'] = $this->model_app->view_join_where('mu_transaksi','mu_pelanggan','id_pelanggan', array('id_transaksi' => $this->session->id_transaksi),'id_transaksi','DESC')->row_array();
			$this->template->load('app/template','app/mod_penjualan/view_penjualan',$data);
		}
	}

	function transaksi_penjualan_print(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		$data['row'] = $this->db->query("SELECT a.*, b.id_pelanggan, b.nama_pelanggan, c.nama_karyawan FROM mu_transaksi a LEFT JOIN mu_pelanggan b ON a.id_pelanggan=b.id_pelanggan JOIN mu_karyawan c ON a.id_karyawan=c.id_karyawan where a.id_transaksi='$id'")->row_array();
		$data['rows'] = $this->model_app->view_one_address('mu_conf_perusahaan',array('id_perusahaan' => 1),'id_perusahaan')->row_array();
		$this->load->view('app/mod_penjualan/print_penjualan',$data);
	}

	function transaksi_penjualan_tunggu(){
		cek_session_admin();
		$data = $this->model_app->view_join_three('mu_transaksi','mu_pelanggan','mu_karyawan','id_pelanggan','id_karyawan',array('status'=>'tunggu'),'id_transaksi');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_penjualan/view_penjualan_tunggu',$data);
	}

	function transaksi_sekarang(){
		$this->session->unset_userdata('id_transaksi');
		$this->session->unset_userdata('transaksi_tunggu');
		redirect('app/transaksi_penjualan');
	}

	function transaksi_batal(){
		$id = array('id_transaksi' => $this->uri->segment(3));
		$this->model_app->delete('mu_transaksi',$id);
		$this->model_app->delete('mu_transaksi_detail',$id);
		$this->session->unset_userdata('id_transaksi');
		$this->session->unset_userdata('transaksi_tunggu');
		redirect('app/transaksi_penjualan');
	}

	function transaksi_penjualan_hapus(){
		$id = array('id_transaksi' => $this->uri->segment(3));
		$this->model_app->delete('mu_transaksi',$id);
		$this->model_app->delete('mu_transaksi_detail',$id);
		redirect('app/list_transaksi_penjualan');
	}

	function transaksi_selesai(){
		$dataa = array('status' => 'selesai');
		$where = array('id_transaksi' => $this->uri->segment(3));
		$this->model_app->update('mu_transaksi', $dataa, $where);

		$cek = $this->db->query("SELECT if (b.jumlah_bayar>=sum(((a.jumlah_jual*a.jumlah_satuan)*a.harga_jual)-a.diskon_jual),sum(((a.jumlah_jual*a.jumlah_satuan)*a.harga_jual)-a.diskon_jual),0)  as total, b.keterangan FROM `mu_transaksi_detail` a JOIN mu_transaksi b ON a.id_transaksi=b.id_transaksi where a.id_transaksi='".$this->uri->segment(3)."'")->row_array();
		$data = array('id_pendapatan_sub' => 1, 
					  'tanggal' => date('Y-m-d'),
					  'jumlah_uang' => $cek['total'],
					  'keterangan' => $cek['keterangan'],
					  'id_karyawan' => $this->session->id_users,
					  'waktu_proses' => date('Y-m-d H:i:s'));
		$this->model_app->insert('mu_pendapatan_list',$data);

		$this->session->unset_userdata('id_transaksi');
		$this->session->unset_userdata('transaksi_tunggu');
		redirect('app/transaksi_penjualan');
	}

	function transaksi_tunggu(){
		$dataa = array('status' => 'tunggu');
		$where = array('id_transaksi' => $this->uri->segment(3));
		$this->model_app->update('mu_transaksi', $dataa, $where);
		$this->session->unset_userdata('id_transaksi');
		$this->session->unset_userdata('transaksi_tunggu');
		redirect('app/transaksi_penjualan');
	}

	function delete_transaksi_barang(){
		$id = array('id_transaksi_detail' => $this->uri->segment(3));
		$this->model_app->delete('mu_transaksi_detail',$id);
		redirect('app/transaksi_penjualan');
	}

	function transaksi_return_penjualan(){
		$data['type_bayar'] = $this->model_app->view_all_asc('mu_type_bayar','id_type_bayar');
		$proses = $this->db->query("SELECT * FROM mu_transaksi_return where status='proses'");
		if ($proses->row_array()>=1){
			$rows = $proses->row_array();
			$this->session->set_userdata(array('id_return'=>$rows['id_transaksi_return'],'id_transaksi_return'=>$rows['id_transaksi']));
		}else{
			if (isset($_POST['submit'])){
				$cek = $this->db->query("SELECT * FROM mu_transaksi where id_transaksi='".$this->input->post('a')."'");
				if ($cek->num_rows()>=1){
					if ($this->session->id_return == ''){
					   $dataa = array('id_transaksi' => $this->input->post('a'),
									  'id_type_bayar' => '1',
									  'bayar_return' => '0',
									  'ket_return' => '',
									  'id_karyawan' => $this->session->id_users,
									  'waktu_return' => date('Y-m-d H:i:s'));
						$this->model_app->insert('mu_transaksi_return',$dataa);
						$id_return = $this->db->insert_id();
						$this->session->set_userdata(array('id_return'=>$id_return));
					}
					$this->session->set_userdata(array('id_transaksi_return'=>$this->input->post('a')));
				}else{
					echo "<script>window.alert('Maaf, No Faktur Tidak Ditemukan');
		                                  window.location=('".base_url()."app/transaksi_return_penjualan')</script>";
				}
			}
		}

		$this->template->load('app/template','app/mod_penjualan/view_penjualan_return',$data);
	}

	function update_return_penjualan(){
    	for($i=1;$i<=count($_POST['id']);$i++){
    		$cek = $this->db->query("SELECT * FROM mu_transaksi_return_detail where id_transaksi_return='".$this->session->id_return."' AND id_transaksi_detail='".$this->input->post('id')[$i]."'");
    		if ($cek->num_rows()>='1'){
    			$dataa = array('id_transaksi_return' => $this->session->id_return,
	    					   'id_transaksi_detail' => $this->input->post('id')[$i],
							   'jumlah_return' => $this->input->post('jml')[$i]);
				$where = array('id_transaksi_return'=>$this->session->id_return,'id_transaksi_detail' => $this->input->post('id')[$i]);
				$this->model_app->update('mu_transaksi_return_detail', $dataa, $where);
    		}else{
    			if ($this->input->post('jml')[$i] != '0'){
		    		$dataa = array('id_transaksi_return' => $this->session->id_return,
		    					   'id_transaksi_detail' => $this->input->post('id')[$i],
								   'jumlah_return' => $this->input->post('jml')[$i]);
					$this->model_app->insert('mu_transaksi_return_detail',$dataa);
				}
			}
		}
		redirect('app/transaksi_return_penjualan');
    }

    function transaksi_penjualan_return_autosave(){
    	$dataa = array('id_type_bayar' => $this->input->post('id_type_bayar'),
						  'bayar_return' => $this->input->post('bayar_return'),
						  'ket_return' => $this->input->post('ket_return'));
		$where = array('id_transaksi_return' => $this->session->id_return);
		$this->model_app->update('mu_transaksi_return', $dataa, $where);
    }

    function uang_kembali_return(){
    	$data['status'] = 'uang_kembali_return';
    	$this->load->view('app/mod_penjualan/view_bayar_return',$data);
    }

    function total_bayar_return(){
    	$data['status'] = 'total_bayar_return';
    	$this->load->view('app/mod_penjualan/view_bayar_return',$data);
    }

    function transaksi_return_batal(){
		$id = array('id_transaksi_return' => $this->uri->segment(3));
		$this->model_app->delete('mu_transaksi_return',$id);
		$this->model_app->delete('mu_transaksi_return_detail',$id);
		$this->session->unset_userdata('id_return');
		$this->session->unset_userdata('id_transaksi_return');
		redirect('app/transaksi_return_penjualan');
	}

	function transaksi_return_hapus(){
		$id = array('id_transaksi' => $this->uri->segment(3));
		$this->model_app->delete('mu_transaksi_return',$id);
		$this->model_app->delete('mu_transaksi_return_detail',$id);
		redirect('app/list_transaksi_return');
	}

	function transaksi_return_selesai(){
		$dataa = array('status' => 'selesai');
		$where = array('id_transaksi_return' => $this->uri->segment(3));
		$this->model_app->update('mu_transaksi_return', $dataa, $where);
		$cek = $this->db->query("SELECT bayar_return, ket_return FROM mu_transaksi_return where id_transaksi_return='".$this->uri->segment(3)."'")->row_array();
		
		$data = array('id_bebanbiaya_sub' => 6, 
					  'tanggal' => date('Y-m-d'),
					  'jumlah_uang' => $cek['bayar_return'],
					  'keterangan' => $cek['ket_return'],
					  'id_karyawan' => $this->session->id_users,
					  'waktu_proses' => date('Y-m-d H:i:s'));
		$this->model_app->insert('mu_bebanbiaya_list',$data);

		$this->session->unset_userdata('id_return');
		$this->session->unset_userdata('id_transaksi_return');
		redirect('app/transaksi_return_penjualan');
	}

	function list_transaksi_penjualan(){
		cek_session_admin();
		$data = $this->model_app->list_transaksi_penjualan('selesai');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_penjualan/view_list_penjualan',$data);
	}

	function list_transaksi_return(){
		cek_session_admin();
		$data = $this->model_app->list_transaksi_return('selesai');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_penjualan/view_list_return',$data);
	}


	function bebanbiaya(){
		cek_session_admin();
		$data = $this->model_app->view_join_satu('mu_bebanbiaya_list','mu_bebanbiaya_sub','id_bebanbiaya_sub');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_bebanbiaya/view_bebanbiaya',$data);
	}

	function tambah_bebanbiaya(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('id_bebanbiaya_sub' => $this->input->post('a'), 
						  'tanggal' => tgl_standard($this->input->post('b')),
						  'jumlah_uang' => $this->input->post('c'),
						  'keterangan' => $this->input->post('d'),
						  'id_karyawan' => $this->session->id_users,
						  'waktu_proses' => date('Y-m-d H:i:s'));
			$this->model_app->insert('mu_bebanbiaya_list',$data);
			redirect('app/bebanbiaya');
		}else{
			$data['beban_biaya'] = $this->model_app->view_all_asc('mu_bebanbiaya_main','id_bebanbiaya_main');
			$this->template->load('app/template','app/mod_bebanbiaya/view_bebanbiaya_tambah',$data);
		}
	}

	function edit_bebanbiaya(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_bebanbiaya_sub' => $this->input->post('a'), 
						  'tanggal' => tgl_standard($this->input->post('b')),
						  'jumlah_uang' => $this->input->post('c'),
						  'keterangan' => $this->input->post('d'));
	    	$where = array('id_bebanbiaya_list' => $this->input->post('id'));
			$this->model_app->update('mu_bebanbiaya_list', $data, $where);
			redirect('app/bebanbiaya');
		}else{
			$proses = $this->model_app->edit('mu_bebanbiaya_list', array('id_bebanbiaya_list' => $id))->row_array();
			$data = array('row' => $proses);
			$data['beban_biaya'] = $this->model_app->view_all_asc('mu_bebanbiaya_main','id_bebanbiaya_main');
			$this->template->load('app/template','app/mod_bebanbiaya/view_bebanbiaya_edit',$data);
		}
	}

	function delete_bebanbiaya($id){
		$id = array('id_bebanbiaya_list' => $id);
		$this->model_app->delete('mu_bebanbiaya_list',$id);
		redirect('app/bebanbiaya');
	}


	function pendapatan(){
		cek_session_admin();
		$data = $this->model_app->view_join_satu('mu_pendapatan_list','mu_pendapatan_sub','id_pendapatan_sub');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_pendapatan/view_pendapatan',$data);
	}

	function tambah_pendapatan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('id_pendapatan_sub' => $this->input->post('a'), 
						  'tanggal' => tgl_standard($this->input->post('b')),
						  'jumlah_uang' => $this->input->post('c'),
						  'keterangan' => $this->input->post('d'),
						  'id_karyawan' => $this->session->id_users,
						  'waktu_proses' => date('Y-m-d H:i:s'));
			$this->model_app->insert('mu_pendapatan_list',$data);
			redirect('app/pendapatan');
		}else{
			$data['pendapatan'] = $this->model_app->view_all_asc('mu_pendapatan_main','id_pendapatan_main');
			$this->template->load('app/template','app/mod_pendapatan/view_pendapatan_tambah',$data);
		}
	}

	function edit_pendapatan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_pendapatan_sub' => $this->input->post('a'), 
						  'tanggal' => tgl_standard($this->input->post('b')),
						  'jumlah_uang' => $this->input->post('c'),
						  'keterangan' => $this->input->post('d'));
	    	$where = array('id_pendapatan_list' => $this->input->post('id'));
			$this->model_app->update('mu_pendapatan_list', $data, $where);
			redirect('app/pendapatan');
		}else{
			$proses = $this->model_app->edit('mu_pendapatan_list', array('id_pendapatan_list' => $id))->row_array();
			$data = array('row' => $proses);
			$data['pendapatan'] = $this->model_app->view_all_asc('mu_pendapatan_main','id_pendapatan_main');
			$this->template->load('app/template','app/mod_pendapatan/view_pendapatan_edit',$data);
		}
	}

	function delete_pendapatan($id){
		$id = array('id_pendapatan_list' => $id);
		$this->model_app->delete('mu_pendapatan_list',$id);
		redirect('app/pendapatan');
	}

	function perkiraan(){
		cek_session_admin();
		$this->template->load('app/template','app/mod_perkiraan/view_perkiraan');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('app');
	}
}
