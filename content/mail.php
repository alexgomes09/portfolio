<?php 
//header("content-type:");
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require 'mandrill/Mandrill.php'; 
require 'PHPMailer/class.phpmailer.php'; 
require 'PHPMailer/PHPMailerAutoload.php'; 

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
	
	
	try {
		$mandrill = new Mandrill('uU1ccalAVD4pPhGTWma5RQ');
		$message = array(
			'html' => '<p>Example HTML content</p>',
			'text' => 'Example text content',
			'subject' => 'example subject',
			'from_email' => 'heaven_hell321@yahoo.com',
			'from_name' => 'Chadni Gomes',
			'to' => array(
				array(
					'email' => 'alex_09hg@yahoo.com',
					'name' => 'Alex Gomes',
					'type' => 'to'
					)
				),
			'headers' => array('Reply-To' => 'heaven_hell321@yahoo'),
			'important' => false,
			'track_opens' => true,
			'track_clicks' => true,
			'tracking_domain' => null,
			'signing_domain' => null,
			'return_path_domain' => null,
			'merge' => true,
			'merge_language' => 'mailchimp'
			);
$async = false;
$ip_pool = 'Main Pool';
$result = $mandrill->messages->send($message, $async, $ip_pool);
$data['message'] = $result;
$data['message'] = '<h1>'.$data['name'].', thank you for contacting me.</br></br>If needed I will contact you momentarily.</h1>';
   
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
	echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
	throw $e;
	$data['errors']  =  $e;
}



}
echo json_encode($data);

?>