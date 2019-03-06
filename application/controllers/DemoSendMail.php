<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class DemoSendMail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('demoSendMail_view');
	}
	public function do_send()
	{
		$tengui = $this->input->post('tengui');
		$emailnhan = $this->input->post('emailnhan');
		$noidung = $this->input->post('noidung');

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
		    $mail->setFrom('tony@fullhouse.com', $tengui);
		    $mail->addAddress($emailnhan);     // Add a recipient
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    // $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $tengui;
		    $mail->Body    = $noidung;
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
}

/* End of file DemoSendMail.php */
/* Location: ./application/controllers/DemoSendMail.php */