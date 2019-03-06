<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tintuc extends CI_Controller {
	private $sotintrong1trang;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tintuc_model');
		$this->load->model('slides_model');
		$this->sotintrong1trang = 3;
	}

	public function index()
	{
		$tt_tin = $this->tintuc_model->getAllTin($this->sotintrong1trang);
		$sotrang = $this->tintuc_model->soTrangTin($this->sotintrong1trang);
		$danhmuctin = $this->tintuc_model->viewDanhMuc();
		$laybatinmoinhat = $this->tintuc_model->laybatinmoinhat();


		// echo '<pre>';
		// var_dump($laybatinmoinhat);die();
		// echo '</pre>';
		$dataHeader = $this->tintuc_model->layQuanLyHeader();
		$dataHeader = json_decode($dataHeader,true);
		$dataMenuHeader = $this->slides_model->laydulieutuMenuHeader();
		$dataMenuHeader = json_decode($dataMenuHeader, true);
		$dataFooter = $this->tintuc_model->laydlquanlyfooter();
		$dataFooter = json_decode($dataFooter, true);

		// $obj = [
		// 	'username' => 'admin',
		// 	'password' => '123456'
		// ];
		// $this->session->set_userdata($obj);

		// $this->session->unset_userdata('username','password');

		$data = [
			'tt_tin' => $tt_tin,
			'laybatinmoinhat' => $laybatinmoinhat,
			'dataHeader' => $dataHeader,
			'dataMenuHeader' => $dataMenuHeader,
			'dataFooter' => $dataFooter,
			'sotrang' => $sotrang,
			'danhmuctin' => $danhmuctin
		];
		$this->load->view('blog', $data, false);	
	}
	public function page($sotrang)
	{
		$tt_tin = $this->tintuc_model->getTinTheoTrang($sotrang, $this->sotintrong1trang);
		$sotrang = $this->tintuc_model->soTrangTin($this->sotintrong1trang);
		$danhmuctin = $this->tintuc_model->viewDanhMuc();
		$laybatinmoinhat = $this->tintuc_model->laybatinmoinhat();

		$dataHeader = $this->tintuc_model->layQuanLyHeader();
		$dataHeader = json_decode($dataHeader,true);
		$dataMenuHeader = $this->slides_model->laydulieutuMenuHeader();
		$dataMenuHeader = json_decode($dataMenuHeader, true);
		$dataFooter = $this->tintuc_model->laydlquanlyfooter();
		$dataFooter = json_decode($dataFooter, true);
		

		$data = [
			'tt_tin' => $tt_tin,
			'laybatinmoinhat' => $laybatinmoinhat,
			'dataHeader' => $dataHeader,
			'dataMenuHeader' => $dataMenuHeader,
			'dataFooter' => $dataFooter,
			'sotrang' => $sotrang,
			'danhmuctin' => $danhmuctin
		];
		$this->load->view('blog', $data, false);

	}
	public function chiTietTinTuc($idtin){
		$data = $this->tintuc_model->getByIdTin($idtin);
		$danhmuctin = $this->tintuc_model->viewDanhMuc();
		//Lấy iddanhmuc
		$iddanhmuc = $this->tintuc_model->getIdDanhMucById($idtin);
		$tinlienquan = $this->tintuc_model->getTinLienQuan($this->sotintrong1trang, $iddanhmuc, $idtin);


		$data = [
			'data' => $data,
			'danhmuctin' => $danhmuctin,
			'tinlienquan' => $tinlienquan
		];
		$this->load->view('blog_details',$data, false);
	}
	public function danhmuc($id){
		$tt_tin = $this->tintuc_model->getTinTheoDanhMuc($this->sotintrong1trang, $id);
		$sotrang = $this->tintuc_model->soTrangTin($this->sotintrong1trang);
		$danhmuctin = $this->tintuc_model->viewDanhMuc();
		$laybatinmoinhat = $this->tintuc_model->laybatinmoinhat();

		$dataHeader = $this->tintuc_model->layQuanLyHeader();
		$dataHeader = json_decode($dataHeader,true);
		$dataMenuHeader = $this->slides_model->laydulieutuMenuHeader();
		$dataMenuHeader = json_decode($dataMenuHeader, true);
		$dataFooter = $this->tintuc_model->laydlquanlyfooter();
		$dataFooter = json_decode($dataFooter, true);

		$data = [
			'tt_tin' => $tt_tin,
			'laybatinmoinhat' => $laybatinmoinhat,
			'dataHeader' => $dataHeader,
			'dataMenuHeader' => $dataMenuHeader,
			'dataFooter' => $dataFooter,
			'sotrang' => $sotrang,
			'danhmuctin' => $danhmuctin
		];
		
		$this->load->view('blog', $data, false);
	}
	public function danhmuctin()
	{
		$data = $this->tintuc_model->viewDanhMuc();
		$data = ['data'=> $data];
		$this->load->view('danhmuctin_view', $data, false);
	}
	public function themdanhmuc()
	{
		$tendanhmuc = $this->input->post('tendanhmuc');
		
		if($this->tintuc_model->insertDanhMuc($tendanhmuc)){
			$this->load->view('tcdanhmuctin_view');
		}else{
			$this->load->view('tbdanhmuctin_view');		
		}
	}
	public function suadanhmuc($id)
	{
		$data = $this->tintuc_model->getDataById($id);
		$data = ['data' => $data];
		$this->load->view('suadanhmuctin_view', $data, FALSE);
	}
	public function capnhatdanhmuc()
	{
		$id = $this->input->post('id');
		$tendanhmuc = $this->input->post('tendanhmuc');
		
		if($this->tintuc_model->updateDanhMuc($id, $tendanhmuc)){
			// echo '<pre>';
			// var_dump($id);
			// var_dump($tendanhmuc);
			// echo '</pre>';

			$this->load->view('tcdanhmuctin_view');
		}else{
			$this->load->view('tbdanhmuctin_view');
		}
	}
	public function xoadanhmuc($id)
	{
		if($this->tintuc_model->deleteById($id)){
			$this->load->view('tcdanhmuctin_view'); 
		}else{
			$this->load->view('tbdanhmuctin_view');
		}
	}
	public function addAjaxDanhMuc()
	{
		$tendanhmuc = $this->input->post('tendanhmuc');
		$this->tintuc_model->insertDanhMuc($tendanhmuc);

		echo json_encode($this->db->insert_id());
	}
	public function quanlytintuc()
	{
		$data1 = $this->tintuc_model->viewDanhMuc();
		$data2 = $this->tintuc_model->viewDanhSachTin();

		$data = [
			'danhmuctin'=> $data1,
			'danhsachtin' => $data2
		];
		$this->load->view('tintuc_view', $data, false);
	}
	public function themtin()
	{	
		//Code xử lý upload ảnh
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhtin"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// // Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// // Check file size
		// if ($_FILES["anhtin"]["size"] > 500000) {
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
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
		    } else {
		       // echo "Sorry, there was an error uploading your file.";
		    }
		}
		$anhtin = base_url() . "uploads/" . basename( $_FILES["anhtin"]["name"]);

		$tieude = $this->input->post('tieude');
		$trichdan = $this->input->post('trichdan');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$noidungtin = $this->input->post('noidungtin');

		if($this->tintuc_model->insertTinMoi($tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)){
			$this->load->view('tctin_view');
		}else{
			$this->load->view('tbtin_view');	
		}
	}
	public function suaTin($id)
	{
		$data = $this->tintuc_model->getByIdTin($id);
		$tendanhmuc = $this->tintuc_model->getTenDanhMucById($id);
		$load_danhmuc = $this->tintuc_model->viewDanhMuc();

		$data = [
			'data' => $data,
			'tendanhmuc' => $tendanhmuc,
			'load_danhmuc' => $load_danhmuc
		];
		$this->load->view('editTinTuc_view', $data, FALSE);
	}
	public function capNhatTin()
	{
		$anhtincu = $this->input->post('anhtincu');
		$anhtin = $_FILES['anhtin']['name'];
		//nếu không có up ảnh thì sẽ lấy ảnh cũ
		if(empty($anhtin)){
			$anhtin = $anhtincu;
		//ngược lại, up ảnh mới sẽ thực hiện đoạn code sau...
		}else{
			//Code xử lý upload ảnh
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["anhtin"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// // Check if file already exists
			// if (file_exists($target_file)) {
			//     echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }
			// // Check file size
			// if ($_FILES["anhtin"]["size"] > 500000) {
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
			    // echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
			       // echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
			    } else {
			       // echo "Sorry, there was an error uploading your file.";
			    }
			}
			$anhtin = base_url() . "uploads/" . basename( $_FILES["anhtin"]["name"]);
		}
		$id = $this->input->post('id');
		$tieude = $this->input->post('tieude');
		$trichdan = $this->input->post('trichdan');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$noidungtin = $this->input->post('noidungtin');

		if($this->tintuc_model->updateTin($id,$tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)){
			$this->load->view('tctin_view');
		}else{
			$this->load->view('tbtin_view');	
		}
	}
	public function xoaTin($id)
	{
		if($this->tintuc_model->deleteTinById($id)){
			$this->load->view('tctin_view');
		}else{
			$this->load->view('tbtin_view');	
		}
	}
	public function themdlheader()
	{
		$data = [
			'mangXaHoi' => [
				'linkfb' => 'https://www.facebook.com/',
				'linktwitter' => 'https://twitter.com/?lang=vi',
				'linkpinterest' => 'https://www.pinterest.com/',
				'linkgoogleplus' => 'https://plus.google.com/discover'
			],
			'duongDayNong' => [
				'textHotLine' => 'SĐT đặt bàn',
				'sdt' => '093-503-9889',
			],
			'gioMoCua' => [
				'textOpenRestaurant' => 'Giờ Mở Của',
				'thoigian' => '8h - 22h'
			],
			'logo' => 'http://127.0.0.1/khoaHoc18/064/uploads/0b1nganhangdoanhnghiepbbbaaacyok7k15419402175231413974405.jpg'
		];
		$data = json_encode($data);
		if($this->tintuc_model->updateQuanlyheader($data)){
			echo 'Thành công! update chuỗi json vào Quanlyheader';
		}else{
			echo 'Thất bại...! update chuỗi json vào Quanlyheader';
		}
	}
	public function quanlyheader()
	{
		$data = $this->tintuc_model->layQuanLyHeader();
		$data = json_decode($data, true);
		$data = ['data' => $data];

		$this->load->view('quanlyheader_view', $data, FALSE);
	}
	public function capNhatQuanLyHeader()
	{
		$linkfb = $this->input->post('linkfb');
		$linktwitter = $this->input->post('linktwitter');
		$linkpinterest = $this->input->post('linkpinterest');
		$linkgoogleplus = $this->input->post('linkgoogleplus');
		$textHotLine = $this->input->post('textHotLine');
		$sdt = $this->input->post('sdt');
		$textOpenRestaurant = $this->input->post('textOpenRestaurant');
		$thoigian = $this->input->post('thoigian');

		$logocu = $this->input->post('logocu');
		$logo = $_FILES['logo']['name'];

		if(empty($logo)){
			$logo = $logocu;
		}else{
			$duongdan = 'uploads/';
			$duongdan = $duongdan . basename($_FILES['logo']['name']);
			move_uploaded_file($_FILES['logo']['tmp_name'], $duongdan);
			$logo = base_url().'uploads/'. basename($_FILES['logo']['name']);
		}

		$data =  [
			'mangXaHoi' => [
				'linkfb' => $linkfb,
				'linktwitter' => $linktwitter,
				'linkpinterest' => $linkpinterest,
				'linkgoogleplus' => $linkgoogleplus
			],
			'duongDayNong' => [
				'textHotLine' => $textHotLine,
				'sdt' => $sdt,
			],
			'gioMoCua' => [
				'textOpenRestaurant' => $textOpenRestaurant,
				'thoigian' => $thoigian
			],
			'logo' => $logo
		];

		$data = json_encode($data);

		if($this->tintuc_model->updateQuanlyheader($data)){
			$this->load->view('tcQuanlyheader');
		}else{
			echo 'Thất bại...! update chuỗi json vào Quanlyheader';
		}
	}
	public function themdlfooter()
	{
		$data = [
			'thongtin' => [
				'logo' => 'http://127.0.0.1/khoaHoc18/064/uploads/Vang_7__Copy.jpg',
				'gioithieu' => 'Marsh mallow muffin soufflé jelly-o tart cake Marshmallow macaroon jelly jubes dont tiramisu croissant cake.',
				'diachi' => '44 New Design Street, Melbourne 005',
				'dienthoai' => '(01) 800 433 633',
				'email' => 'info@Example.com'
			],
			'lienkethuuich' => [
				'aboutCompany' => 'https',
				'reservation' => 'https',
				'helpCenter' => 'https',
				'ourBlog' => 'https',
				'careers' => 'https',
				'contactUs' => 'https'
			]
		];

		$data = json_encode($data);

		if($this->tintuc_model->updateQuanlyfooter($data)){
			echo 'update chuỗi json thành công';
		}
	}
	public function quanLyFooter()
	{
		$data = $this->tintuc_model->laydlquanlyfooter();
		$data = json_decode($data, true);
		$data = ['data' => $data];
		$this->load->view('quanLyFooter_view', $data, FALSE);
	}
	public function capnhatdlfooter()
	{
		$gioithieu = $this->input->post('gioithieu');
		$diachi = $this->input->post('diachi');
		$dienthoai = $this->input->post('dienthoai');
		$email = $this->input->post('email');
		$aboutCompany = $this->input->post('aboutCompany');
		$reservation = $this->input->post('reservation');
		$helpCenter = $this->input->post('helpCenter');

		$ourBlog = $this->input->post('ourBlog');
		$careers = $this->input->post('careers');
		$contactUs = $this->input->post('contactUs');

		$logocu = $this->input->post('logocu');
		$logo = $_FILES['logo']['name'];

		if(empty($logo)){
			$logo = $logocu;
		}else{
			$thumuc = 'uploads/';
			$duongdan = $thumuc . basename($_FILES['logo']['name']);
			move_uploaded_file($_FILES['logo']['tmp_name'], $duongdan);
			$logo = base_url() . 'uploads/' . basename($_FILES['logo']['name']);
		}
		
		$data = [
			'thongtin' => [
				'logo' => $logo,
				'gioithieu' => $gioithieu,
				'diachi' => $diachi,
				'dienthoai' => 	$dienthoai,
				'email' => $email
			],
			'lienkethuuich' => [
				'aboutCompany' => $aboutCompany,
				'reservation' => $reservation,
				'helpCenter' => $helpCenter,
				'ourBlog' => $ourBlog,
				'careers' => $careers,
				'contactUs' => $contactUs
			]
		];

		$data = json_encode($data);

		if($this->tintuc_model->updateQuanlyfooter($data)){
			echo 'update chuỗi json thành công';
		}
	}
	public function timkiem()
	{
		$keyword = $this->input->post('timkiem');

		$search_tin = $this->tintuc_model->search($keyword, $this->sotintrong1trang);
		$sotrang = $this->tintuc_model->soTrangTin($this->sotintrong1trang);
		$danhmuctin = $this->tintuc_model->viewDanhMuc();
		$laybatinmoinhat = $this->tintuc_model->laybatinmoinhat();

		$dataHeader = $this->tintuc_model->layQuanLyHeader();
		$dataHeader = json_decode($dataHeader,true);
		$dataMenuHeader = $this->slides_model->laydulieutuMenuHeader();
		$dataMenuHeader = json_decode($dataMenuHeader, true);
		$dataFooter = $this->tintuc_model->laydlquanlyfooter();
		$dataFooter = json_decode($dataFooter, true);

		$data = [
			'search_tin' => $search_tin,
			'laybatinmoinhat' => $laybatinmoinhat,
			'dataHeader' => $dataHeader,
			'dataMenuHeader' => $dataMenuHeader,
			'dataFooter' => $dataFooter,
			'sotrang' => $sotrang,
			'danhmuctin' => $danhmuctin
		];
		$this->load->view('search_blog', $data, false);	
	}
}

/* End of file Tintuc.php */
/* Location: ./application/controllers/Tintuc.php */