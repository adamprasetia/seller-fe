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