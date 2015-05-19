<?php snippet('header') ?>

<main class="main" role="main">
	<h1>Say Hey...!</h1>

	<div class="text">
		<?php echo $page->text()->kt() ?>
		<div class="contact-form">
			<form class="">
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
						<td><button class="btn btn-default btn-lg btn-block"><strong>Send</strong></button></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</main>	

<?php snippet('footer') ?>
