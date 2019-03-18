<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm " data-toggle="modal" data-target="#add_pembeli">Tambah</button>
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Data Pembeli</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-condensed mb-none table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Telpon</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-left">Aksi</th>
                    </tr>
                </thead>
                <?php 
                $no = 0;
                foreach ($dataPembeli as $pmbl) {
                $no++;
                echo '
                <tbody>
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$pmbl->id_pembeli.'</td>
                        <td>'.$pmbl->nama_pembeli.'</td>
                        <td>'.$pmbl->telp.'</td>
                        <td>'.$pmbl->username.'</td>
                        <td>'.$pmbl->password.'</td>
                        <td class="text-left"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm" data-toggle="modal" data-target="#up_pembeli" onclick="tm_detail('.$pmbl->id_pembeli.')"><i class="fa fa-pencil"></i> UPDATE</button><a href='.base_url('index.php/pembeli/deletepembeli/'.$pmbl->id_pembeli).' class="mb-xs mt-xs mr-xs btn btn-danger btn btn-sm" onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Ini ?\')"><i class="fa fa-trash-o"></i> DELETE</a></td>
                    </tr>
                </tbody>
                ';
                } 
                ?>
            </table>
             <?php if ($this->session->flashdata('pesan')!=null): ?>
             <div class="alert alert-danger">
             <?= $this->session->flashdata('pesan');?>
             </div>
            <?php endif ?>
        </div>
    </div>
</section>

<div class="modal fade" id="add_pembeli">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Tambah pembeli</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/pembeli/tambahpembeli')?>" method="post">
                                    <div class="form-group">
                                    <label for="">Nama pembeli</label>
                                    <input type="text" name="nama_pembeli" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" name="telp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                    <div class="col-md-12 text-right">
                                    <button class="btn btn-primary">Confirm</button>
                                    <button class="btn btn-default " data-dismiss="modal">Cancel</button>
                                    </div>
								</div>
                            </div>
                      </form>
               </div>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="up_pembeli">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Update pembeli</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/pembeli/updatepembeli')?>" method="post">
                                    <input type="hidden" name="id_pembeli" id="id_pembeli" class="form-control">
                                    <div class="form-group">
                                    <label for="">Nama pembeli</label>
                                    <input type="text" name="nama_pembeli" id="nm_pembeli" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" name="telp" id="telp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                    <div class="col-md-12 text-right">
                                    <button class="btn btn-primary">Confirm</button>
                                    <button class="btn btn-default " data-dismiss="modal">Cancel</button>
                                    </div>
								</div>
                            </div>
                      </form>
               </div>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function tm_detail($id_pembeli) {
    $.getJSON("<?=base_url()?>index.php/pembeli/getDetailpembeli/"+$id_pembeli,function (data) {
            $("#id_pembeli").val(data['id_pembeli']);
            $("#nm_pembeli").val(data['nama_pembeli']);
            $("#telp").val(data['telp']);
            $("#username").val(data['username']);
            $("#password").val(data['password']);
    })
}
</script>

</body>
</html>
