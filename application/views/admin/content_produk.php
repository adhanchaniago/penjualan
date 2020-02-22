<section class="hero" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url()?>">Beranda</a></li>
                    <li>Info Produk</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section style="margin-top:30px; min-height:700px;">
    <div class="container"> 
        <?php echo form_open_multipart('produk/add'); ?>
            <div class="row">
                <div class="col-md-12 order-md-1">
                <?php
                    if($this->session->flashdata('message')){ ?>
                        <div class="alert alert-success alert-dismissible"><?php echo $this->session->flashdata('message') ?>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?php    }else if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('error') ?>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                            <?php
                        }
                ?>
                <img class="card-img-top" src="<?php echo base_url()?>assets/produk/denah2.png" alt="Card image cap">
                <br/>
                <br/>
                <br/>
                <h4 class="mb-3">Input Data Produk</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Nama Produk</label>
                            <input name="nama" type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                            Valid first name is required.   
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Tipe</label>
                                <select name="tipe" class="custom-select">
                                    <option selected>Pilih Tipe Rumah</option>
                                    <option value="36">36</option>
                                    <!-- <option value="42">42</option> -->
                                    <!-- <option value="54">54</option> -->
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Harga Jual</label>
                            <input type="number" name="harga" class="form-control"  placeholder="" required>
                            <small class="text-muted">Harga jual barang</small>
                            <div class="invalid-feedback">
                            Harga jual barang
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Harga Pokok</label>
                            <input type="number" name="harga_pokok" class="form-control"  placeholder="" required>
                            <small class="text-muted">Harga pokok / harga dasar </small>
                            <div class="invalid-feedback">
                            Harga pokok / harga dasar 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Luas Tanah</label>
                            <input type="text" name="luas_tanah" class="form-control" placeholder="" required>
                            <div class="invalid-feedback">
                            Stok sewaktu-waktu dapat berubah
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Sertifikasi</label>
                            <select name="sertifikat" class="custom-select">
                                    <option selected>Pilih Tipe Rumah</option>
                                    <option value="SHM">SHM</option>
                                    <option value="SHGB">SHGB</option>
                                    <option value="SHSRS">SHSRS</option>
                                    <option value="GIRIK">GIRIK</option>
                                    <option value="AJB">AJB</option>
                                </select>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
                </div>
            </div>
        <?php echo form_close();?>
            <br/>
            <br/>
            <h4>Daftar Produk</h4>
            <br/>
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Harga</th>
                                    <th>Luas Tanah</th>
                                    <th>Sertifikasi</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($produk)) {
                                        
                                        foreach($produk as $list) { 
                                                ?>
                                                <tr>
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
                                        <?php }

                                    }?>
                                </tbody>
                            </table>
                        </div>
            </div>
    </div>
</section>