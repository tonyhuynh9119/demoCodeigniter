<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Do_edit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slides_model');
	}

	public function index()
	{
		$data = $this->slides_model->getDataValueAttr();
		$data = json_decode($data, true);
		$data = ['data' => $data];
		$this->load->view('editSlides_view', $data, FALSE);
	}
	
}

/* End of file Do_edit.php */
/* Location: ./application/controllers/Do_edit.php */