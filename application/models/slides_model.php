<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slides_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getDataValueAttr()
	{
		$this->db->select('*');
		$this->db->where('nameAttr', 'slide_topbanner');
		$data = $this->db->get('homepageattribute');
		$data = $data->result_array();

		foreach ($data as $value) {
			$result = $value['valueAttr'];
		}
		return $result;	
	}
	public function updataValueAttr($valueAttribute)
	{
		$data = [
			'nameAttr'=>'slide_topbanner',
			'valueAttr'=> $valueAttribute
		];

		$this->db->where('nameAttr', 'slide_topbanner');
		return $this->db->update('homepageattribute', $data);
	}

	public function booking($tenkh,$email,$sdt,$ngaydatban,$giodatban,$songuoi)
	{
		$object = [
			'tenkh'=>$tenkh,
			'email'=>$email,
			'sdt'=>$sdt,
			'ngaydatban'=>$ngaydatban,
			'giodatban'=>$giodatban,
			'songuoi'=>$songuoi
		];

		$this->db->insert('datban', $object);
		return $this->db->insert_id();
	}
	
	public function laydulieutuMenuHeader()
	{
		$this->db->select('*');
		$this->db->where('nameAttr', 'menuHeader');
		$data = $this->db->get('homepageattribute');
		$data = $data->result_array();

		foreach ($data as $value) {
			$result = $value['valueAttr'];
		}

		return $result;	
	}

	public function capnhatdulieuMenuHeader($data)
	{
		$obj = [
			'nameAttr'=>'menuHeader',
			'valueAttr'=> $data
		];

		$this->db->where('nameAttr', 'menuHeader');
		return $this->db->update('homepageattribute', $obj);
	}
}

/* End of file slides_model.php */
/* Location: ./application/models/slides_model.php */