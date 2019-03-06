<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->load->view('dangnhap_view');
	}
	public function dangnhap(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$arrSession = [
			'email' => $email,
			'password' => $password
		];

		if($this->admin_model->kiemtradangnhap($email, $password)){
			$this->session->set_userdata($arrSession);
			redirect('Tintuc/danhmuctin','refresh');
		}else{
			$this->load->view('dntb_view');
		}
	}
	public function quenmk()
	{
		$this->load->view('quenmatkhau_view');
	}
	public function guiEmail(){
		$subject = "Demo lấy lại mật khẩu từ admin";
		$email = $this->input->post('email');
		$result = $this->admin_model->getPasswordByEmail($email);

		if($result){
			$content = "Mật khẩu: " . $result;

			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			try {
			    //Server settings

			    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
			    $mail->isSMTP();									// Set mailer to use SMTP
			    $mail->CharSet = "utf-8";// set charset to utf8                                   
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'tonyhuynh9119@gmail.com';                 // SMTP username
			    $mail->Password = 'hzofdjdkasjoylht';                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                   // TCP port to connect to
			    $mail->SMTPOptions = array(
				    'ssl' => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
				);
			    
			    //Recipients
			    $mail->setFrom('tony@fullhouse.com', 'Anh BA trà cú');
			    $mail->addAddress($email);     // Add a recipient
			    // $mail->addAddress('ellen@example.com');               // Name is optional
			    // $mail->addReplyTo('info@example.com', 'Information');
			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');

			    //Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = $subject;
			    $mail->Body    = $content;
			    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->send();
			    //echo 'Message has been sent';
			    $this->load->view('laymk_view');
			} catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
		}else{
			$this->load->view('laymktb_view');
		}
		

	}
	public function dangky()
	{
		$this->load->view('dangky_view');
	}
	public function them()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');

		if($this->admin_model->insertNguoidung($username, $password, $email)){
			$this->load->view('dktc_view');
		}else{
			echo 'thất bài...';
		}
	}
	public function danhsach(){
		$data = $this->admin_model->getAllNguoidung();
		$data = ['data' => $data];
		$this->load->view('danhsachnguoidung_view',$data);
	}
	public function sua($idnguoidung){
		$data = $this->admin_model->getNguoidungById($idnguoidung);
		$data = ['data' => $data];
		$this->load->view('suadangky_view',$data);
	}
	public function capnhat(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');

		if($this->admin_model->updateNguoidung($id,$username,$password,$email)){
			$this->load->view('cntc_view');
		}else{
			echo 'thất bài...';
		}
	}
	public function xoa($idnguoidung)
	{
		if($this->admin_model->deleteNguoidung($idnguoidung)){
			$this->load->view('cntc_view');
		}else{
			echo 'xoá thất bại';
		}

	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */