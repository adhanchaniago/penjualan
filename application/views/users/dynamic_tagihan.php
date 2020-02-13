<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Daftar Tagihan</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main role="main">
<div class="album py-5 ">
  <div class="container">
            <h4>Daftar Tagihan  </h4>
            <br/>
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Produk Id</th>
                                    <th>Pembayaran</th>
                                    <th>Status</th>
                                    <th>Upload bukti</th>
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

                                        $i = 0;
                                        foreach($tagihan as $list) { 
                                                    $i++;
                                                ?>
                                                <tr>    
                                                    <td><?php echo $list->id;?></td>
                                                    <td><?php echo convBulan($list->bulan); ?></td>
                                                    <td><?php echo $list->tahun; ?></td>
                                                    <td><?php echo $list->produk_id; ?></td>
                                                    <td><?php echo $list->pembayaran_perbulan; ?></td>
                                                    <td>
                                                    <?php 
                                                        if($list->status == "belum"){
                                                            ?>
                                                                <span style="color:#f0134d;"><b>Belum Dibayar</b></span>
                                                            <?php
                                                        }else{
                                                               ?>  
                                                                <span style="color:#21bf73;"><b>Sudah Dibayar</b></span>
                                                            <?php
                                                        }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        if($list->bukti != ""){
                                                            ?>
                                                                <img style="cursor" width="100" src='<?php echo base_url('assets/proof/'.$list->bukti);?>'>
                                                            <?php
                                                        }else{
                                                               ?>  
                                                               <?php echo form_open_multipart('tagihan/upload_bukti/'.$list->id); ?>
                                                                   <input type="file" name="upload_image" id="upload_bukti_<?php echo $i;?>" required style="width:210px;">
                                                                   <input type="submit" class="btn btn-sm btn-primary" name="submit">
                                                               <?php echo form_close();?>
                                                            <?php
                                                        }
                                                    ?>
                                                    </td>
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
<script>
    $(document).ready(function(){   
    });
</script>