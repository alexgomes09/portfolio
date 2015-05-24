<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/
//a::show (apache_get_modules());

c::set('license', 'put your license key here');
c::set('markdown.extra',true);

r::ajax();

/**
 * Mandril mail driver
 */
email::$services['mandrill'] = function($email) {

	require_once 'mandrill/Mandrill.php'; 

	if(empty($email->options['key']))    throw new Error('Missing Mandrill API key');

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




};
/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/