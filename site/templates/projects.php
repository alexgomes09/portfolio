<?php snippet('header') ?>

<main class="main" role="main">

	<div class="text">

		<div id="Container">
			<div class="filter" data-filter="all"><i class="icon-th-thumb"></i>Show All</div>
			<div class="filter" data-filter=".category-1">Category 1</div>
			<div class="filter" data-filter=".category-2">Category 2</div>
			</br>
			<div class="mix category-1" data-myorder="2">
				category-1
			</div>
			<div class="mix category-2" data-myorder="4">
				category-2
			</div>
			<div class="mix category-1" data-myorder="1">
				category-1
			</div>
			<div class="mix category-2" data-myorder="8">
				category-2
			</div>
		</div>
	</div>

	<?php snippet('projects') ?>

</main>

<?php snippet('footer') ?>