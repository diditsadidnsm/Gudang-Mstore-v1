<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
	function barang(){
		cek_session_admin();
		$data['judul'] = 'Laporan Barang';
		$data = $this->model_laporan->view_barang();
        $dataa = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
        $data = array('record' => $data, 'conf' => $dataa);
		$this->template->load('app/template','app/mod_laporan/view_barang',$data);
	}

	function jumlah_minimal(){
		cek_session_admin();
		$data['judul'] = 'Laporan Barang Jumlah Minimal';
		$data = $this->model_laporan->view_jumlah_minimal();
        $dataa = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
        $data = array('record' => $data, 'conf' => $dataa);
		$this->template->load('app/template','app/mod_laporan/view_jumlah_minimal',$data);
	}

	function tidak_terjual(){
		cek_session_admin();
		$data['judul'] = 'Laporan Barang Tidak Terjual';
		$data = $this->model_laporan->view_tidak_terjual();
        $dataa = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
        $data = array('record' => $data, 'conf' => $dataa);
		$this->template->load('app/template','app/mod_laporan/view_tidak_terjual',$data);
	}

	function penyesuaian(){
		cek_session_admin();
		$data['judul'] = 'Laporan Penyesuaian Barang';
		$data = $this->model_laporan->view_penyesuaian();
        $dataa = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
        $data = array('record' => $data, 'conf' => $dataa);
		$this->template->load('app/template','app/mod_laporan/view_penyesuaian',$data);
	}

	function promosi_barang(){
		cek_session_admin();
		$data['judul'] = 'Laporan Penyesuaian Barang';
		$data = $this->model_laporan->view_promosi_barang();
        $dataa = $this->model_app->view_one('mu_conf_barang',array('id_conf_barang' => 1),'id_conf_barang')->row_array();
        $data = array('record' => $data, 'conf' => $dataa);
		$this->template->load('app/template','app/mod_laporan/view_promosi_barang',$data);
	}


	function penjualan(){
		cek_session_admin();
		$data['judul'] = 'Laporan Penjualan';
		$data['record'] = $this->model_laporan->view_penjualan('selesai');
		$this->template->load('app/template','app/mod_laporan/view_penjualan',$data);
	}

	function penjualan_perbarang(){
		cek_session_admin();
		$data['judul'] = 'Laporan Penjualan Per-barang';
		$data['record'] = $this->model_laporan->view_penjualan_perbarang('selesai');
		$this->template->load('app/template','app/mod_laporan/view_penjualan_perbarang',$data);
	}

	function penjualan_barang_terlaris(){
		cek_session_admin();
		$data['judul'] = 'Laporan Penjualan barang Terlaris';
		$data['record'] = $this->model_laporan->view_penjualan_barang_terlaris();
		$this->template->load('app/template','app/mod_laporan/view_penjualan_barang_terlaris',$data);
	}

	function pelanggan_tersering(){
		cek_session_admin();
		$data['judul'] = 'Laporan Penjualan barang Terlaris';
		$data['record'] = $this->model_laporan->view_pelanggan_tersering();
		$this->template->load('app/template','app/mod_laporan/view_pelanggan_tersering',$data);
	}


	function satuan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_satuan','kode_satuan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_satuan',$data);
	}

	function rak(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_rak','id_rak');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_rak',$data);
	}

	function kategori(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_kategori','id_kategori');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_kategori',$data);
	}

	function subkategori(){
		cek_session_admin();
		$data = $this->model_app->view_join('mu_subkategori','mu_kategori','id_kategori','id_subkategori');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_subkategori',$data);
	}

	function kategori_pelanggan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_kategori_pelanggan','id_kategori_pelanggan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_kategori_pelanggan',$data);
	}

	function agen_ekspedisi(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_agen_ekspedisi','id_agen_ekspedisi');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_agen_ekspedisi',$data);
	}

	function sebab_alasan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_sebab_alasan','id_sebab_alasan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_sebab_alasan',$data);
	}

	function negara(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_country','country_id');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_negara',$data);
	}

	function provinsi(){
		cek_session_admin();
		$data = $this->model_app->view_join_provinsi('state_id');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_provinsi',$data);
	}

	function kota(){
		cek_session_admin();
		$data = $this->model_app->view_join_kota('city_id');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_kota',$data);
	}

	function pendidikan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_pendidikan','id_pendidikan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_pendidikan',$data);
	}

	function bahasa(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('mu_bahasa','id_bahasa');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_bahasa',$data);
	}

	function supplier(){
		cek_session_admin();
		$data = $this->model_app->view_address('mu_supplier','id_supplier');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_supplier',$data);
	}

	function pelanggan(){
		cek_session_admin();
		$data = $this->model_app->view_join_city('mu_pelanggan','mu_kategori_pelanggan','id_kategori_pelanggan','id_pelanggan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_pelanggan',$data);
	}

	function karyawan(){
		cek_session_admin();
		$data = $this->model_app->view_join_city('mu_karyawan','mu_jabatan','id_jabatan','id_karyawan');
        $data = array('record' => $data);
		$this->template->load('app/template','app/mod_laporan/view_karyawan',$data);
	}


}
