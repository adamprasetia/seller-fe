<?php $this->load->view('nav_view') ?>

<?php $this->load->view('carousel_view') ?>

<div class="container">
	<h1 class="text-center mt-5">Selamat Datang di <?php echo $store->title ?></h1>
	<p class="text-center"><?php echo $store->desc ?></p>
</div>
<hr>
<div class="container mt-3 mb-3" >
	<h2 id="produk" class="text-center">Produk</h2>
	<ul class="nav justify-content-center nav-pills cl-danger">
		<?php foreach ($category as $key => $value) { ?>
			<li class="nav-item">
				<a class="nav-link text-dark" href="<?php echo base_url('category/'.$value->slug) ?>"><?php echo $value->name ?></a>
			</li>
		<?php } ?>
	</ul>
	<div class="row d-flex justify-content-center">
		<?php foreach ($item as $key => $value) { ?>
			<div class="col-md-3 p-2">
				<div class="card">
					<a href="<?php echo base_url('produk/'.$value->slug) ?>" aria-label="<?php echo htmlentities($value->name) ?>">
						<img data-src="<?php echo base_url($value->image) ?>" class="lozad card-img-top" alt="<?php echo htmlentities($value->name) ?>">
					</a>
					<div class="card-body text-center">
						<h3 class="card-title"><?php echo $value->name ?></h3>
						<?php if(!empty($value->price)): ?>
							<p class="card-text"><?php echo $value->price ?></p>
						<?php endif ?>
						<!-- <a href="<?php echo base_url('produk/'.$value->slug) ?>" aria-label="View Detail" class="btn btn-danger">View Detail</a> -->
					</div>
				</div>			
			</div>
		<?php } ?>
	</div>
	<div class="text-center">
		<a href="<?php echo base_url('produk') ?>" aria-label="View Detail" class="btn btn-danger">Lihat Produk Selengkapnya</a>
	</div>
</div>
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
	<div class="text-center">
		<a href="<?php echo base_url('news') ?>" aria-label="View Detail" class="btn btn-danger">Lihat Info Selengkapnya</a>
	</div>
</div>
<?php endif ?>

<?php if(!empty($client)):?>
<hr>
<div class="container mt-3 mb-3">
	<h2 id="client" class="text-center">Client</h2>
	<p class="text-center">Testimoni dari pelanggan setia Toyota</p>
	<div class="row justify-content-center">
	<?php foreach ($client as $key => $value) { ?>
		<div class="col-md-4">
		<div class="card">
			<img class="lozad card-img-top" data-src="<?php echo base_url($value->image) ?>" alt="<?php echo htmlentities($value->title) ?>">
			<div class="card-body">
				<h5 class="card-title"><?php echo $value->title ?></h5>
				<p class="card-text"><?php echo $value->desc ?></p>
			</div>
		</div>
		</div>
	<?php } ?>
	</div>
</div>
<?php endif ?>