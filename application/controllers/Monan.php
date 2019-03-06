<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monan extends CI_Controller {
	private $buoisang;
	private $buoitrua;
	private $buoitoi;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('monan_model');
		$this->load->model('tintuc_model');
		$this->load->model('slides_model');
		$this->buoisang = 1;
		$this->buoitrua = 2;
		$this->buoitoi = 12;

	}

	public function index()
	{
		$buoisang = $this->monan_model->getMonAnByDanhMuc($this->buoisang);
		$buoitrua = $this->monan_model->getMonAnByDanhMuc($this->buoitrua);
		$buoitoi = $this->monan_model->getMonAnByDanhMuc($this->buoitoi);

		$dataHeader = $this->tintuc_model->layQuanLyHeader();
		$dataHeader = json_decode($dataHeader,true);
		$dataMenuHeader = $this->slides_model->laydulieutuMenuHeader();
		$dataMenuHeader = json_decode($dataMenuHeader, true);
		$dataFooter = $this->tintuc_model->laydlquanlyfooter();
		$dataFooter = json_decode($dataFooter, true);
		$laybatinmoinhat = $this->tintuc_model->laybatinmoinhat();

		$data = [
			'buoisang' => $buoisang,
			'buoitrua' => $buoitrua,
			'buoitoi' => $buoitoi,
			'dataHeader' => $dataHeader,
			'dataMenuHeader' => $dataMenuHeader,
			'dataFooter' => $dataFooter,
			'laybatinmoinhat' => $laybatinmoinhat,

		];
		$this->load->view('menulist_view',$data);
	}
	public function quanLyMonAn()
	{
		$data = $this->monan_model->loadAllMonAn();
		$loadDanhMuc = $this->monan_model->loadDanhMuc();
		$data = [
			'data' => $data,
			'loadDanhMuc' => $loadDanhMuc
		];
		$this->load->view('monan_view',$data);
	}
	public function themMonAn()
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anh"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        $uploadOk = 0;
		    }	
		}
		// // Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		// if ($_FILES["anh"]["size"] > 500000) {
		//     echo "Sorry, your file is too large.";
		//     $uploadOk = 0;
		// }
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["anh"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}

		$anh = base_url() . "uploads/" . basename( $_FILES["anh"]["name"]);
		$ten = $this->input->post('ten');
		$gia = $this->input->post('gia');
		$mota = $this->input->post('mota');
		$iddanhmuc = $this->input->post('iddanhmuc');

		$new = $this->input->post('new');

		if($this->monan_model->addMonAn($anh,$ten,$gia,$mota,$iddanhmuc,$new)){
			$this->load->view('tcDanhsachmonan');
		}else{
			echo 'thất bại rồi bạn ơi';
		}
	}
	public function suaMonAn($idMonAn){
		$data = $this->monan_model->getIdByMonAn($idMonAn);
		$tendanhmuc = $this->monan_model->getNameDanhMucByMonAn($idMonAn);
		$loadanhmuc = $this->monan_model->loadAllDanhMuc();
		
		$data = [
			'data' => $data,
			'tendanhmuc' => $tendanhmuc,
			'loadanhmuc' => $loadanhmuc
		];
		$this->load->view('suaMonAn_view', $data, FALSE);
	}
	public function capnhatMonAn()
	{
		//Code xử lý upload ảnh
		//lấy dữ liệu $anhcu từ input
		/* 
		<input name="anhcu" type="hidden" class="form-control" id="formGroupExampleInput" value="<?= $value['anh'] ?>">
		*/
		$anhcu = $this->input->post('anhcu');
		$anh = $_FILES['anh']['name'];

		//Nếu không có upload ảnh mới thì lấy ảnh cũ
		if(empty($anh)){
			$anh = $anhcu;
		}else{
			//ngược lại nếu upload ảnh mới thì sẽ lấy ảnh mới
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["anh"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["anh"]["tmp_name"]);
			    if($check !== false) {
			        //echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        //echo "File is not an image.";
			        $uploadOk = 0;
			    }	
			}
			// // Check if file already exists
			// if (file_exists($target_file)) {
			//     echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }
			// Check file size
			// if ($_FILES["anh"]["size"] > 500000) {
			//     echo "Sorry, your file is too large.";
			//     $uploadOk = 0;
			// }
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    //echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["anh"]["name"]). " has been uploaded.";
			    } else {
			        //echo "Sorry, there was an error uploading your file.";
			    }
			}
			$anh = base_url() . "uploads/" . basename( $_FILES["anh"]["name"]);
		}

		$id = $this->input->post('id');
		$ten = $this->input->post('ten');
		$gia = $this->input->post('gia');
		$mota = $this->input->post('mota');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$new = $this->input->post('new');

		$data = $this->monan_model->updateMonAn($id,$anh,$ten,$gia,$mota,$iddanhmuc,$new);
		if($data){
			$this->load->view('tcDanhsachmonan');
		}else{
			echo 'Update thất bại';
		}
	}
	public function xoaMonAn($idmonan)
	{
		if($this->monan_model->deleteMonAn($idmonan)){
			$this->load->view('tcDanhsachmonan');
		}else{
			echo 'Update thất bại';
		}
	}
	public function danhMucMonAn()
	{
		$data = $this->monan_model->loadAllDanhMuc();
		$data = ['data'=>$data];
		$this->load->view('danhmucmonan_view',$data);
	}
	public function themDanhMuc(){
		$tendanhmuc = $this->input->post('tendanhmuc');

		if($this->monan_model->addDanhMuc($tendanhmuc)){
			$this->load->view('tcDanhmucmonan');
		}else{
			echo 'Danh mục món ăn thất bại !!!';
		}
	}
	public function suaDanhMuc($id)
	{
		$data = $this->monan_model->getIdByMonAn($id);
		$data = ['data' => $data];
		$this->load->view('suaDanhMucMonAn_view', $data, FALSE);
	}
	public function capNhatDanhMuc()
	{
		$iddanhmuc = $this->input->post('id');
		$tendanhmuc = $this->input->post('tendanhmuc');

		if($this->monan_model->updateDanhMuc($iddanhmuc, $tendanhmuc)){
			$this->load->view('tcDanhmucmonan');
		}else{
			echo 'Danh mục món ăn thất bại !!!';
		}
	}
	public function xoaDanhmuc($iddanhmuc){
		if($this->monan_model->deleteDanhMuc($iddanhmuc)){
			$this->load->view('tcDanhmucmonan');
		}else{
			echo 'Danh mục món ăn thất bại !!!';
		}
	}
	public function addAjaxDanhMuc()
	{
		$tendanhmuc = $this->input->post('tendanhmuc');
		$this->monan_model->addDanhMuc($tendanhmuc);

		echo json_encode($this->db->insert_id());
	}
}

/* End of file Monan.php */
/* Location: ./application/controllers/Monan.php */