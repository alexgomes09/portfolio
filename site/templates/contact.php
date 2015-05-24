<?php snippet('header') ?>
<?php include str_replace('\\','/',__DIR__ .'/mail.php') ?>
<?php if(kirby()->request()->ajax()) {
  echo 'This is an ajax request';
} ?>

<main class="main" role="main">
	<div class="text clearfix">
		<?php echo $page->text()->kt() ?>
		<div class="contact-form col-sm-6">
		<?php echo str_replace('\\','/',__DIR__ .'/mail.php') ?>
			<form action="<?php echo str_replace('\\','/',__DIR__ .'/mail.php') ?>"  method="POST"> 
				<table>
					<tr>
						<td><i class="fa fa-user"></i></td>
						<td><input type="text" name="name" placeholder="Name" value="alex"></td>
					</tr>
					<tr>
						<td><i class="fa fa-envelope"></i></td>
						<td><input type="email" name="email" placeholder="Email" value="alex_09hg@yahoo.com"></td>
					</tr>
					<tr>
						<td><i class="fa fa-pencil"></i></td>
						<td><textarea placeholder="Message" name="body">HELLO THERE</textarea></td>
					</tr>
					<tr>
						<td>
							<button type="submit" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-default btn-lg btn-block">
								<strong>Send</strong>
							</button>
						</td>
					</tr>
				</table>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Small modal</button>
				<!-- <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel"><?php echo $name ?></h4>
							</div>
							<div class="modal-body">
								<p style="word-break: break-all;"><?php echo $body ?></p>
							</div>
							<div class="modal-footer">
								<p><?php echo $email ?></p>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div> -->
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
