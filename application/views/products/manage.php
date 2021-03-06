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
            <?php if ($this->session->flashdata('success_msg')) { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <?php echo $this->session->flashdata('success_msg'); ?>
                </div>
            <?php } ?>
            <h2>Ürünler</h2>
            <h3><?php echo  'Merhaba '.$this->session->userdata('name');?></h3>
            <a href="<?php echo base_url('products/create'); ?>" class="btn btn-info pull-right" style="margin-bottom: 10px"> <i class="fa fa-plus" aria-hidden="true"></i> Ürün Ekle</a>
            <?php if ($this->session->userdata('authority')==2) { ?>
                <a href="<?php echo base_url('balance/index'); ?>" class="btn btn-danger pull-right" style="margin-bottom: 10px">Bakiye Logları</a>
            <?php } ?>
            <a href="<?php echo base_url('user/index'); ?>" class="btn btn-default pull-right" style="margin-bottom: 10px"> <i class="fa fa-user" aria-hidden="true"></i>Kullanıcılar</a>
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
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="35%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ürün Adı</th>
                            <th>Açıklama</th>
                            <th>Fiyat</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $key => $aData) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $aData->name; ?></td>
                                <td><?php echo $aData->descrition; ?></td>
                                <td><?php echo $aData->price; ?></td>
                                <td>
                                    <a href="<?php echo site_url('products/sale/' . $aData->price); ?>" class="btn btn-warning" onclick = 'return confirm("Ürünü Satın Almak İstedğine Emin Misin!");'>Satın Al</a>
                                    <a href="<?php echo site_url('products/edit/' . $aData->id); ?>" class="btn btn-primary">Düzenle</a>
                                    <a href="<?php echo site_url('products/delete/' . $aData->id); ?>" class="btn btn-danger" onclick = 'return confirm("Silmek İstediğine Emin Misin!");'>Sil</a>
                                </td>
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
