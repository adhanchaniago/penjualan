<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Buku Besar</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main role="main">
<div class="album py-5 ">
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

                        }
                    }
                

                    function rupiah($angka){
                        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                        return $hasil_rupiah;
                    }
            ?>
            <h4>Buku Besar</h4>
            <br/>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 float-right">
                    <button class="btn btn-sm btn-secondary" id="print_pdf">PDF</button>
                </div>
            </div>
            <br/>
            <div class="row">
            <div class="col-lg-12 col-md-12">
                <h4>Kas</h4>
                <table id="table1" class="table table-bordered responsive table-hover" width="100%">
                <thead>
                    <tr style="background-color:#ffffff;">
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                    </tr>
                </thead>        
                        <tbody>
                                <tr>
                                    <td>
                                        <?php if(isset($tanggal_akhir)){
                                            echo convBulan($tanggal_akhir[0]->bulan) .' '. $tanggal_akhir[0]->tahun;
                                        }?>
                                    </td>
                                    <td>
                                        <?php
                                             if(isset($total_tagihan) && isset($total_dp)){
                                                 $totalse = $total_tagihan[0]->total_tagihan + $total_dp[0]->total_dp;
                                                 echo rupiah($totalse);
                                             }
                                        ?>
                                    </td>
                                    <td> - </td>
                                    <td>Rp. 0,00</td>
                                </tr>
                                <tr style="background-color:#eee;">
                                    <td>Sisa Saldo</td>
                                    <td>
                                        <?php
                                             if(isset($total_tagihan) && isset($total_dp)){
                                                 $totalse = $total_tagihan[0]->total_tagihan + $total_dp[0]->total_dp;
                                                 echo rupiah($totalse);
                                             }
                                        ?>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
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
              let str2 = "Buku Besar";
              // let str2 = "Your footer text";
              doc.setFontSize(12);
              doc.text(str, pageWidth / 2, 10, 'center');
              doc.text(str2, pageWidth / 2, 18, 'center');
              // doc.text(str2, pageWidth / 2, pageHeight  - 10, 'center');
              doc.autoTable({ 
                html: '#table1',
                margin: {top: 30},
              });
              doc.save('Laporan Buku Besar.pdf');
              doc.showHead('firstPage');  
        });
    });
</script>