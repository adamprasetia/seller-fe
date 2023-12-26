<?php if(!empty($item)): ?>
    <h1 id="produk" class="text-center">Produk</h1>
	<ul class="nav justify-content-center cl-danger">
		<?php foreach ($category as $key => $value) { ?>
			<li class="nav-item">
				<a class="nav-link text-dark <?php echo $this->uri->segment(2)==$value->slug?'active':''?>" href="<?php echo base_url('category/'.$value->slug) ?>"><?php echo $value->name ?></a>
			</li>
		<?php } ?>
	</ul>
    <div class="row d-flex justify-content-center">
        <?php foreach ($item as $key => $value) { ?>
            <div class="col-md-3 p-2">
                <a href="<?php echo base_url('produk/'.$value->slug) ?>" aria-label="<?php echo htmlentities($value->name) ?>">
                    <div class="card text-dark">
                        <img data-src="<?php echo base_url(str_replace('/ori_','/300x300_',$value->image)) ?>" class="lozad card-img-top" alt="<?php echo htmlentities($value->name) ?>">
                        <div class="card-body text-center">
                            <h3 class="card-title"><?php echo $value->name ?></h3>
                            <?php if(!empty($value->price)): ?>
                                <p class="card-text"><?php echo $value->price ?></p>
                            <?php endif ?>
                            <a href="<?php echo base_url('produk/'.$value->slug) ?>" aria-label="Lihat Detail" class="btn btn-default">Lihat Detail</a>
                        </div>
                    </div>		
                </a>	
            </div>
        <?php } ?>
    </div>
    <?php if(!empty($more)):?>
        <div class="text-center">
            <a href="<?php echo base_url('produk') ?>" aria-label="View Detail" class="btn btn-danger">Selengkapnya</a>
        </div>
    <?php endif ?>
<?php endif ?>
