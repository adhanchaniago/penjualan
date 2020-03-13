<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Daftar Penjualan</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main role="main">
<div class="album py-5 "  style="min-height:500px;">
  <div class="container">
            <h4>Daftar Penjualan</h4>
            <br/>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 float-right">
                    <button class="btn btn-sm btn-secondary" id="print_pdf">PDF</button>
                </div>
            </div>
            <br/>
            <?php 
                function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                    return $hasil_rupiah;
                }
            ?>
              <div class="row">
                            <table id="table2" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>No. </th>
                                    <th>Produk Id</th>
                                    <th>Produk</th>
                                    <th>Pembeli</th>
                                    <th>Tipe</th>
                                    <th>Harga</th>
                                    <th>Harga Pokok</th>
                                    <th>Keuntungan</th>
                                    <th>Luas (m2)</th>
                                    <th>Sertifikasi</th>
                                    <th>Tanggal</th>
                                    <th class="hide_table">Tagihan</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($pembelian)) {
                                        $i = 1;
                                        $total_penjualan = 0;
                                        foreach($pembelian as $list) { 
                                            $total_penjualan = $total_penjualan + $list->harga;
                                            ?>
                                                <tr>    
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $list->produk_id; ?></td>
                                                    <td><?php echo $list->nama; ?></td>
                                                    <td><?php echo $list->nama_pembeli; ?></td>
                                                    <td><?php echo $list->tipe; ?></td>
                                                    <td><?php echo rupiah($list->harga); ?></td>
                                                    <td><?php echo rupiah($list->harga_pokok); ?></td>
                                                    <td><?php echo rupiah($list->keuntungan); ?></td>
                                                    <td><?php echo $list->luas_tanah; ?></td>
                                                    <td><?php 
                                                        if($list->sertifikasi == ""){
                                                            echo '-'; 
                                                        }else{
                                                            echo $list->sertifikasi; 
                                                        }
                                                    ?></td>
                                                    <td><?php echo $list->tanggal_ditambahkan; ?></td>
                                                    <td class="hide_table"><a href="<?php echo site_url('tagihan/daftar_admin').'/'.$list->user_id.'-'.$list->produk_id;?>">Lihat Daftar Tagihan</a></td>
                                                
                                        <?php $i++;}

                                    }?>
                                </tbody>
                                <tbody>
                                    <tr style="background : #ddd;">
                                        <td></td>
                                        <td>Total </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php echo $total_penjualan; ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>    
                                    </tr>
                                </tbody>
                            </table>

                            <table id="table2" class="table table-striped table-bordered responsive table-hover" width="100%" style="visibility:hidden;">
                                <thead>
                                    <th>Produk</th>
                                    <th>Total Unit Terjual</th>
                                    <th>Harga Total</th>
                                </thead>
                                <tbody>
                                    <tr style="background : #ddd;">
                                        <td>Rumah Tipe 36</td>
                                        <td><?php echo sizeof($pembelian);?></td>
                                        <td><?php echo $total_penjualan;?></td>
                                    </tr>
                                </tbody>
                            </table>
            </div>
            <div class="row">
                            <table id="table1" style="display:none;" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>No. </th>
                                    <th>Produk Id</th>
                                    <th>Produk</th>
                                    <th>Pembeli</th>
                                    <th>Tipe</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Pokok</th>
                                    <th>Keuntungan</th>
                                    <th>Luas (m2)</th>
                                    <th>Sertifikasi</th>
                                    <th>Tanggal</th>
                                    <th class="hide_table">Tagihan</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($pembelian)) {
                                        $i = 1;
                                        $total_penjualan = 0;
                                        foreach($pembelian as $list) { 
                                            $total_penjualan = $total_penjualan + $list->harga;
                                            ?>
                                                <tr>    
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $list->produk_id; ?></td>
                                                    <td><?php echo $list->nama; ?></td>
                                                    <td><?php echo $list->nama_pembeli; ?></td>
                                                    <td><?php echo $list->tipe; ?></td>
                                                    <td><?php echo rupiah($list->harga); ?></td>
                                                    <td><?php echo rupiah($list->harga_pokok); ?></td>
                                                    <td><?php echo rupiah($list->keuntungan); ?></td>
                                                    <td><?php echo $list->luas_tanah; ?></td>
                                                    <td><?php 
                                                        if($list->sertifikasi == ""){
                                                            echo '-'; 
                                                        }else{
                                                            echo $list->sertifikasi; 
                                                        }
                                                    ?></td>
                                                    <td><?php echo $list->tanggal_ditambahkan; ?></td>
                                                    <td class="hide_table"><a href="<?php echo site_url('tagihan/daftar_admin').'/'.$list->user_id.'-'.$list->produk_id;?>">Lihat Daftar Tagihan</a></td>
                                                
                                        <?php $i++;}

                                    }?>
                                </tbody>
                                <tbody>
                                    <tr style="background : #ddd;">
                                        <td></td>
                                        <td>Total </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php echo $total_penjualan; ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>    
                                    </tr>
                                </tbody>
                            </table>

                            <table id="table2" class="table table-striped table-bordered responsive table-hover" width="100%" style="visibility:hidden;">
                                <thead>
                                    <th>Produk</th>
                                    <th>Total Unit Terjual</th>
                                    <th>Harga Total</th>
                                </thead>
                                <tbody>
                                    <tr style="background : #ddd;">
                                        <td>Rumah Tipe 36</td>
                                        <td><?php echo sizeof($pembelian);?></td>
                                        <td><?php echo $total_penjualan;?></td>
                                    </tr>
                                </tbody>
                            </table>
            </div>
  </div>
</div>
</main>
<script>
    $(document).ready(function(){   
        $('#table2').DataTable();
        $('#print_pdf').on('click', function(){
              // var doc = new jsPDF({
              //   orientation: 'landscape',
              //   unit: 'in',
              //   format: [4, 2]
              // })
               
              // doc.text('Hello world!', 1, 1)
              // doc.save('two-by-four.pdf')
              $('#table1').hide();
              var doc = new jsPDF();

              var specialElementHandlers = {
                  '#editor': function(element, renderer){
                      return true;
                  }
              };
              // doc.fromHTML($('#table_pdf').get(0),15,20 , {
              //   'width': 600, 
              //   'elementHandlers': specialElementHandlers
              // });
              // doc.autoTableSetDefaults({
              //     addPageContent: function(data) {
              //       doc.text("Header", 10, 10);
              //     }
              // });

              var currentdate = new Date(); 
                var datetime = "" + currentdate.getDate() + "/"
                                + (currentdate.getMonth()+1)  + "/" 
                                + currentdate.getFullYear() + " "  
                                + currentdate.getHours() + ":"  
                                + currentdate.getMinutes() + ":" 
                                + currentdate.getSeconds();
              var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
              var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();
              let str = "Nazifa Residence";
              let str2 = "Laporan Penjualan";
              let str3 = "" + datetime;
              // let str2 = "Your footer text";
              doc.setFontSize(12);
              doc.text(str, pageWidth / 2, 10, 'center');
              doc.text(str2, pageWidth / 2, 18, 'center');
              doc.text(str3, pageWidth / 2, 26, 'center');
            //   doc.text(str3, pageWidth / 2, pageHeight  - 10, 'center');
              doc.autoTable({ 
                html: '#table2',
                margin: {top: 30},
              });
              doc.save('Laporan Penjualan.pdf');
              doc.showHead('firstPage');  
        });
    });
</script>