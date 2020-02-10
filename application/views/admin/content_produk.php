<section style="margin-top:60px; min-height:700px;">
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
                                    <option value="42">42</option>
                                    <option value="54">54</option>
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control"  placeholder="" required>
                            <small class="text-muted">Harga sewaktu-waktu dapat berubah</small>
                            <div class="invalid-feedback">
                            Harga sewaktu-waktu dapat berubah
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Luas Tanah</label>
                            <input type="text" name="luas_tanah" class="form-control" placeholder="" required>
                            <div class="invalid-feedback">
                            Stok sewaktu-waktu dapat berubah
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Foto Gamber</label>
                            <input type="file" name="upload_image" class="form-control" placeholder="" required>
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
                                    <th>Aksi</th>
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
                                                    <td><button type="button" class="btn btn-primary">Edit</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger">Delete</button></td>
                                                </tr>
                                        <?php }

                                    }?>
                                </tbody>
                            </table>
                        </div>
            </div>
    </div>
</section>