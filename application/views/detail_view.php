<?php $this->load->view('nav_view') ?>

<div class="container" style="margin-top:100px">
	<div class="m-4 text-center">
		<h1><?php echo $item->name ?></h1>
	</div>
</div>

<div class="container text-center">
	<img class="img-fluid" src="<?php echo base_url($item->image)?>" alt="">
</div>
<div class="container mt-2">
	<?php echo $item->desc ?>
</div>

<?php $gallery = json_decode($item->gallery);
	if(!empty($gallery)):
?>
<div class="container mt-3">
	<div class="m-4 text-center">
		<h2>Galeri</h2>
	</div>

	<div id="carouselExampleIndicators" class="carousel slide mt-2" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach ($gallery as $key => $value) { ?>		
				<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>" class="<?php echo $key == 0?'active':'' ?>"></li>
			<?php } ?>
		</ol>
		<div class="carousel-inner">
			<?php foreach ($gallery as $key => $value) { ?>		
				<div class="carousel-item <?php echo $key == 0?'active':'' ?>">
					<img class="d-block w-100" src="<?php echo base_url($value) ?>">
				</div>
			<?php } ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>	
</div>
<?php endif ?>
		
<?php if(!empty($item->video_id)): ?>
<div class="container">
	<div class="m-4 text-center">
		<h2>Video</h2>
	</div>
	<div>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $item->video_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		</div>
	</div>
</div>
<?php endif ?>

<div class="container">
	<div class="mt-3 text-center">
		<?php if($item->pdf):?>
			<a download href="<?php echo base_url($item->pdf) ?>" class="btn btn-danger"><i class="fa fa-download"></i> Download PDF</a>
		<?php endif ?>

		<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $store->wa ?>&text=<?php echo config_item('wa') ?>" class="btn btn-danger"><i class="fa fa-info-circle"></i> Info Lebih Lanjut</a>
	</div>
</div>

<?php if(!empty($item_lain)): ?>
<hr>
<div class="container text-center">
	<h2>Produk Lainnya</h2>
	<div class="row d-flex justify-content-center">
		<?php foreach ($item_lain as $key => $value) { ?>
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

<?php if(!empty($news)):?>
<hr>
<div class="container mt-3 mb-3" >
	<h2 id="news" class="text-center">Info dan Promo</h2>
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
	<div class="text-center">
		<a href="<?php echo base_url('news') ?>" aria-label="View Detail" class="btn btn-danger">Lihat Info Selengkapnya</a>
	</div>
</div>
<?php endif ?>
