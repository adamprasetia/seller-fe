<?php $this->load->view('nav_view') ?>

<div class="container" style="margin-top:100px">
	<div class="m-4 text-center justify-content-center">
		<h1><?php echo $news->title ?></h1>
		<p><?php echo format_date($news->published_at, 1) ?></p>
	</div>
</div>

<div class="container text-center">
	<img class="img-fluid" src="<?php echo base_url($news->image)?>" alt="">
</div>
<div class="container mt-2">
	<?php echo $news->content ?>
</div>

<?php if(!empty($item)): ?>
<hr>
<div class="container text-center">
	<h2>Produk</h2>
	<div class="row d-flex justify-content-center">
		<?php foreach ($item as $key => $value) { ?>
			<div class="col-md-3 p-2">
				<a class="text-dark" href="<?php echo base_url('produk/'.$value->slug) ?>" aria-label="<?php echo htmlentities($value->name) ?>">
				<div class="card">
					<img data-src="<?php echo base_url($value->image) ?>" class="lozad card-img-top" alt="<?php echo htmlentities($value->name) ?>">
					<div class="card-body text-center">
						<h3 class="card-title"><?php echo $value->name ?></h3>
						<?php if(!empty($value->price)): ?>
							<p class="card-text"><?php echo $value->price ?></p>
						<?php endif ?>
						<!-- <a href="<?php echo base_url('produk/'.$value->slug) ?>" aria-label="View Detail" class="btn btn-danger">View Detail</a> -->
					</div>
				</div>			
				</a>
			</div>
		<?php } ?>
	</div>
	<div class="text-center">
		<a href="<?php echo base_url('produk') ?>" aria-label="View Detail" class="btn btn-danger">Lihat Produk Lainnya</a>
	</div>
</div>
<?php endif ?>

<?php if(!empty($news_lain)):?>
<hr>
<div class="container mt-3 mb-3" >
	<h2 id="news" class="text-center">Info dan Promo Lainnya</h2>
	<div class="row justify-content-center">
	<?php foreach ($news_lain as $key => $value) { ?>
		<div class="col-md-4">
		<a href="<?php echo base_url('news/'.$value->slug) ?>">
		<div class="card mb-2">
			<img class="lozad card-img-top" data-src="<?php echo base_url($value->image) ?>" alt="<?php echo htmlentities($value->title) ?>">
			<div class="card-body">
				<h5 class="card-title"><?php echo $value->title ?></h5>
				<p class="card-text"><?php echo $value->desc ?></p>
				<small><?php echo format_date($value->published_at, 1) ?></small>
			</div>
		</div>
		</a>
		</div>
	<?php } ?>
	</div>
	<div class="text-center">
		<a href="<?php echo base_url('news') ?>" aria-label="View Detail" class="btn btn-danger">Lihat Info Lainnya</a>
	</div>
</div>
<?php endif ?>
