<section style="margin-top:60px; min-height:700px;">
    <div class="container"> 
            <?php echo form_open_multipart('pelanggan/add'); ?>
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
                <h4 class="mb-3">Input Data Pelanggan</h4>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nama</label>
                        <input name="nama" type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">No. KTP</label>
                        <input name="nik"  type="text" class="form-control" id="lastName" placeholder="" value="" required>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">No. Telepon</label>
                            <input name="telepon" type="text" class="form-control" id="cc-name" placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Email</label>
                            <input name="email"  type="text" class="form-control" id="cc-number" placeholder="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Alamat</label>
                            <input name="alamat" type="text" class="form-control" id="cc-name" placeholder="" required>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <input type="submit" value="Simpan" class="btn btn-primary btn-lg btn-block" name="submit" id="submit_pdpt"/> 
                </div>
            </div>
            <?php echo form_close();?>
            <br/>
            <br/>
            <h4>Daftar Pelanggan</h4>
            <br/>
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                                <thead>
                                    <th>Nama</th>
                                    <th>No. KTP</th>
                                    <th>No. Telepon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($users)) {
                                        
                                        foreach($users as $list) { 
                                                ?>
                                                <tr>
                                                    <td><?php echo $list->fullname; ?></td>
                                                    <td><?php echo $list->nik; ?></td>
                                                    <td><?php echo $list->telepon; ?></td>
                                                    <td><?php echo $list->email; ?></td>
                                                    <td><?php echo $list->alamat; ?></td>
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
<script>
  $('#table1').DataTable({});
</script>