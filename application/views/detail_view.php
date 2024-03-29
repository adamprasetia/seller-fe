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

<?php $this->load->view('produk_list_view', ['item'=>$item_lain, 'more'=>true]) ?>
<?php $this->load->view('news_list_view', ['more'=>true]) ?>