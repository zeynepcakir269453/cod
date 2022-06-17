<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kullanıcılar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Kullanıcılar</h2>
            <a href="<?php echo base_url('user/create'); ?>" class="btn btn-info pull-right" style="margin-bottom: 10px"> <i class="fa fa-plus" aria-hidden="true"></i> Kullanıcı Ekle</a>
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
                            <th>Kullanıcı Adı</th>
                            <th>Yetkisi</th>
                            <th>Bakiye</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $key => $aData) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $aData->name; ?></td>
                                <td><?php echo $aData->authority; ?></td>
                                <td><?php echo $aData->balance; ?></td>
                                <td>
                                    <a href="<?php echo site_url('user/edit/' . $aData->user_id); ?>" class="btn btn-primary">Düzenle</a>
                                    <a href="<?php echo site_url('user/delete/' . $aData->user_id); ?>" class="btn btn-danger" onclick = 'return confirm("Silmek İstediğine Emin Misin!");'>Sil</a>
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
