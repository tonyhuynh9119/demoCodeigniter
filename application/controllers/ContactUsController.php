<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class ContactUsController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('contactUs_model');
		$this->load->library('email');
	}

	public function index()
	{
		$this->load->view('contactUs');
	}
	public function sendMail()
	{
		$ten = $this->input->post('ten');
		$email = $this->input->post('email');
		$sodienthoai = $this->input->post('sodienthoai');
		$website = $this->input->post('website');
		$tinnhan = $this->input->post('tinnhan');

		$data = [
			'ten' => $ten,
			'email' => $email,
			'sodienthoai' => $sodienthoai,
			'website' => $website,
			'tinnhan' => $tinnhan,
		];

		$InsertDB = $this->contactUs_model->insert($data);

		if($InsertDB){
			$mail = new PHPMailer(true);                       // Passing `true` enables exceptions
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
			    $mail->setFrom('tonyhuynh9119@gmail.com', 'Ý kiến từ khách hàng');
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
			    $mail->Subject = "Ý kiến từ khách hàng Tên: $ten - SĐT: $sodienthoai";
			    $mail->Body    = "Thông Tin khách hàng: <br> 
			    					Tên : $ten <br>
			    					Email : $email <br>
			    					Số Điện thoại: $sodienthoai <br>
									Website : $website <br>
			    					Comment: $tinnhan.";
			    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->send();
			    // echo 'Message has been sent';
			    $this->load->view('bookingthanhcong');
			} catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
		}else{
			echo 'gui mail khong duoc';
		}

		 
	}
}

/* End of file ContactUsController.php */
/* Location: ./application/controllers/ContactUsController.php */