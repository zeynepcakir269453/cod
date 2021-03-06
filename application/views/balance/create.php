<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">

        <title>Ürün Oluştur</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">Ürün Formu</h1>

                    </div>
                </div> 
                <div class="main-login main-center">
                    <?php if (validation_errors()) { ?>
                        <div role="alert" class="alert alert-warning">
                            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                            <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('success_msg')) { ?>
                        <div class="alert alert-success fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <?php echo $this->session->flashdata('success_msg'); ?>
                        </div>
                    <?php } ?>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Ürün Adı</label>
                            <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="form-group">
                            <label for="descrition">Açıklama</label>
                            <input type="text" class="form-control" name="descrition" value="" >
                        </div>
                        <div class="form-group">
                            <label for="price">Fiyat</label>
                            <input type="text" class="form-control" name="price" value="" >
                        </div>
                        <button type="submit" name="submit" value="1" class="btn btn-primary">Ekle</button>
                    </form>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
    </body>
</html>