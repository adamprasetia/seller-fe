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
				<a class="nav-link text-dark" href="<?php echo base_url('produk/'.$value->slug) ?>"><?php echo $value->name ?></a>
			</li>
		<?php } ?>
	</ul>
	<div class="row d-flex">
		<?php foreach ($item as $key => $value) { ?>
			<div class="col-md-3 p-2">
				<div class="card">
					<a href="<?php echo base_url($value->slug) ?>" aria-label="<?php echo htmlentities($value->name) ?>">
						<img data-src="<?php echo base_url($value->image) ?>" class="lozad card-img-top" alt="<?php echo htmlentities($value->name) ?>">
					</a>
					<div class="card-body text-center">
						<h3 class="card-title"><?php echo $value->name ?></h3>
						<p class="card-text"><?php echo $value->price ?></p>
						<a href="<?php echo base_url($value->slug) ?>" aria-label="View Detail" class="btn btn-danger">View Detail</a>
					</div>
				</div>			
			</div>
		<?php } ?>
	</div>
</div>