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
            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm " data-toggle="modal" data-target="#add_layanan">Tambah</button>
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
                        <th>Kode</th>
                        <th>Nama Layanan</th>
                        <th class="text-left">Aksi</th>
                    </tr>
                </thead>
                <?php 
                $no = 0;
                foreach ($dataLyn as $lyn) {
                $no++;
                echo '
                <tbody>
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$lyn->id_layanan.'</td>
                        <td>'.$lyn->Kode.'</td>
                        <td>'.$lyn->nama_layanan.'</td>
                        <td class="text-left"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm" data-toggle="modal" data-target="#up_layanan" onclick="tm_detail('.$lyn->id_layanan.')"><i class="fa fa-pencil"></i> UPDATE</button><a href='.base_url('index.php/layanan/deleteLayanan/'.$lyn->id_layanan).' class="mb-xs mt-xs mr-xs btn btn-danger btn btn-sm" onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Ini ?\')"><i class="fa fa-trash-o"></i> DELETE</a></td>
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

<div class="modal fade" id="add_layanan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Tambah layanan</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/layanan/tambahLayanan')?>" method="post">
                                    <div class="form-group">
                                    <label for="">Kode Layanan</label>
                                    <input type="text" name="Kode" class="form-control">
                                    </div>    
                                    <div class="form-group">
                                    <label for="">Nama Layanan</label>
                                    <input type="text" name="nama_layanan" class="form-control">
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

<div class="modal fade" id="up_layanan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Update layanan</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/layanan/updateLayanan')?>" method="post">
                                    <input type="hidden" name="id_layanan" class="form-control" id="id_layanan">
                                    <div class="form-group">
                                    <label for="">Kode Layanan</label>
                                    <input type="text" name="Kode" id="kd" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Nama Layanan</label>
                                    <input type="text" name="nama_layanan" id="nm_lyn" class="form-control">
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
    function tm_detail($id_layanan) {
    $.getJSON("<?=base_url()?>index.php/layanan/getDetailLayanan/"+$id_layanan,function (data) {
            $("#id_layanan").val(data['id_layanan']);
            $("#kd").val(data['Kode']);
            $("#nm_lyn").val(data['nama_layanan']);
    })
}
</script>

</body>
</html>
