<?php snippet('header') ?>

<main class="main" role="main">
	<h1>Say Hey...!</h1>

	<div class="text clearfix">
		<?php echo $page->text()->kt() ?>
		<div class="contact-form col-sm-6">
			<form>
				<table>
					<tr>
						<td><i class="fa fa-user"></i></td>
						<td><input type="text" placeholder="Name"></td>
					</tr>
					<tr>
						<td><i class="fa fa-envelope"></i></td>
						<td><input type="text" placeholder="Email"></td>
					</tr>
					<tr>
						<td><i class="fa fa-pencil"></i></td>
						<td><textarea placeholder="Message"></textarea>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-default btn-lg btn-block"><strong>Send</strong></button></td>
						</tr>
					</table>
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
		<div class="map col-sm-12">
			map here
		</div>
	</div>
</main>	

	<?php snippet('footer') ?>
