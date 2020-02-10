<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Daftar Pembelian</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main role="main">
<div class="album py-5 ">
  <div class="container">
            <h4>Daftar Pembelian</h4>
            <br/>
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>No. </th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Harga</th>
                                    <th>Luas Tanah (m2)</th>
                                    <th>Sertifikasi</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($pembelian)) {
                                        
                                        $i = 0;
                                        foreach($pembelian as $list) { 
                                                $i++;
                                                ?>
                                                <tr>    
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $list->nama; ?></td>
                                                    <td><?php echo $list->tipe; ?></td>
                                                    <td><?php echo $list->harga; ?></td>
                                                    <td><?php echo $list->luas_tanah; ?></td>
                                                    <td><?php 
                                                        if($list->sertifikasi == ""){
                                                            echo '-'; 
                                                        }else{
                                                            echo $list->sertifikasi; 
                                                        }
                                                    ?></td>
                                                </tr>
                                                
                                        <?php 
                                        ;}

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