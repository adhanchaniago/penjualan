<style>
  .tagihan_body_opacity{
      opacity: 0.1 !important;
  }

</style>
<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li><a href="<?php echo base_url()?>daftar_pembelian_admin">Daftar Pembelian</a></li>
                    <li>Daftar Tagihan</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main role="main">
<div class="album py-5 tagihan_body">
  <div class="container">
            <h4>Daftar Tagihan  </h4>
            <br/>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">   
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">ProdukId</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="<?php echo $pembelian[0]->produk_id ?>">
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"  value="<?php echo $pembelian[0]->nama ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">   
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pembeli</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="<?php echo $pembelian[0]->nama_pembeli ?>">
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tipe</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="<?php echo $pembelian[0]->tipe ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">   
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"  value="<?php echo $pembelian[0]->harga ?>">
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Luas</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"  value="<?php echo $pembelian[0]->luas_tanah ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">   
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Sertifikasi</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"  value="<?php echo $pembelian[0]->sertifikasi ?>">
                            </div>
                        </div>
                </div>
            </div>
            <hr/>
            <br/>
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>Id</th>
                                   <th>Tanggal Tempo</th>
                                    <th>Pembayaran</th>
                                    <th>Status</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Waktu Pembayaran</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($tagihan)) {
                                        function convBulan($bulan){
                                            switch($bulan){
                                                case '1' :
                                                   return  'Januari';
                                                break;
                                                case '2' : 
                                                    return 'Februari';
                                                break;
                                                case '3' : 
                                                    return  'Maret';
                                                break;
                                                case '4' :
                                                    return  'April';
                                                break;
                                                case '5' :
                                                    return  'Mei';
                                                break;
                                                case '6' :
                                                    return  'Juni';
                                                break;
                                                case '7' :
                                                    return  'Juli';
                                                break;
                                                case '8' : 
                                                    return  'Agustus';
                                                break;
                                                case '9' : 
                                                    return  'September';
                                                break;
                                                case '10' :
                                                    return  'Oktober';
                                                break;
                                                case '11' :
                                                    return 'November';
                                                break;
                                                case '12' :
                                                    return 'Desember';
                                                break;

                                            }
                                        }
                                        foreach($tagihan as $list) { 
                                                ?>
                                                <tr>    
                                                    <td id="id_detail_<?php echo  $list->id;?>"><?php echo $list->id; ?></td>
                                                    <td><?php echo '20 ' .convBulan($list->bulan).' '.$list->tahun ?></td>
                                                    <td><?php 
                                                        if($list->status == "belum"){
                                                            ?>  
                                                                <span style="color:#f0134d;"><b>Belum Dibayar</b></span>
                                                            <?php
                                                        }else{
                                                               ?>  
                                                                <span style="color:#21bf73;"><b>Sudah Dibayar</b></span>
                                                            <?php
                                                        }
                                                    ?></td>
                                                    <td>
                                                    <div class="form-check" style="display:block;">
                                                        <input 
                                                            <?php 
                                                                if($list->status == "belum"){
                                                                    ?>  

                                                                    <?php
                                                                }else{
                                                                    ?>  
                                                                       checked
                                                                    <?php
                                                                }
                                                            ?>
                                                        
                                                        class="form-check-input" type="checkbox" value="" id="defaultCheck1" onchange="konfirmasi(this, '<?php echo $list->id;?>', '<?php echo $list->user_id;?>', '<?php echo '20 ' .convBulan($list->bulan).' '.$list->tahun ?>', '<?php echo $pembelian[0]->nama_pembeli ?>', '<?php echo $pembelian[0]->harga ?>', '<?php echo $list->id; ?>');">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                             <?php 
                                                                if($list->status == "belum"){
                                                                    ?>  
                                                                        Konfirmasi
                                                                    <?php
                                                                }else{
                                                                    ?>  
                                                                       Lunas
                                                                    <?php
                                                                }
                                                            ?>
                                                        </label>
                                                    </div>
                                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                                        Konfirmasi
                                                    </button> -->
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($list->bukti != ""){
                                                                ?>
                                                                    <img width="100" src='<?php echo base_url('assets/proof/'.$list->bukti);?>'>
                                                                <?php
                                                            }else{
                                                                ?>  
                                                                <?php echo 'Tidak mencantumkan bukti pembayaran' ?>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td> <?php echo $list->tanggal; ?></td>
                                                </tr>
                                                
                                        <?php }

                                    }?>
                                </tbody>
                            </table>
                        </div>
                        
            </div>
        </div>
    </div>
</main>
<div class="container">
    <div class="row" style="z-index:100; position:fixed;top:250px;width:60%;display:none;" id="confirmation">
        <div class="col-lg-12 col-md-12 col-xs-12" >
            <div class="card">
                <div class="card-header">
                Form Pembayaran Tagihan
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pembayaran Tenor pada</label>
                            <input type="text" class="form-control" id="tenor">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pembeli</label>
                            <input type="text" class="form-control" id="nama_pembeli">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jumlah bayaran</label>
                            <input type="text" class="form-control" id="besar_bayaran">
                        </div>
                        <button type="button" class="btn btn-primary" id="verifikasi">Verifikasi Pembayaran</button>
                        <button type="button" class="btn btn-default" id="closeme" onclick="hideme()">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){   
        $('#exampleModal').on('show.bs.modal', function (event) {
            console.log(event);
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        });
    });

    function konfirmasi(val, x, y, a, b, c, d){
        if(val.checked == true){
            $('#confirmation').show();
            $('#tenor').val(a);
            $('#nama_pembeli').val(b);
            $('#besar_bayaran').val(c);
            $('body').addClass('stop-scrolling')
            $('.tagihan_body').addClass('tagihan_body_opacity');
            console.log('true');
            $('#verifikasi').on('click', function(){
                $.ajax({
                    url: "<?php echo site_url() ?>tagihan/update_admin", 
                    method : 'POST',
                    data : {
                        'id' : '' +  x,
                        'status' : val.checked,
                        'user_id' : '' + y
                    },
                    success: function(result){
                        if(result == 'ok'){
                            var docs = new jsPDF('p', 'mm', [297, 210]);
                            docs.setFontSize(9);
                            docs.text(10, 20, 'Kwitansi Pembayaran');
                            docs.text(10, 30, '' + a);
                            docs.text(10, 35, '' + b);
                            docs.text(10, 40, '' + c);
                            docs.text(10, 90, 'Terimakasih.');
                            docs.save('hello_world.pdf');
                            // docs.output('blob');
                            // var data = new FormData();
                            // data.append('upload_image' , docs);

                            // var xhr = new XMLHttpRequest();
                            // xhr.onreadystatechange = function(callback) {
                            //     console.log(callback);
                            // if (this.readyState == 4) { 
                            //         if (this.status !== 200) {
                            //         // handle error
                            //             alert('gagal');
                            //         }else{
                            //             alert('berhasil')
                            //         }
                            //     }
                            // }
                            // let url = "<?php echo base_url(); ?>tagihan/upload_bukti2/";
                            // console.log(url);
                            // xhr.open('POST', '' + url, true);
                            // xhr.send(data);
                            // location.reload();
                        }
                    },
                    error : function(result){
                        console.log('gagal broh');
                    }
                });
            });
            $('#closeme').on('click', function(){
                val.checked = false;
            });
        }else if(val.checked == false){
            $('#confirmation').hide();
            $('#tenor').val('');
            $('#nama_pembeli').val('');
            $('#besar_bayaran').val('');
            $('body').removeClass('stop-scrolling')
            $('.tagihan_body').removeClass('tagihan_body_opacity');
            let datax = {
                    'id' : '' +  x,
                    'status' : val.checked,
                    'user_id' : '' + y
            };
            console.log(datax);
            $.ajax({
                url: "<?php echo site_url() ?>tagihan/update_admin2", 
                method : 'POST',
                data : {
                    'id' : '' +  x,
                    'status' : val.checked,
                    'user_id' : '' + y
                },
                success: function(result){
                    if(result == 'ok'){
                        location.reload();
                    }
                },
                error : function(result){
                    console.log('gagal broh');
                }
            });
        }
    }

    function hideme(){
        $('#confirmation').hide();
        $('.tagihan_body').removeClass('tagihan_body_opacity');
        $('body').removeClass('stop-scrolling')
    }

    function disableScroll() {
        if (window.addEventListener) // older FF
            window.addEventListener('DOMMouseScroll', preventDefault, false);
        document.addEventListener('wheel', preventDefault, {passive: false}); // Disable scrolling in Chrome
        window.onwheel = preventDefault; // modern standard
        window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
        window.ontouchmove  = preventDefault; // mobile
        document.onkeydown  = preventDefaultForScrollKeys;
    }

    function enableScroll() {
        if (window.removeEventListener)
            window.removeEventListener('DOMMouseScroll', preventDefault, false);
        document.removeEventListener('wheel', preventDefault, {passive: false}); // Enable scrolling in Chrome
        window.onmousewheel = document.onmousewheel = null; 
        window.onwheel = null; 
        window.ontouchmove = null;  
        document.onkeydown = null;  
    }
</script>