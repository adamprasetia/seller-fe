<?php if(!empty($news)):?>
<hr>
<div class="container mt-3 mb-3" >
	<h2 id="news" class="text-center">News</h2>
	<p class="text-center">Kumpulan info dan promo menarik</p>
	<div class="row justify-content-center">
	<?php foreach ($news as $key => $value) { ?>
		<div class="col-md-4">
		<div class="card mb-2">
			<img class="lozad card-img-top" data-src="<?php echo base_url($value->image) ?>" alt="<?php echo htmlentities($value->title) ?>">
			<div class="card-body">
				<a href="<?php echo base_url('news/'.$value->slug) ?>"><h5 class="card-title"><?php echo $value->title ?></h5></a>
				<p class="card-text"><?php echo $value->desc ?></p>
				<small><?php echo format_date($value->published_at, 1) ?></small>
			</div>
		</div>
		</div>
	<?php } ?>
	</div>
    <?php if(!empty($more)):?>
	<div class="text-center">
		<a href="<?php echo base_url('news') ?>" aria-label="View Detail" class="btn btn-danger">Selengkapnya</a>
	</div>
    <?php endif ?>
</div>
<?php endif ?>