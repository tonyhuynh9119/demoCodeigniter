<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Trangchu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tintuc_model');
		$this->load->model('slides_model');
		$this->load->model('monan_model');
	}

	public function index()
	{
		$this->load->model('slides_model');
		$data = $this->slides_model->getDataValueAttr();
		$dataAllMonAn = $this->monan_model->getAllMonAn();

		$dataHeader = $this->tintuc_model->layQuanLyHeader();
		$dataHeader = json_decode($dataHeader,true);
		$dataMenuHeader = $this->slides_model->laydulieutuMenuHeader();
		$dataMenuHeader = json_decode($dataMenuHeader, true);
		$dataFooter = $this->tintuc_model->laydlquanlyfooter();
		$dataFooter = json_decode($dataFooter, true);
		$laybatinmoinhat = $this->tintuc_model->laybatinmoinhat();
		
		$data = [
			'data' => $data,
			'dataHeader' => $dataHeader,
			'dataMenuHeader' => $dataMenuHeader,
			'dataFooter' => $dataFooter,
			'laybatinmoinhat' => $laybatinmoinhat,
			'dataAllMonAn' => $dataAllMonAn
		];
		$this->load->view('Home', $data, false);	
	}
	public function datban()
	{
		$tenkh = $this->input->post('tenkh');
		$email = $this->input->post('email');
		$sdt = $this->input->post('sdt');
		$ngaydatban = $this->input->post('ngaydatban');
		$giodatban = $this->input->post('giodatban');
		$giodatban = $ngaydatban .' '. $giodatban;
		$songuoi = $this->input->post('songuoi');

		if($this->slides_model->booking($tenkh,$email,$sdt,$ngaydatban,$giodatban,$songuoi))
		{
			$mail = new PHPMailer(true);                            // Passing `true` enables exceptions
			try {
			    //Server settings

			    // $mail->SMTPDebug = 2;                            // Enable verbose debug output
			    $mail->isSMTP();									// Set mailer to use SMTP
			    $mail->CharSet = "utf-8";							// set charset to utf8                        
			    $mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                             // Enable SMTP authentication
			    $mail->Username = 'tonyhuynh9119@gmail.com';        // SMTP username
			    $mail->Password = 'hzofdjdkasjoylht';               // SMTP password
			    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                  // TCP port to connect to
			    $mail->SMTPOptions = array(
				    'ssl' => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
				);
			    
			    //Recipients
			    $mail->setFrom('tonyhuynh9119@gmail.com', 'Thông báo đặt bàn');
			    $mail->addAddress('tonyhuynh9119@gmail.com');     // Add a recipient
			    // $mail->addAddress('ellen@example.com');               // Name is optional
			    // $mail->addReplyTo('info@example.com', 'Information');
			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');

			    //Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = "Tên người đặt : $tenkh - SĐT: $sdt";
			    $mail->Body    = "Thông Tin Chi Tiết: <br> 
			    					Tên người đặt : $tenkh <br>
			    					Số Điện thoại: $sdt <br>
			    					Thời gian: $giodatban <br>
			    					Số ghế: $songuoi.";
			    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->send();
			    // echo 'Message has been sent';
			    $this->load->view('bookingthanhcong');
			} catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}

			
		}else{
			$this->load->view('bookingthatbai');
		}
	}
}

/* End of file Trangchu.php */
/* Location: ./application/controllers/Trangchu.php */