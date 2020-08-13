<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelanggan extends CI_Controller {
function index(){
	cek_session_admin();
	$data = $this->model_app->view_join_city('mu_pelanggan','mu_kategori_pelanggan','id_kategori_pelanggan','id_pelanggan');
    $data = array('record' => $data);
	$this->load->view('app/mod_pelanggan/view_pelanggan_popup',$data);
}

function tambah_pelanggan_popup(){
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
		redirect('last;pelanggan');
	}else{
		$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
		$data['kategori_pelanggan'] = $this->model_app->view_all_desc('mu_kategori_pelanggan','id_kategori_pelanggan');
		$data['type_pelanggan'] = $this->model_app->view_all_desc('mu_type_pelanggan','id_type_pelanggan');
		$this->load->view('app/mod_pelanggan/view_pelanggan_tambah_popup', $data);
	}
}

function edit_pelanggan_popup(){
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
		redirect('pelanggan');
	}else{
		$proses = $this->model_app->edit('mu_pelanggan', array('id_pelanggan' => $id))->row_array();
		$data = array('row' => $proses);

		$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
		$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
		$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
		$data['kategori_pelanggan'] = $this->model_app->view_all_desc('mu_kategori_pelanggan','id_kategori_pelanggan');
		$data['type_pelanggan'] = $this->model_app->view_all_desc('mu_type_pelanggan','id_type_pelanggan');
		$this->load->view('app/mod_pelanggan/view_pelanggan_edit_popup',$data);
	}
}

function delete_pelanggan_popup(){
	$id = $this->uri->segment(3);
	$idd = array('id_pelanggan' => $id);
	$this->model_app->delete('mu_pelanggan',$idd);
	redirect('pelanggan');
}
}