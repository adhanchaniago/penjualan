
<div class="container">
    <br/>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
            <div class="card" style="width:100%;">
                <h5 class="card-header">Jumlah Pelanggan Terdaftar</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php 
                            if(isset($users)) {
                                echo sizeof($users);
                            }
                        ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
            <div class="card" style="width:100%;">
                <h5 class="card-header">Jumlah Produk Terdaftar</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php 
                            if(isset($produk)) {
                                echo sizeof($produk);
                            }
                        ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
            <div class="card" style="width:100%;">
                <h5 class="card-header">Jumlah Penjualan</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php 
                            if(isset($pembelian)) {
                                echo sizeof($pembelian);
                            }
                        ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){   
            let scanbutton = $('#scanning');
            scanbutton.on('click', function(){
                let get_data_input = $('#inputurl').val();
                let checking_input = get_data_input == "" ? true : false;
                if(checking_input){
                    alert('Data kosong');
                }else{
                    $('.loader').show();
                    $('#status').show();
                    $.ajax({
                        url: "<?php echo base_url() ?>scan", 
                        method : 'POST',
                        data : {
                            urls : get_data_input
                        },
                        success: function(result){
                            if(result == 'ok'){
                                setTimeout(function(){
                                    $('.loader').hide();
                                    $('#status').hide();
                                    $('#notif').show();
                                    location.reload();
                                }, 3000);
                            }
                        },
                        error : function(result){
                            console.log('gagal broh');
                            $('#status').text('Gagal');
                        }
                    });
                }
            });
            
    });
</script>