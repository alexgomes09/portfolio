<?php snippet('header') ?>

<main class="main" role="main">
	<div class="text">
		<div class="attributes">
			<h3>Skills</h3>
			<section>
				<?php foreach($page->skills()->yaml() as $skills): ?>
					<progress value="<?php echo $skills['range'] ?>" max="100"></progress>
					<span><?php echo $skills['skill'] ?></span>
					<span class="percentage"><?php echo $skills['range']?>%</span>
				<?php endforeach ?>
			</section>
		</div>
		<div class="attributes">
			<h3>Work Experience</h3>
			
		</div>

	</div>

</main>

<?php snippet('footer') ?>