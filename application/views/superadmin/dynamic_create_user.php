
<div class="container">
    <br/>
    <br/>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 w-50">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url()?>users">Beranda</a></li>
                <li>Add New User</li>
            </ul>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 w-50">
        <?php echo form_open_multipart('usersetting/addsubmit'); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input name="username" type="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Fullname</label>
                <input name="fullname" type="fullname" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Role</label>
                <select name="role" class="form-control" id="exampleFormControlSelect1" required>
                    <option value="admin">Admin</option>
                    <option value="pimpinan">Pimpinan</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-sm" value="Submit">
            <!-- <button type="button" class="btn btn-success btn-sm">Submit</button> -->
        <?php echo form_close();?>
        </div>
    </div>
    <br/>
    <br/>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <table id="table1" class="table table-striped table-bordered responsive table-hover" width="100%">
                <thead>
                    <th>User Id</th>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if(isset($userlist)) {
                        
                        $i = 0;
                        foreach($userlist as $list) { 
                                ?>
                                <tr>    
                                    <td><?php echo $list->user_id; ?></td>
                                    <td><?php echo $list->username; ?></td>
                                    <td><?php echo $list->fullname; ?></td>
                                    <td><?php echo $list->email; ?></td>
                                    <td><?php echo $list->role; ?></td>
                                    <td>
                                    <button onclick="window.location.href='<?php echo base_url('usersetting/edit/'.$list->user_id);?>' " type="button" class="btn btn-success btn-sm">Edit</button>&nbsp;&nbsp;
                                    <button onclick="deletepass(<?php echo $list->user_id; ?>)" type="button" class="btn btn-danger btn-sm">Delete</button></td>
                                </tr>
                                
                        <?php 
                        ;}

                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){   
        $('#table1').DataTable();
    });

    function deletepass(id){
        var r = confirm("Hapus User ini ?");
        if (r == true) {
            window.location.href='<?php echo base_url();?>usersetting/delete/' + id;
        } else {
        }
    }
</script>