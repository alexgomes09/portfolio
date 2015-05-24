<?php 

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

	//echo "<script>$('.modal').modal();</script>";
	//header("Location:http://localhost/portfolio/contact");
}else{
	$data['success'] = true;
	$data['message'] = 'Success!';	
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