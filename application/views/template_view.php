<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- title of site -->
        <title><?php echo isset($meta['title'])?$meta['title']:''?></title>
		<meta name="description" content="<?php echo isset($meta['desc'])?$meta['desc']:''?>">
		<meta name="keywords" content="<?php echo isset($meta['keyword'])?$meta['keyword']:''?>">
		<meta name="googlebot-news" content="index, follow" />
		<meta  name="googlebot" content="index, follow" />
		<meta name="author" content="Sendi Agustian, ST">
		<meta name="robots" content="index, follow" />
		<meta name="language" content="id" />
		<meta name="geo.country" content="id" />
		<meta http-equiv="content-language" content="In-Id" />
		<meta name="geo.placename" content="Indonesia" />

		<!-- S:fb meta -->
		<meta property="og:image" content="<?php echo isset($meta['image'])?$meta['image']:base_url('assets/images/share.jpg') ?>" />
		<meta property="og:title" content="<?php echo isset($meta['title'])?$meta['title']:''?>" />
		<meta property="og:description" content="<?php echo isset($meta['desc'])?$meta['desc']:''?>">
		<meta property="og:url" content="<?php echo current_url() ?>" />
		<meta property="og:site_name" content="<?php echo $store->title ?>" />
		<!-- e:fb meta -->

		<!-- S:tweeter card -->
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:title" content="<?php echo isset($meta['title'])?$meta['title']:''?>" />
		<meta name="twitter:description" content="<?php echo isset($meta['desc'])?$meta['desc']:''?>" />
		<meta name="twitter:image" content="<?php echo isset($meta['image'])?$meta['image']:base_url('assets/images/share.jpg') ?>" />
		<!-- E:tweeter card -->


        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="<?php echo base_url($store->icon) ?>"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">       
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">       
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		<main role="main">
        <?php echo isset($content)?$content:'' ?>
		</main>

		<hr>
		<div class="bg-dark text-light pb-5 pt-3"> 
			<footer class="container">
				<div class="row">
					<div class="col-md-4">
						<p><strong><?php echo $store->title ?></strong></p>
						<p><?php echo $store->address ?></p>
						<h3><?php echo $store->pic ?></h3>					
						<h4><?php echo $store->phone ?></h4>					
					</div>
					<div class="col-md-4">
						<p><strong>Model</strong></p>
						<ul>
							<?php foreach ($category as $key => $value) { ?>
								<li><a class="text-light" href="<?php echo base_url('produk/'.$value->slug) ?>"><?php echo $value->name ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-md-4">
						<p class="float-right"><a class="text-light" href="#">Back to top</a></p>
					</div>
				</div>
			  </footer>
		</div>

		<script>
			var observer = lozad('.lozad', {
				rootMargin: '10px 0px', // syntax similar to that of CSS Margin
				threshold: 0.1, // ratio of element convergence
				enableAutoReload: true // it will reload the new image when validating attributes changes
			});
			observer.observe();
		</script>

		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
	
</html>