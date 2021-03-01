<?php
	if ( ! empty( $_POST ) )
	{
		$name    = ! empty( $_POST['name'] ) ? filter_var( $_POST['name'], FILTER_SANITIZE_STRING ) : '';
		$phone   = ! empty( $_POST['phone'] ) ? filter_var( $_POST['phone'], FILTER_SANITIZE_STRING ) : '';
		$email   = ! empty( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL ) : '';
		$message = ! empty( $_POST['message'] ) ? filter_var( $_POST['message'], FILTER_SANITIZE_STRING ) : '';
		$result  = [];
		$headers = '';
		
		if ( ! empty( $name ) && ! empty( $email ) && ! empty( $message ) )
		{
			
			$to      = 'example@yourwebsite.com';
			$subject = 'Message from Contact Form';
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: "<' . $email . '>';
			$headers .= 'Reply-To: ' . $name . '" <' . $email . '>';
			$headers .= 'X-Mailer: PHP/' . phpversion();
			
			$message = "From: $name\n Phone: $phone\n E-Mail: $email\n Message:\n $message";
			
			if ( mail( $to, $subject, $message, $headers ) )
			{
				$result['status']  = true;
				$result['message'] = 'Your Message was sent. Thanks for contacting us.';
			}
			else
			{
				$result['status']  = false;
				$result['message'] = 'Unfortunately your email was not sent. Please try again.';
			}
		}
		else
		{
			$result['status']  = false;
			$result['message'] = 'Please fill the required fields.';
		}
		
		echo json_encode( $result );
		die();
	}
