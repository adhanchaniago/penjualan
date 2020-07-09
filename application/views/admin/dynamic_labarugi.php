<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Laba Rugi</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section  style="margin-top:60px; min-height:700px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <h4>Laba Rugi</h4>
                    <br/>
                    <?php 
                        function rupiah($angka){
                            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                            return $hasil_rupiah;
                        }
                    ?>
                    <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <tbody>
                                    <tr>
                                        <td>Penjualan (harga jual)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Total Penjualan (harga jual)</td>
                                        <td></td>
                                        <td><?php echo rupiah($labarugi[0] -> total_harga_jual); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Penjualan (harga pokok)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Total Penjualan (harga pokok)</td>
                                        <td><?php echo rupiah($labarugi[0] -> total_harga_pokok); ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Laba Bersih</td>
                                        <td>Total Penjualan (harga pokok)</td>
                                        <td></td>
                                        <td><?php echo rupiah($labarugi[0] -> total_harga_jual - $labarugi[0] -> total_harga_pokok); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
</section>