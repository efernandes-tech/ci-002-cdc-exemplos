<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$mail = new PHPMailer;
		$mail->setFrom('from@example.com', 'Mailer');
		$mail->addAddress('joe@example.net', 'Joe User');
		$mail->isHTML(true);
		$mail->Subject = 'CodeIgniter';
		$mail->Body = 'Estou estudando!';
		if(!$mail->send()) {
			echo 'Email não enviado.';
			echo '<br>';
			echo 'Erro: ' . $mail->ErrorInfo;
		} else {
			echo 'Email enviado.';
		}
	}

}
