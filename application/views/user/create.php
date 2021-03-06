<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">

        <title>Kullanıcı Oluştur</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">Kullanıcı Formu</h1>

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
                            <label for="name">Kullanıcı Adı</label>
                            <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="form-group">
                            <label for="password">Şifre</label>
                            <input type="password" class="form-control" name="password" value="" placeholder="Şifre">
                        </div>
                        <div class="form-group">
                            <label for="balance">Bakiye</label>
                            <input type="text" class="form-control" name="balance" value="" placeholder="Bakiye">
                        </div>
                        <div class="form-group">
                            <label for="authority">Authoritazion</label>
                            <select class="form-control"  name="authority" id="authority">
                                <option value="0" selected>Üyeler sayfasını görebilme</option>
                                <option value="1">Yöneticiler sayfasını görebilme</option>
                                <option value="2">Bakiye hareketlerini görebilme</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" value="1" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
    </body>
</html>