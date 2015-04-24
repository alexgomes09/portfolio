<?php snippet('header') ?>

<main class="main" role="main">
	<div class="text">
		<h2>Skills</h2>
		<?php foreach($page->skills()->yaml() as $skills): ?>
			<?php echo $skills["skill"] ?>
			<section id="skills">
				<progress value="50" max="100"></progress><span>JavaScript/jQuery</span>
				<span class="percentage">45%</span>
				<progress value="70" max="100"></progress><span>HTML5/CSS3</span>
				<progress value="60" max="100"></progress><span>NodeJS</span>
				<progress value="70" max="100"></progress><span>Java/PHP</span>
				<progress value="60" max="100"></progress><span>MySQL</span>
				<progress value="80" max="100"></progress><span>Photoshop</span>
			</section>

		</div>
	<?php endforeach ?>
</div>

</main>

<?php snippet('footer') ?>