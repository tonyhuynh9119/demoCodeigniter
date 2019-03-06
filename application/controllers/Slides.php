<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slides extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slides_model');
	}

	public function index()
	{
		$this->load->view('addSlides_view');
	}
	public function addSlidesJson(){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["slide_img"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["slide_img"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["slide_img"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["slide_img"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["slide_img"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$slide_img = base_url() . "uploads/" . $_FILES["slide_img"]["name"];
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$btn_link = $this->input->post('btn_link');
		$btn_text = $this->input->post('btn_text');

		$_slide = [
			'title'=>$title,
			'description'=>$description,
			'btn_link'=>$btn_link,
			'btn_text'=>$btn_text,
			'slide_img'=>$slide_img
		];

		$data = $this->slides_model->getDataValueAttr();
		
		$data = json_decode($data, true);

		if($data == null){
			echo 'dữ liệu đang trống';
			$data = [];
		}

		array_push($data, $_slide);

		$data = json_encode($data);

		if($this->slides_model->updataValueAttr($data)){
			$this->load->view('updateSuccess_view');
		}
	}
	public function updateSilde()
	{
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$btn_link = $this->input->post('btn_link');
		$btn_text = $this->input->post('btn_text');

		//Lấy dữ liệu tất cả các ảnh, rồi xử lý upload;
		$file_name = $_FILES["slide_img"]["name"]; //  lưu với tên file
		$file_tmp = $_FILES["slide_img"]["tmp_name"];// lưu với đường dẫn vật lý file

		//lấy ra các giá trị ảnh cũ
		$slide_img = [];
		$slide_img_old = $this->input->post('slide_img_old');

		//Dùng vòng lặp lấy ra tất cả $file_name và $file_tmp
		for ($i = 0; $i < count($file_name); $i++) {
			if(empty($file_name[$i])){
				//nếu không upload file mới thì sẽ lấy đường dẫn cũ
				$slide_img[$i] = $slide_img_old[$i];
			}else{
				$target_file = "uploads/" . $file_name[$i];
				move_uploaded_file($file_tmp[$i], $target_file);
				$slide_img[$i] = base_url() . "uploads/" . $file_name[$i];
			}
		}

		// echo '<pre>';
		// var_dump($slide_img);
		// die();
		// echo '</pre>';
		//dùng vòng lặp Insert từng phần tử vào trong mảng
		$data = [];
		for ($i = 0; $i < count($title); $i++) {
			$tmp = [];
			$tmp['title'] = $title[$i];
			$tmp['description'] = $description[$i];
			$tmp['btn_link'] = $btn_link[$i];
			$tmp['btn_text'] = $btn_text[$i];
			$tmp['slide_img'] = $slide_img[$i];
			array_push($data, $tmp);
		}

		$data = json_encode($data);

		if($this->slides_model->updataValueAttr($data)){
			$this->load->view('EditSuccess_view');
		}
	}
	public function menuHeader()
	{
		$this->load->view('addMenu_view');
	}
	public function addMenu()
	{
		$tieude = $this->input->post('tieude');
		$linkmenu = $this->input->post('linkmenu');
		
		$_menu = [
			'tieude' => $tieude,
			'linkmenu' => $linkmenu
		];

		$data = $this->slides_model->laydulieutuMenuHeader();
		
		$data = json_decode($data, true);

		if($data == null){
			echo '<p>dữ liệu đang trống</p>';
			$data = [];
		}
		
		array_push($data, $_menu);
		
		$data = json_encode($data);

		if($this->slides_model->capnhatdulieuMenuHeader($data)){
			echo 'Thêm 1 phần tử thành công';
		}
	}
	public function quanlymenuheader()
	{
		$data = $this->slides_model->laydulieutuMenuHeader();
		$data = json_decode($data, true);
		$data = ['data' => $data];
		$this->load->view('editMenu_view', $data, FALSE);
	}
	public function updateMenu()
	{
		$tieude = $this->input->post('tieude');
		$linkmenu = $this->input->post('linkmenu');
		/*
			biến phải là 1 mảng
			name = "tieude[]"
		*/
		$data = [];
		for ($i = 0; $i < count($tieude); $i++) {
			$tmp = [];
			$tmp['tieude'] = $tieude[$i];
			$tmp['linkmenu'] = $linkmenu[$i];

			array_push($data, $tmp);
		}

		$data = json_encode($data);

		if($this->slides_model->capnhatdulieuMenuHeader($data)){
			echo 'Cập nhật các phần tử menu thành công';
		}
	}
}

/* End of file Slides.php */
/* Location: ./application/controllers/Slides.php */