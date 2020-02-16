<div class="section_one" style="margin-top:0px;">
  <div class="container">
  <div class="row justify-content-md-center">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <center><a href="<?php echo base_url()?>"><img width="300" src="<?php echo site_url('/assets/nazifalogo.svg');?>"></a></center>
      <br/>
      <br/>
        <form method="POST" action="<?php echo base_url('login/submit_login'); ?>">
          <div class="card">
              <article class="card-body setpad">
                <?php
                    if($this->session->flashdata('message')){ ?>
                        <div class="alert alert-warning alert-dismissible"><?php echo $this->session->flashdata('message') ?>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?php   }
                ?>
                <p class="lead"><? ?></p>
                    <div class="form-group">
                      <label>Username</label>
                        <input name="p_username" class="form-control" placeholder="Username" type="text" required>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                      <label>Your password</label>
                        <input name="p_password" class="form-control" placeholder="***********" type="password" required>
                    </div> <!-- form-group// --> 
                    <div class="form-group"> 
                    </div> <!-- form-group// -->  
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Login" style="padding-top:15px; padding-bottom:12px;"/>
                            </div> <!-- form-group// -->                                                         
                        </div>
                    </div>
              </article>
            </div>
            <br/>
            <center>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <p>Belum punya akun ? <a href="<?php echo site_url('register')?>">Daftar</a></p>
                    </div> <!-- form-group// -->                                                         
                </div>
            </div>
            </center>
          </form>
          <br/>
          <center>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                </div>
            </div>
          </center>
      </div>
  </div>
  </div>
</div>
