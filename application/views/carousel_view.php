<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $i=0;foreach ($headline as $key => $value) { ?>		
        <?php if(!empty($value->cover)){ ?>		
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i++ ?>" class="<?php echo $i == 0?'active':'' ?>"></li>
        <?php } ?> 
    <?php } ?>
  </ol>
  <div class="carousel-inner">
      <?php $i=1;foreach ($headline as $key => $value) { ?>		
        <?php if(!empty($value->cover)){ ?>		
            <div class="carousel-item <?php echo $i++ == 1?'active':'' ?>">
                <a aria-label="<?php echo htmlentities($value->name) ?>" href="<?php echo base_url($value->slug) ?>"><img class="d-block w-100" src="<?php echo base_url($value->cover) ?>" alt=""></a>
            </div>
        <?php } ?>
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