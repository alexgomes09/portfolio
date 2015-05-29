<?php 
//header("content-type:");
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once 'mandrill/Mandrill.php'; 
$errors = array();
$data = array();

if (empty($_POST['name']))
	$errors['name'] = 'Name is required.';

if (empty($_POST['email']))
	$errors['email'] = 'Email is required.';

if (empty($_POST['body']))
	$errors['body'] = 'Message is required.';

if(!empty($errors)){
	$data['success'] = false;
	$data['errors'] = $errors;
}else{
	$data['success'] = true;

	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['body'] = $_POST['body'];
	
	


	$data['message'] = '<h1>'.$data['name'].', thank you for contacting me.</br></br>If needed I will contact you momentarily.</h1>';	
}
//echo json_encode($data);

		try{
		$mandrill = new Mandrill($email->options['key']);
		$message = array(
			'html' => '<h1 style="color:red">'.$email->body.'</h1>',
			'subject' => $email->subject,
			'from_email' => $email->from,
			'from_name' => $email->name,
			'to' => array(
				array(
					'email' => $email->to,
					'name' => 'Alex Gomes',
					'type' => 'to'
					),
				array(
					'email' => 'alex.09hg@gmail.com',
					'name' => 'Alex Gomes',
					'type' => 'to'
					),
				),
			);
		$async = false;
		$ip_pool = 'Main Pool';
		$result = $mandrill->messages->send($message, $async, $ip_pool);
	}
	catch(Mandrill_Error $e){
  	 // Mandrill errors are thrown as exceptions
		echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		throw $e;
	}

?>