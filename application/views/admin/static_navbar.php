<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><img src="<?php echo site_url('/assets/nazifalogo_navbar.svg');?>"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('main');?>"">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('pelanggan');?>">Pelanggan </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('produk');?>">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('daftar_pembelian_admin');?>">Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('jurnal');?>">Jurnal Umum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('bukubesar');?>">Buku Besar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="display:none;">Laporan</a>
        </li>
    </ul>
    <span>
  
    <span style="color:#ffffff;">Selamat Datang <?php echo $this->session->userdata('username');?></span>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('logout');?>"><button class="btn btn-sm btn-outline-light my-2 my-sm-0">Logout</button></a></span>
  </div>
</nav>
<style>
  .navbar-nav  > li {
    padding-right:15px;
    padding-left:15px;
  }
</style>