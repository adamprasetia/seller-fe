<?php $this->load->view('nav_view') ?>

<?php $this->load->view('carousel_view') ?>

<div class="container">
	<h1 class="text-center mt-5">Selamat Datang di <?php echo $store->title ?></h1>
	<p class="text-center"><?php echo $store->desc ?></p>
</div>
<hr>
<div class="container mt-3 mb-3" >
	<?php $this->load->view('produk_list_view', ['more'=>true]) ?>
	<?php $this->load->view('news_list_view', ['more'=>true]) ?>
</div>

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