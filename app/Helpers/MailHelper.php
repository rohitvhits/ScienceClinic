<?php

namespace App\Helpers;

use Mail;
use PHPMailer\PHPMailer\Exception;

class MailHelper
{
	public static function mail_send($email_message, $semail, $subject)
	{


		$to = $semail;

		$headers  = "From: Science Clinic noreply@scienceclinic.co.uk\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		// mail($to, $subject, $email_message, $headers);
		$data = array('email' => $semail, 'subject' => $subject, 'msg' => $email_message);
		try {
			Mail::send([], [], function ($message) use ($data) {
				$message->to($data['email']);
				$message->subject($data['subject']);
				$message->html($data['msg'], 'text/html'); // for HTML rich messages
			});
			return  '1';
		} catch (Exception $e) {
			return $e;
		}
	}
}
