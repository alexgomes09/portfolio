<?php snippet( 'header') ?>

<main class="main" role="main">
	<div class="text">
		<div id="Container">
			<div class="filter" data-filter="all"><i class="icon-th-thumb"> </i>Show All</div>
			<?php foreach($page->filters()->split(',') as $filter): ?>
				<div class="filter" data-filter=".<?php echo $filter ?>"><?php echo $filter ?></div>
			<?php endforeach ?>
		</br>
		<?php foreach($page->projthumb()->yaml() as $projthumb): ?>
			<div class="mix <?php echo $projthumb['category'] ?>" >
				<a href="<?php echo url().'/'.$projthumb['link'] ?>">
					<img src="<?php echo $page->image($projthumb['thumb'])->url()?>">
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>

</main>

<?php snippet( 'footer') ?>

