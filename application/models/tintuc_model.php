<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tintuc_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDanhMuc($tendanhmuc)
	{
		$object = ['tendanhmuc'=>$tendanhmuc];
		$this->db->insert('danhmuctin', $object);
		return $this->db->insert_id();
	}
	public function viewDanhMuc()
	{
		$this->db->select('*');
		$data = $this->db->get('danhmuctin');
		$data = $data->result_array();
		return $data;
	}
	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('danhmuctin');
		$data = $data->result_array();
		return $data;
	}
	public function updateDanhMuc($id, $tendanhmuc)
	{
		$data = ['id' => $id, 'tendanhmuc'=> $tendanhmuc];
		$this->db->where('id', $id);
		return $this->db->update('danhmuctin', $data);
	}
	public function deleteById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('danhmuctin');
	}

	
	public function insertTinMoi($tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{
		$obj = [
			'tieude' => $tieude,
			'iddanhmuc' => $iddanhmuc,
			'noidungtin' => $noidungtin,
			'anhtin' => $anhtin,
			'trichdan' => $trichdan
		];
		$this->db->insert('tintuc', $obj);
		return $this->db->insert_id();
	}
	public function viewDanhSachTin()
	{
		$this->db->select('*');
		$data = $this->db->get('tintuc');
		$data = $data->result_array();
		return $data;
	}
	public function getByIdTin($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$data = $this->db->get();
		$data = $data->result_array();
		return $data;
	}
	public function updateTin($id,$tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{
		$obj = [
			'id' => $id,
			'tieude' => $tieude,
			'iddanhmuc' => $iddanhmuc,
			'noidungtin' => $noidungtin,
			'anhtin' => $anhtin,
			'trichdan' => $trichdan
		];
		$this->db->where('id', $id);
		return $this->db->update('tintuc', $obj);	
	}
	public function getTenDanhMucById($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);

		$data = $this->db->get();
		$data = $data->result_array();
		
		$result = $data[0]['tendanhmuc'];
		return $result;		
	}
	public function deleteTinById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tintuc');
	}

	public function getAllTin($sotintrong1trang)
	{
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->order_by('ngaytao', 'desc');
		$data = $this->db->get('danhmuctin', $sotintrong1trang, 0);
		return $data = $data->result_array();
	}
	public function soTrangTin($sotintrong1trang)
	{
		$this->db->select('*');
		$data = $this->db->get('tintuc');
		$data = $data->result_array();

		$soluongtin = count($data);
		// làm tròn bằng round,ceil
		$sotrang = ceil($soluongtin / $sotintrong1trang);

		return $sotrang;
	}
	public function getTinTheoTrang($sotrang, $sotintrong1trang){
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->order_by('ngaytao', 'desc');
		//Tính vị trí tin tiếp theo bắt đầu từ trang thứ mấy... 
		$offset = ($sotrang - 1) * $sotintrong1trang;

		$data = $this->db->get('danhmuctin', $sotintrong1trang, $offset);
		return $data = $data->result_array();
	}
	public function getTinTheoDanhMuc($sotintrong1trang, $id){
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.iddanhmuc', $id);
		$this->db->order_by('ngaytao', 'desc');

		$data = $this->db->get('danhmuctin', $sotintrong1trang, 0);
		return $data = $data->result_array();
	}
	public function getIdDanhMucById($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);

		$data = $this->db->get();
		$data = $data->result_array();
		
		$result = $data[0]['iddanhmuc'];
		return $result;		
	}
	public function getTinLienQuan($sotintrong1trang, $idanhmuc, $idtin){
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.iddanhmuc', $idanhmuc);
		$this->db->where('tintuc.id !=', $idtin);
		$this->db->order_by('ngaytao', 'desc');

		$data = $this->db->get('danhmuctin', $sotintrong1trang, 0);

		return $data = $data->result_array();
	}
	//Hàm updateQuanlyheader xử lý thêm chuỗi json
	public function updateQuanlyheader($data)
	{
		$obj = [
			'id' => '2',
			'nameAttr' => 'QuanLyHeader',
			'valueAttr' => $data
		];

		$this->db->where('nameAttr', 'QuanLyHeader');
		return $this->db->update('homepageattribute', $obj);
	}
	//Hàm lấy chuỗi json
	public function layQuanLyHeader()
	{
		$this->db->select('*');
		$this->db->where('nameAttr', 'QuanLyHeader');
		$data = $this->db->get('homepageattribute');
		$data = $data->result_array();
		return $data = $data[0]['valueAttr'];
	}
	public function updateQuanlyfooter($data)
	{
		$obj = [
			'nameAttr' => 'quanLyFooter',
			'valueAttr' => $data
		];

		$this->db->where('nameAttr','quanLyFooter');
		return $this->db->update('homepageattribute', $obj);
	}
	public function laydlquanlyfooter()
	{
		$this->db->select('*');
		$this->db->where('nameAttr', 'quanLyFooter');
		$data = $this->db->get('homepageattribute');
		$data = $data->result_array();
		foreach ($data as $value) {
			$result = $value['valueAttr'];
		}
		return $result;
	}
	public function laybatinmoinhat()
	{
		$this->db->select('*');
		$this->db->order_by('ngaytao', 'desc');
		$data = $this->db->get('tintuc', 3);
		return $data = $data->result_array();
	}

	//Code button search
	public function search($keyword, $sotintrong1trang)
	{
		$this->db->select('*');
		$this->db->like('tieude', $keyword, 'BOTH');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->order_by('ngaytao', 'desc');
		$result = $this->db->get('danhmuctin', $sotintrong1trang, 0);
        return $result = $result->result_array();
	}
}

/* End of file tintuc_model.php */
/* Location: ./application/models/tintuc_model.php */