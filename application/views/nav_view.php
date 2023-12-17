<header>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url($store->logo) ?>" alt="Logo <?php echo $store->title ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php echo $this->uri->segment(1) == ''?'active':'' ?>">
          <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(1) == 'produk'?'active':'' ?>">
          <a class="nav-link" href="<?php echo base_url('produk') ?>">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $store->wa ?>">Test Drive</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $store->wa ?>">Simulasi Kredit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $store->wa ?>&text=<?php echo config_item('wa') ?>">Hubungi Kami</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
