<?php 
          if($_SESSION['data']['Role'] == 'user'){ 
            echo "<script>";
                echo 'alert("Anda tidak punya akses!");';
                echo 'window.location.href = "index.php";';
                echo '</script>';
          }
          ?>

<div class="card">
    <div class="card-body"><h1>Kategori Buku</h1>
    <hr>
            
<div class="mb-3">
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahkategori">Tambah</button>
</div>
<div class="table-responsive">
</hr>
  
        </div>
        <!--/.card-body -->
      
        <div class="card-body">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $no = 1;
                    foreach($fung->viewKategori() as $b){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b['NamaKategori']?></td>
                        
                <td>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $b['KategoriID'] ?>">Edit</button>
                <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapusKategori&KategoriID=<?=$b['KategoriID']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
              </td>
                    </tr>
                <?php }
                ?>
                <tbody>
                    </table>
                     </div>
                    <!--/.card-->
                    <!-- modal -->
               <div class="modal fade" id="tambahkategori">
                  <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Kategori</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        <form action="dashboard.php?page=postKategori" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" class="form-control" name="NamaKategori" required="">
                                </div>
                            </div>
                        <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
        <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
    </div>
        <!-- /.modal -->
        <?php 
            foreach($fung->viewKategori() as $b){ ?>
<div class="modal fade" id="edit<?= $b['KategoriID']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Kategori</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <form action="dashboard.php?page=updateKategori" method="post">
                            <div class="modal-body">
                        
                                <input type="text" name="KategoriID" value="<?= $b['KategoriID']; ?>" hidden>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" class="form-control" name="NamaKategori" value="<?= $b['NamaKategori']; ?>" required="">
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                   
                                </div>
                               
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            </div>
          <?php  }
            ?>
            
            <!-- /.modal -->