<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><img src="<?php echo site_url('/assets/nazifalogo_navbar.svg');?>"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url();?>main">Beranda <span class="sr-only">(current)</span></a>
        </li>
        <?php
          if($this->session->userdata('status') == "login"){
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo site_url('daftar_pembelian')?>">Pembelian<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('tagihan')?>">Tagihan<span class="sr-only">(current)</span></a>
            </li>
           <?php 
          }
        ?>
    </ul>
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search"> -->
      <?php
        if($this->session->userdata('status') != "login"){?>
          <a href="<?php echo base_url()?>login"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Masuk</button></a>
        <?php }else{?>
          <span style="color:#ffffff;">Selamat Datang,&nbsp;
          <span><span style="font-weight:bold;"><?php echo $this->session->userdata('username');?></span></span>&nbsp;&nbsp;&nbsp;
          <a href="<?php echo site_url('logout')?>"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Keluar</button></a></span>
        <?php }
      ?>
  </div>
</nav>
<style>
  .navbar-nav  > li {
    padding-right:15px;
    padding-left:15px;
  }
</style>