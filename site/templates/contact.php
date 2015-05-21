<?php snippet('header') ?>

<main class="main" role="main">
	<div class="text clearfix">
		<?php echo $page->text()->kt() ?>
		<div class="contact-form col-sm-6">
			<form method="POST" accept="<?php echo $_SERVER['PHP_SELF'] ?>">
				<table>
					<tr>
						<td><i class="fa fa-user"></i></td>
						<td><input type="text" name="name" placeholder="Name"></td>
					</tr>
					<tr>
						<td><i class="fa fa-envelope"></i></td>
						<td><input type="email" name="email" placeholder="Email"></td>
					</tr>
					<tr>
						<td><i class="fa fa-pencil"></i></td>
						<td><textarea placeholder="Message" name="body"></textarea></td>
					</tr>
					<tr>
						<td><button type="submit" class="btn btn-default btn-lg btn-block"><strong>Send</strong></button></td>
					</tr>
				</table>
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
			</form>
		</div>
		<div class="social-media col-sm-6">
			<h1>Fine me here...!</h1>
			<table>
				<tr>
					<td><a href="https://github.com/alexgomes09" target="_blank"><i class="fa fa-github-square fa-5x"></i></a></td>
					<td><a href="http://www.facebook.com/alexhansgomes" target="_blank"><i class="fa fa-facebook-square fa-5x"></i></a></td>
					<td><a href="https://twitter.com/LxGomes09" target="_blank"><i class="fa fa-twitter-square fa-5x"></i></a></td>
					<td><a href="https://ca.linkedin.com/in/alexhansgomes" target="_blank"><i class="fa fa-linkedin-square fa-5x"></i></a></td>
				</tr>
			</table>
		</div>
		<div class="map col-sm-12" id="map-canvas">
		</div>
	</div>
</main>	

<?php snippet('footer') ?>
