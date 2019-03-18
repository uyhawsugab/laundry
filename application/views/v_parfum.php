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
            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm " data-toggle="modal" data-target="#add_parfum">Tambah</button>
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Layanan Tersedia</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-condensed mb-none table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Parfum</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th class="text-left">Aksi</th>
                    </tr>
                </thead>
                <?php 
                $no = 0;
                foreach ($dataPrf as $prf) {
                $no++;
                echo '
                <tbody>
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$prf->id_parfum.'</td>
                        <td>'.$prf->nama_parfum.'</td>
                        <td><img width="150px" height="200px" src='.base_url('assets/uploads/parfum/'.$prf->gambar).'></td> 
                        <td>'.$prf->harga.'</td>
                        <td class="text-left"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm" data-toggle="modal" data-target="#up_parfum" onclick="tm_detail('.$prf->id_parfum.')"><i class="fa fa-pencil"></i> UPDATE</button><a href='.base_url('index.php/parfum/deleteParfum/'.$prf->id_parfum).' class="mb-xs mt-xs mr-xs btn btn-danger btn btn-sm" onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Ini ?\')"><i class="fa fa-trash-o"></i> DELETE</a></td>
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

<div class="modal fade" id="add_parfum">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Tambah Parfum</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/parfum/tambahParfum')?>" method="post" enctype='multipart/form-data'>
                                    <div class="form-group">
                                    <label for="">Nama Parfum</label>
                                    <input type="text" name="nama_parfum" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <input type="file" name="gambar" class="form-control">
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

<div class="modal fade" id="up_parfum">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Update Parfum</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/parfum/updateParfum')?>" method="post" enctype='multipart/form-data'>
                                    <input type="hidden" name="id_parfum" class="form-control" id="id_parfum">
                                    <div class="form-group">
                                    <label for="">Nama Parfum</label>
                                    <input type="text" name="nama_parfum" id="nm_prf" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" id="hrg" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <input type="file" name="gambar" class="form-control">
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
    function tm_detail($id_parfum) {
    $.getJSON("<?=base_url()?>index.php/parfum/getDetailParfum/"+$id_parfum,function (data) {
            $("#id_parfum").val(data['id_parfum']);
            $("#nm_prf").val(data['nama_parfum']);
            $("#hrg").val(data['harga']);
    })
}
</script>

</body>
</html>
