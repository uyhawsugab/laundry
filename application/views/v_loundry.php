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
            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm " data-toggle="modal" data-target="#add_pengunjung">Tambah</button>
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Laundry Tersedia</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-condensed mb-none table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Nama Loundry</th>
                        <th class="text-left">Aksi</th>
                    </tr>
                </thead>
                <?php 
                $no = 0;
                foreach ($dataLnd as $lnd) {
                $no++;
                echo '
                <tbody>
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$lnd->id_laundry.'</td>
                        <td>'.$lnd->kode.'</td>
                        <td>'.$lnd->nama_laundry.'</td>
                        <td class="text-left"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm" data-toggle="modal" data-target="#up_laundry" onclick="tm_detail('.$lnd->id_laundry.')"><i class="fa fa-pencil"></i> UPDATE</button><a href='.base_url('index.php/loundry/deleteLaundry/'.$lnd->id_laundry).' class="mb-xs mt-xs mr-xs btn btn-danger btn btn-sm" onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Ini ?\')"><i class="fa fa-trash-o"></i> DELETE</a></td>
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

<div class="modal fade" id="add_pengunjung">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Tambah Pengunjung</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/loundry/tambahLaundry')?>" method="post">
                                    <div class="form-group">
                                    <label for="">Kode Laundry</label>
                                    <input type="text" name="kode" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Nama Laundry</label>
                                    <input type="text" name="nama_laundry" class="form-control">
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

<div class="modal fade" id="up_laundry">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Update Pengunjung</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/loundry/updateLaundry')?>" method="post">
                                    <input type="hidden" name="id_laundry" class="form-control" id="id_laundry">
                                    <div class="form-group">
                                    <label for="">Kode Laundry</label>
                                    <input type="text" name="kode" id="kd_lnd" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Nama Laundry</label>
                                    <input type="text" name="nama_laundry" id="nm_lnd" class="form-control">
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
    function tm_detail($id_laundry) {
    $.getJSON("<?=base_url()?>index.php/loundry/getDetailLaundry/"+$id_laundry,function (data) {
            $("#id_laundry").val(data['id_laundry']);
            $("#kd_lnd").val(data['kode']);
            $("#nm_lnd").val(data['nama_laundry']);
    })
}
</script>


</body>
</html>
