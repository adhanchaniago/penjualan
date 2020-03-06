
<div class="container">
    <br/>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a href="<?php base_url();?>users/create"><button type="button" class="btn btn-success btn-sm">Add New User</button></a>
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
                                </td>
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