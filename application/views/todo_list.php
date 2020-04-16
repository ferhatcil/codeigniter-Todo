<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO List</title>
    <?php $this->load->view('dependencies/style') ?>
</head>
<body>
<div class="container">
    <h3 class="text-center">TODO List</h3>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo base_url("todo/insert") ?>" method="post">
                <div class="form-group col-md-11">
                    <input type="text" class="form-control" name="todo_title">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary">Ekle</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="mytable" class="table table-bordered table-hover">
                <thread>
                    <th>Açıklama</th>
                    <th>Durum</th>
                    <th>Sil</th>
                </thread>
                <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="getTitle<?php echo $row->id; ?>"><?php echo $row->title; ?></td>
                        <td class="text-center" style="width: 100px;">
                            <input type="checkbox"
                                   data-url="<?php echo base_url("todo/isCompletedSetter/$row->id"); ?>"
                                   class="js-switch" <?php echo ($row->isCompleted) ? 'checked' : '' ?>/>
                        </td>
                        <td class="text-center" style="width: 200px;"><a
                                    href="<?php echo base_url("todo/delete/$row->id") ?>" class="btn btn-danger">Sil</a>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="<?php echo $row->id ?>">Düzenle
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <form id="reg-form" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" name="title" class="form-control" id="recipient-name" value="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button data-url="<?php echo base_url("todo/updateTitle/"); ?>" id="updateButton" class="btn btn-warning">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('dependencies/script') ?>
</body>
</html>