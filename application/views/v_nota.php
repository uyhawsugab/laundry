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
            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm " data-toggle="modal" data-target="#add_nota">Tambah</button>
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
                        <th>Id Nota</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal</th>
                        <th>Bukti</th>
                        <th>Grandtotal</th>
                        <th class="text-left">Aksi</th>
                    </tr>
                </thead>
                <?php 
                $no = 0;
                foreach ($dataNta as $nta) {
                $no++;
                echo '
                <tbody>
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$nta->id_nota.'</td>
                        <td>'.$nta->nama_pembeli.'</td>
                        <td>'.$nta->tgl.'</td>
                        <td>'.$nta->bukti.'</td>
                        <td>'.$nta->grandtotal.'</td>
                        <td class="text-left"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm" data-toggle="modal" data-target="#up_nota" onclick="tm_detail('.$nta->id_nota.')"><i class="fa fa-pencil"></i> UPDATE</button><a href='.base_url('index.php/nota/deletenota/'.$nta->id_nota).' class="mb-xs mt-xs mr-xs btn btn-danger btn btn-sm" onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Ini ?\')"><i class="fa fa-trash-o"></i> DELETE</a></td>
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

<div class="modal fade" id="add_nota">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Tambah nota</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/nota/tambahnota')?>" method="post">
                                    <div class="form-group">
                                    <label for="">Nama Pembeli</label>
                                    <select name="id_pembeli" class="form-control">
                                    <option value="none">Silahkan Pilih Salah Satu</option>
                                    <?php 
                                    foreach ($dataPmbl as $pmbl) {
                                    echo "<option value='".$pmbl->id_pembeli."'>".
                                    $pmbl->nama_pembeli."</option>";
                                    }
                                    ?>
                                    </select>
                                    </div>                                         
                                    <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tgl" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Bukti</label>
                                    <input type="text" name="bukti" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Grandtotal</label>
                                    <input type="text" name="grandtotal" class="form-control">
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

<div class="modal fade" id="up_nota">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Update nota</h4>
                                    </div> 
                                    <div class="modal-body">
                                    <form action="<?=base_url('index.php/nota/updatenota')?>" method="post">
                                    <input type="hidden" name="id_nota" class="form-control" id="id_nota">
                                    <div class="form-group">
                                    <label for="">Nama Pembeli</label>
                                    <select name="id_pembeli" id="id_pem" class="form-control">
                                    <option value="none">Silahkan Pilih Salah Satu</option>
                                    <?php 
                                    foreach ($dataPmbl as $pmbl) {
                                    echo "<option value='".$pmbl->id_pembeli."'>".
                                    $pmbl->nama_pembeli."</option>";
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Taggal</label>
                                    <input type="text" name="tgl" id="tgl" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Bukti</label>
                                    <input type="text" name="bukti" id="bkt" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Grand Total</label>
                                    <input type="text" name="grandtotal" id="grdtotal" class="form-control">
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
    function tm_detail($id_nota) {
    $.getJSON("<?=base_url()?>index.php/nota/getDetailnota/"+$id_nota,function (data) {
            $("#id_nota").val(data['id_nota']);
            $("#id_pem").val(data['id_pembeli']);
            $("#tgl").val(data['tgl']);
            $("#bkt").val(data['bukti']);
            $("#grdtotal").val(data['grandtotal']);
    })
}
</script>

</body>
</html>
