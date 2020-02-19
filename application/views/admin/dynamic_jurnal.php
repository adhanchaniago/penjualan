<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Jurnal Umum</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main role="main">
<div class="album py-5 " style="min-height:500px;">
  <div class="container">
            <?php 
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
                        case '' : 
                            return '';

                    }
                }
            

                function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                    return $hasil_rupiah;
                }
            ?>
            <h4>Jurnal Umum</h4>
            <br/>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 float-right">
                    <button class="btn btn-sm btn-secondary" id="print_pdf">PDF</button>
                </div>
            </div>
            <br/>
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                </thead>
                                <tbody>
                                    <tr>    
                                        <td rowspan="2">
                                        <?php if(isset($tanggal_akhir) && !empty($tanggal_akhir)){
                                            
                                            // echo  explode('', $tanggal_akhir[0]->tanggal_tagihan)[0];
                                            $splitme = explode(' ', $tanggal_akhir[0]->tanggal_tagihan);
                                            // var_dump($splitme);
                                            // exit;
                                            echo $splitme[0];
                                        }else{
                                            echo '-';
                                        }
                                        ?>
                                        </td>
                                        <td>Kas</td>
                                        <td>
                                        <?php
                                             if(isset($total_tagihan) && isset($total_dp)){
                                                 $totalse = $total_tagihan[0]->total_tagihan + $total_dp[0]->total_dp;
                                                 echo rupiah($totalse);
                                             }else{
                                                 echo '-';
                                             }
                                        ?>
                                        </td>
                                        <td><?php echo '-'?></td>
                                    </tr>
                                    <tr>    
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penjualan</td>
                                        <td><?php echo '-'?></td>
                                        <td>
                                        <?php
                                             if(isset($total_tagihan) && isset($total_dp)){
                                                 $totalse = $total_tagihan[0]->total_tagihan + $total_dp[0]->total_dp;
                                                 echo rupiah($totalse);
                                             }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php 
                                      $check2 = isset($daftar_jurnal);
                                      if($check2){
                                          foreach($daftar_jurnal as $list){
                                            $split_date = explode(' ', $list->tanggal_tagihan);
                                              
                                              ?>
                                                  <tr>
                                                    <td rowspan="2"><?php echo $split_date[0]; ?></td>
                                                    <td><?php echo $list->nama . '' ;?></td>
                                                    <td><?php echo rupiah($list->pembayaran_perbulan); ?></td>
                                                    <td><?php echo '-' ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Kas' ; ?></td>
                                                    <td><?php echo '-'; ?></td>
                                                    <td><?php 
                                                    echo rupiah($list->pembayaran_perbulan); ?></td>
                                                  </tr>
                                          <?php }?>
                                      <?php }
                                  ?>
                                </tbody>
                            </table>
                        </div>
            </div>
  </div>
</div>
</main>
<script>
    $(document).ready(function(){   
        $('#print_pdf').on('click', function(){
              // var doc = new jsPDF({
              //   orientation: 'landscape',
              //   unit: 'in',
              //   format: [4, 2]
              // })

              // doc.text('Hello world!', 1, 1)
              // doc.save('two-by-four.pdf')
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
              var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
              var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();
              let str = "Nazifa Residence";
              let str2 = "Jurnal Umum";
              // let str2 = "Your footer text";
              doc.setFontSize(12);
              doc.text(str, pageWidth / 2, 10, 'center');
              doc.text(str2, pageWidth / 2, 18, 'center');
              // doc.text(str2, pageWidth / 2, pageHeight  - 10, 'center');
              doc.autoTable({ 
                html: '#table1',
                margin: {top: 30},
              });
              doc.save('Laporan Jurnal Umum.pdf');
              doc.showHead('firstPage');  
        });
    });
</script>