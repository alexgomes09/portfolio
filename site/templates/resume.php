<?php snippet('header') ?>

<main class="main" role="main">
	<div class="text">
		<div class="attributes">
			<h3><i class="icon-lightbulb"></i>Skills</h3>
			<div>
				<?php foreach($page->skills()->yaml() as $skills): ?>
					<progress value="<?php echo $skills['range'] ?>" max="100"></progress>
					<span><?php echo $skills['skill'] ?></span>
					<span class="percentage"><?php echo $skills['range']?>%</span>
				<?php endforeach ?>
			</div>
		</div>
		<div class="attributes">
			<h3><i class="icon-cogs"></i>Work Experience</h3>
			<div>
				<?php foreach($page->experience()->yaml() as $experience): ?>
					<h4><?php echo $experience['company'] ?></h4>
					Role: <?php echo $experience['role']?><br>
					<h5><i class="fa fa-calendar">&nbsp&nbsp</i><?php echo $experience['from'] ?> - <?php echo $experience['to']?></h5>
					<?php echo kirbytext($experience['description'])?><hr>
				<?php endforeach ?>
			</div>
		</div>
		<div class="attributes">
			<h3><i class="icon-graduation-cap"></i>Education</h3>
			<div>
				<?php foreach($page->education()->yaml() as $education): ?>
					<h4><?php echo $education['schoolname'] ?></h4>
					<?php echo $education['major']?><br>
					<i class="fa fa-certificate">&nbsp&nbsp</i><?php echo $education['degreetype']?><br>
					<h5><i class="fa fa-calendar">&nbsp&nbsp</i><?php echo $education['from'] ?> - <?php echo $education['to']?></h5><hr>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</main>

<?php snippet('footer') ?>