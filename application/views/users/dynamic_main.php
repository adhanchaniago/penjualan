<section class="jumbotron" style="padding-top:110px;padding-bottom:110px;"  id="jumboback">
    <div class="container">
      <h1 class="jumbotron-heading" style="color:#fff;">Nazifa Residence - Kota Palembang</h1>
      <p class="lead" style="color:#fff;">Hunian dengan harga terjangkau, akad jelas dan tidak ada akad riba.</p>
    </div>
</section>
<main role="main">

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Daftar Perumahan</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="album py-5 ">
  <div class="container">
    <div class="row">
    <?php 
    function rupiah($angka){
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
    }
        foreach($produk as $item){
          ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="<?php echo base_url()?>assets/images.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text" style="font-weight:bold;font-size:24px;color:#999"><?php echo $item->nama?></p>
                    <span class="" style="font-weight:bold;font-size:17px;position:relative;top:-16px;"><?php 
                    echo ''.rupiah($item->harga); ?></span>
                    <div class="d-flex justify-content-between align-items-center">

                    <small class="text-muted"><?php echo '', $item->lokasi; ?></small>
                    <?php
                      if($this->session->userdata('status') != "login"){?>
                        <a href="<?php base_url()?>login"><button type="button" class="btn btn-info">Login untuk membeli</button></a>
                      <?php }else{?>
                        <a href="<?php echo site_url('main/detail').'/'.$item->id;?>"><button type="button" class="btn btn-success btn-block">Beli</button></a>
                      <?php }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
        <?php }
    ?>
    </div>
  </div>
</div>
</main>
<style>
  #jumboback{
    background-image : url("https://i.pinimg.com/originals/e4/76/a7/e476a79d454f89fc0930fde6eca4176b.jpg")
  }
</style>
<script>
    $(document).ready(function(){   
            let scanbutton = $('#scanning');
            scanbutton.on('click', function(){
                let get_data_input = $('#inputurl').val();
                let checking_input = get_data_input == "" ? true : false;
                if(checking_input){
                    alert('Data kosong');
                }else{
                    $('.loader').show();
                    $('#status').show();
                    $.ajax({
                        url: "<?php echo base_url() ?>scan", 
                        method : 'POST',
                        data : {
                            urls : get_data_input
                        },
                        success: function(result){
                            if(result == 'ok'){
                                setTimeout(function(){
                                    $('.loader').hide();
                                    $('#status').hide();
                                    $('#notif').show();
                                    location.reload();
                                }, 3000);
                            }
                        },
                        error : function(result){
                            console.log('gagal broh');
                            $('#status').text('Gagal');
                        }
                    });
                }
            });
            
    });
</script>