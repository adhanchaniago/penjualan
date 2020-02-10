<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li><a href="<?php echo base_url()?>main">Daftar Perumahan</a></li>
                    <li>Detail Produk Perumahan</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main role="main">
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
              <div class="col-md-8">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="<?php echo base_url()?>assets/images.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text" style="font-weight:bold;font-size:24px;color:#999"><?php echo $item->nama?></p>
                    <span class="" style="font-weight:bold;font-size:17px;position:relative;top:-16px;"><?php 
                    echo ''.rupiah($item->harga); ?></span>
                    <div class="d-flex justify-content-between align-items-center">
                    <input class="form-control" value="<?echo $item->harga;?>" type="hidden" name="" id="harga_beli" placeholder="Default input">
                    <small class="text-muted"><?php echo '', $item->lokasi; ?></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Down Payment 30%</label>
                            <?php
                                $dp = 0.3 * $item->harga; 
                                $sisa_dibayar = $item->harga - $dp;                           
                            ?>
                            <input class="form-control" value="<?php echo $this->session->userdata('user_id');?>" type="hidden" name="user_id" id="user_id" placeholder="Default input">
                            <input class="form-control" value="<?php echo $item->id;?>" type="hidden" name="produk_id" id="produk_id" placeholder="Default input">
                            <input class="form-control" value="<?php echo $dp;?>" id="down_payment" type="hidden" placeholder="Default input">
                            <input class="form-control" value="<?php echo $dp;?>" id="down_payment" type="hidden" placeholder="Default input">
                            <input class="form-control" readonly value="<?echo rupiah($dp);?>"  type="text" placeholder="Default input">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Sisa yang dibayar</label>
                            <input class="form-control" id="sisa_bayar" value="<?php echo $sisa_dibayar;?>" type="hidden" placeholder="Default input">
                            <input class="form-control" readonly value="<?php echo rupiah($sisa_dibayar);?>" type="text" placeholder="Default input">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tenor/ Jangka Waktu</label>
                            <select class="form-control" id="tenor">
                                <option value='' style="color:#ccc !important;">- Silahkan pilih tenor -</option>
                                <option value="10">10 Bulan</option>
                                <option value="12">12 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pembayaran perbulan</label>
                            <input class="form-control" value="0" id="bayar_perbulan" type="text" placeholder="">
                            <input class="form-control" value="0" id="bayar_perbulan_value" type="hidden" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pembayaran Awal</label>
                            <input class="form-control" readonly value="0" id="mulai_pembayaran" type="text" placeholder="">
                        </div>
                        <button type="button" class="btn btn-success" id="buy">Proses Pembelian</button>
                  </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">Luas tanah : <?php echo $item->luas_tanah .' m2' ;?></li>
                    <li class="list-group-item">Sertifikasi : <?php echo $item->sertifikasi;?></li>
                    <li class="list-group-item">Waktu ditambahkan : <?php echo $item->tanggal_ditambahkan?></li>
                </ul>
              </div>
        <?php }
    ?>
    </div>
  </div>
</div>
</main>
<script>
    $(document).ready(function(){   
        let sisa_bayar = $('#sisa_bayar').val();
        let date = new Date();
        let this_year = date.getFullYear();
        let this_month = date.getMonth() + 1;
        let month_of_bill = this_month + 1;
        let month_of_str = idToMonth(month_of_bill) ;
        let user_id = $('#user_id').val();
        let produk_id = $("#produk_id").val();
        let dp = $("#down_payment").val();
        let harga_beli = $('#harga_beli').val();
        $('#tenor').on('change', function(){
            let get_tenor = $(this).val();
            if(get_tenor == ''){
                $('#bayar_perbulan').val('');
                $('#mulai_pembayaran').val('');
                $('#mulai_pembayaran').val(" Bulan " + month_of_str + " - " + this_year );
            }else{
                let perbulan = sisa_bayar / get_tenor;
                $('#bayar_perbulan').val(convertToRupiah(perbulan));
                $('#bayar_perbulan_value').val(perbulan);
                $('#mulai_pembayaran').val(" Bulan " + month_of_str + " - " + this_year );
            }
        });
        $('#buy').on('click', function(){
                let tagihan = {};
                let get_tenor_change = $('#tenor').val();
                let perbulan_value = $('#bayar_perbulan_value').val();
                let arr_bill = [];
                if(get_tenor_change === 12 || get_tenor_change === "12"){
                    let i = 0; 
                    arr_bill = [];
                    for(i; i < get_tenor_change; i++){
                        if(month_of_bill > 12){
                            month_of_bill = 1;
                            this_year = date.getFullYear() + 1;
                        }
                        tagihan = {
                            'user_id' : '' + user_id,
                            'produk_id' : '' + produk_id,
                            'tanggal' : '30',
                            'bulan' : '' + month_of_bill,
                            'tahun' : '' + this_year,
                            'status' : 'belum'
                        };
                        month_of_bill  = month_of_bill + 1;
                        arr_bill.push(tagihan);
                    }
                    console.log(arr_bill);
                }else if(get_tenor_change === 10 || get_tenor_change === "10"){
                    let j = 0; 
                    arr_bill = [];
                    for(j; j < get_tenor_change; j++){
                        if(month_of_bill > 12){
                            month_of_bill = 1;
                            this_year = date.getFullYear() + 1;
                        }
                        tagihan = {
                            'user_id' : '' + user_id,
                            'produk_id' : '' + produk_id,
                            'tanggal' : '30',
                            'bulan' : '' + month_of_bill,
                            'tahun' : '' + this_year,
                            'status' : 'belum'
                        };
                        month_of_bill  = month_of_bill + 1;
                        arr_bill.push(tagihan);
                    }
                    console.log(arr_bill);
                }
                let pembelian = {
                    'user_id' : '' + user_id,
                    'produk_id' : '' + produk_id,
                    'down_payment' : '' + dp,
                    'total_sisa_bayar' : '' + sisa_bayar,
                    'harga_beli' : '' + harga_beli,
                    'tenor' : '' + get_tenor_change,
                    'pembayaran_perbulan' : '' + perbulan_value,
                    'tanggal_pembayaran_awal' : '',
                    'tanggal_pembayaran_akhir' : '', 
                };
                console.log(pembelian);
                console.log(tagihan);

                $.ajax({
                    url: "<?php echo base_url() ?>pembelian/add", 
                    method : 'POST',
                    data : {
                        'pembelian' : '' + JSON.stringify(pembelian),
                        'tagihan' : '' + JSON.stringify(arr_bill),
                    },
                    success: function(result){
                                let res = JSON.parse(result);
                                if(res.status == 'ok'){
                                    alert('Berhasil diproses');
                                        location.href = "<?php echo base_url();?>main";
                                }
                    },
                    error : function(result){
                        console.log('gagal broh');
                        $('#status').text('Gagal');
                    }
                });
        });
    });

    function convertToRupiah(angka)
    {
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('') + ',00';
    }

    function idToMonth(month_of_bill){
        let month_of_str;
        switch(month_of_bill){
            case 1 : 
                month_of_str = "Januari"
                break;
            case 2 :
                month_of_str = "Februari"
                break;
            case 3 :
                month_of_str = "Maret"
                break;
            case 4 : 
                month_of_str = "April"
                break;
            case 5 : 
                month_of_str = "Mei"
                break;
            case 6 :
                month_of_str = "Juni"
                break;
            case 7 :
                month_of_str = "Juli"
                break;
            case 8 : 
                month_of_str = "Agustus"
                break;
            case 9  :
                month_of_str = "September"
                break;
            case 10 :
                month_of_str = "Oktober"
                break;
            case 11 : 
                month_of_str = "November"
                break;
            case 12 : 
                month_of_str = "Desember"
                break;
        }
        return month_of_str;
    }
</script>