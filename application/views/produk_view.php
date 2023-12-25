<?php $this->load->view('nav_view') ?>

<div class="container mb-3" style="margin-top:100px">
	<h1 id="produk" class="text-center">Produk</h1>
	<ul class="nav justify-content-center cl-danger">
		<?php foreach ($category as $key => $value) { ?>
			<li class="nav-item">
				<a class="nav-link text-dark <?php echo $this->uri->segment(2)==$value->slug?'active':''?>" href="<?php echo base_url('category/'.$value->slug) ?>"><?php echo $value->name ?></a>
			</li>
		<?php } ?>
	</ul>

	<div class="row d-flex">
		<?php foreach ($item as $key => $value) { ?>
			<div class="col-md-3 p-2">
				<div class="card">
					<a href="<?php echo base_url('produk/'.$value->slug) ?>"><img src="<?php echo base_url($value->image) ?>" class="card-img-top" alt="<?php echo htmlentities($value->name) ?>"></a>
					<div class="card-body text-center">
						<h5 class="card-title"><?php echo $value->name ?></h5>
						<p class="card-text"><?php echo $value->price ?></p>
						<a href="<?php echo base_url('produk/'.$value->slug) ?>" class="btn btn-danger">View Detail</a>
					</div>
				</div>			
			</div>
		<?php } ?>
	</div>
</div>