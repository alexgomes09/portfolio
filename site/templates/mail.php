<?php 
$email = new Email(array(
	'to'      => 'alex_09hg@yahoo.com',
	'from'    => 'john@doe.com',
	'name'	  => 'John Doe',
	'subject' => 'a message from alexgomes.tk',
	'body'    => 'Hey, this is a test email!', 
	'service' => 'mandrill',
	'options' => array(
		'key'    => '9yPYgTCH5Mnrd8GqqerSkA'
		)
	));

if($email->send()) {
	echo 'The email has been sent. I will get you shortly';
} else {
	echo $email->error()->message();
}
?>