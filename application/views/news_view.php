<?php $this->load->view('nav_view') ?>

<div class="container mb-3" style="margin-top:100px">
    <h1 id="news" class="text-center">News</h1>
	<div class="row">
	<?php foreach ($news as $key => $value) { ?>
		<div class="col-md-4 mb-2">
		<div class="card">
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
</div>