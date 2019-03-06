<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertNguoidung($username, $password, $email)
	{
		$obj = [
			'username' => $username,
			'password' => $password,
			'email' => $email
		];

		$this->db->insert('nguoidung', $obj);
		return $this->db->insert_id();
	}
	public function getAllNguoidung(){
		$this->db->select('*');
		$data = $this->db->get('nguoidung');
		return $data = $data->result_array();
	}
	public function getNguoidungById($idnguoidung){
		$this->db->select('*');
		$this->db->where('id', $idnguoidung);
		$data = $this->db->get('nguoidung');
		return $data = $data->result_array();
	}
	public function updateNguoidung($id,$username,$password,$email){
		$data = [
			'id' => $id,
			'username' => $username,
			'password' => $password,
			'email' => $email
		];
		$this->db->where('id', $id);
		return $this->db->update('nguoidung', $data);
	}
	public function deleteNguoidung($idnguoidung){
		$this->db->where('id', $idnguoidung);
		return $this->db->delete('nguoidung');
	}
	public function kiemtradangnhap($email, $password){
		$this->db->select('email, password');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$data = $this->db->get('nguoidung');
		return $data = $data->result_array();
	}
	public function getPasswordByEmail($email)
	{
		$this->db->select('*');
		$this->db->where('email', $email);
		$data = $this->db->get('nguoidung');
		$data = $data->result_array();

		return $result = $data[0]['password'];
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */