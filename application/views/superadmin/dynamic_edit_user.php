
<div class="container">
    <br/>
    <br/>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 w-50">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url()?>users">Beranda</a></li>
                <li>Edit User</li>
            </ul>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 w-50">
        <?php echo form_open_multipart('usersetting/editsubmit'); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="hidden" name="user_id" type="user_id" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username" value="<?php echo $users[0]->user_id?>" >
                <input name="username" type="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username" value="<?php echo $users[0]->username?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Fullname</label>
                <input name="fullname" type="fullname" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Lengkap" value="<?php echo $users[0]->fullname?>"  >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email" value="<?php echo $users[0]->email?>" >
            </div>
            <input type="submit" class="btn btn-success btn-sm" value="Update">
            <!-- <button type="button" class="btn btn-success btn-sm">Submit</button> -->
        <?php echo form_close();?>
        </div>
    </div>
    <br/>
</div>

<script>
    $(document).ready(function(){   
        $('#table1').DataTable();
    });
</script>