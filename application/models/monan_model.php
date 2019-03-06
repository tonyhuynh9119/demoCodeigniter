<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class monan_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function loadAllMonAn()
	{
		$this->db->select('*');
		$data = $this->db->get('monan');
		return $data = $data->result_array();
	}
	public function addMonAn($anh,$ten,$gia,$mota,$iddanhmuc,$new)
	{
		$obj = [
			'anh'=>$anh,
			'ten'=>$ten,
			'gia'=>$gia,
			'mota'=>$mota,
			'iddanhmuc'=>$iddanhmuc,
			'new'=>$new
		];
		$this->db->insert('monan', $obj);
		return $this->db->insert_id();
	}
	public function getIdByMonAn($idMonAn)
	{
		$this->db->select('*');
		$this->db->where('id', $idMonAn);
		$data = $this->db->get('monan');
		return $data = $data->result_array();;	
	}
	public function getNameDanhMucByMonAn($idMonAn)
	{
		$this->db->select('*');
		$this->db->from('danhmucmonan');
		$this->db->join('monan', 'monan.iddanhmuc = danhmucmonan.id', 'left');
		$this->db->where('monan.id', $idMonAn);
		$data = $this->db->get();
		$data = $data->result_array();

		return $result = $data[0]['tendanhmuc'];
	}
	public function updateMonAn($id,$anh,$ten,$gia,$mota,$iddanhmuc,$new)
	{
		$obj = [
			'id' =>$id,
			'anh' =>$anh,
			'ten' =>$ten,
			'gia' =>$gia,
			'mota' =>$mota,
			'iddanhmuc' =>$iddanhmuc,
			'new' =>$new
		];

		$this->db->where('id', $id);
		return $this->db->update('monan', $obj);
	}
	public function deleteMonAn($idmonan)
	{
		$this->db->where('id', $idmonan);
		return $this->db->delete('monan');
	}
	public function getMonAnByDanhMuc($iddanhmuc)
	{
		$this->db->select('*');
		$this->db->from('danhmucmonan');
		$this->db->join('monan', 'monan.iddanhmuc = danhmucmonan.id', 'left');
		$this->db->where('monan.iddanhmuc', $iddanhmuc);
		$data = $this->db->get();
		return $data = $data->result_array();
	}
	public function getAllMonAn()
	{
		$this->db->select('*');
		$this->db->from('danhmucmonan');
		$this->db->join('monan', 'monan.iddanhmuc = danhmucmonan.id', 'left');
		$data = $this->db->get();
		return $data = $data->result_array();
	}
	public function loadDanhMuc()
	{
		$this->db->select('*');
		$data = $this->db->get('danhmucmonan');
		return $data = $data->result_array();
	}
	public function addDanhMuc($tendanhmuc)
	{
		$obj = ['tendanhmuc'=>$tendanhmuc];
		$this->db->insert('danhmucmonan', $obj);
		return $this->db->insert_id();
	}
	public function loadAllDanhMuc()
	{
		$this->db->select('*');
		$data = $this->db->get('danhmucmonan');
		return $data = $data->result_array();
	}
	public function getIdByDanhMuc($iddanhmuc){
		$this->db->select('*');
		$this->db->where('id', $iddanhmuc);
		$data = $this->db->get('danhmucmonan');
		return $data = $data->result_array();
	}
	public function updateDanhMuc($iddanhmuc,$tendanhmuc)
	{
		$obj = [
			'id' => $iddanhmuc, 
			'tendanhmuc' => $tendanhmuc
		];

		$this->db->where('id', $iddanhmuc);
		return $this->db->update('danhmucmonan', $obj);
	}
	public function deleteDanhMuc($iddanhmuc){
		$this->db->where('id', $iddanhmuc);
		return $this->db->delete('danhmucmonan');
	}
}

/* End of file monan_model.php */
/* Location: ./application/models/monan_model.php */