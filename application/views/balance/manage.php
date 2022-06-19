<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ürünler</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Bakiye Geçmişi</h2>
            <h3><?php echo  'Merhaba '.$this->session->userdata('name');?></h3>
            <a href="<?php echo base_url('products/index'); ?>" class="btn btn-success pull-right" style="margin-bottom: 10px"> <i class="fa fa-product-hunt" aria-hidden="true"></i> Ürünlerim</a>
            <a href="<?php echo base_url('user/index'); ?>" class="btn btn-default pull-right" style="margin-bottom: 10px"> <i class="fa fa-user" aria-hidden="true"></i>Kullanıcılar</a>

            <a href="<?php echo base_url('user/create'); ?>" class="btn btn-info pull-right" style="margin-bottom: 10px"> <i class="fa fa-plus" aria-hidden="true"></i> Kullanıcı Ekle</a>
            <a href="<?php echo base_url('user/indexlogin'); ?>" class="btn btn-warning pull-right" style="margin-bottom: 10px"> <i class="fa fa-plus" aria-hidden="true"></i>Bakiye Yükle</a>
            <?php if ($this->session->userdata('name')) { ?>
                <a href="<?php echo base_url('user/logout'); ?>" class="btn btn-danger pull-right" style="margin-bottom: 10px">Çıkış Yap</a>
            <?php }else{ ?>
                <a href="<?php echo base_url('user/indexlogin'); ?>" class="btn btn-warning pull-right" style="margin-bottom: 10px">Giriş Yap</a>
            <?php } ?>
            <?php if (!empty($all_data)) { ?>
                <table class="table table-bordered">
                    <colgroup>
                        <col width="5%">
                        <col width="30%">
                        <col width="20%">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kullanıcı Adı</th>
                            <th>Aksiyon</th>
                            <th>Önceki Bakiye</th>
                            <th>İşlemden Sonraki Bakiye</th>
                            <th>İşlem Zamanı</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $key => $aData) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $aData->user; ?></td>
                                <td><?php echo $aData->action; ?></td>
                                <td><?php echo $aData->pre_balance; ?></td>
                                <td><?php echo $aData->new_balance; ?></td>
                                <td><?php echo $aData->created_date; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>

        <!-- Modal -->
        <div id="userModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">

                </div>
            </div>
        </div>
        
        <script>
            /******bootstrap section ***/
            $(function () {
                // modal refrest in every load
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });
            });
        </script>
    </body>
</html>
