<?php 
class Model_users extends CI_model{
    function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
    }
    
	function users(){
		return $this->db->query("SELECT * FROM mu_users");
	}

	function users_tambah(){
        $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                        'password'=>md5($this->input->post('b')),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                        'email'=>$this->db->escape_str($this->input->post('d')),
                        'no_telp'=>$this->db->escape_str($this->input->post('e')),
                        'level'=>'user',
                        'blokir'=>'N',
                        'id_session'=>md5($this->input->post('a')));
        $this->db->insert('users',$datadb);
    }

    function users_edit($id){
        return $this->db->query("SELECT * FROM mu_users where username='$id'");
    }

    function users_update(){
        $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                        'password'=>md5($this->input->post('b')),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                        'email'=>$this->db->escape_str($this->input->post('d')),
                        'no_telp'=>$this->db->escape_str($this->input->post('e')),
                        'blokir'=>$this->db->escape_str($this->input->post('h')),
                        'id_session'=>md5($this->input->post('a')));
        $this->db->where('username',$this->input->post('id'));
        $this->db->update('users',$datadb);
    }

    function users_delete($id){
        return $this->db->query("DELETE FROM users where username='$id'");
    }

}