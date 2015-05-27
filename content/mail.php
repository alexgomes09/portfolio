<?php 
//header("content-type:");

$errors = array();
$data = array();

$name = "HEY";

if (empty($_POST['name']))
	$errors['name'] = 'Name is required.';

if (empty($_POST['email']))
	$errors['email'] = 'Email is required.';

if (empty($_POST['body']))
	$errors['body'] = 'Message is required.';

if(!empty($errors)){
	$data['success'] = false;
	$data['errors'] = $errors;
	//header("Location:http://localhost/portfolio/contact");
}else{
	$data['success'] = true;
	$data['message'] = '<h1>I thank you for contacting me.</br></br>If needed I will contact you momentarily.</h1>';	

	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['body'] = $_POST['body'];
}
echo json_encode($data);



// $email = new Email(array(
// 	'to'      => 'alex_09hg@yahoo.com',
// 	'from'    => 'john@doe.com',
// 	'name'	  => 'John Doe',
// 	'subject' => 'a message from alexgomes.tk',
// 	'body'    => 'Hey, this is a test email!', 
// 	'service' => 'mandrill',
// 	'options' => array(
// 		'key'    => '9yPYgTCH5Mnrd8GqqerSkA'
// 		)
// 	));

// if($email->send()) {
// 	echo 'The email has been sent. I will get you shortly';
// } else {
// 	echo $email->error()->message();
// }

?>