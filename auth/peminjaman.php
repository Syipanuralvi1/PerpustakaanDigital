    <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <h1> Data Peminjaman</h1>
<hr>
<?php
    if($_SESSION['data']['Role'] == 'petugas'){ ?>
<div class="mb-3">
<a href="dashboard.php?page=printlaporan" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-print"></i> Print</a>
</div>
<?php } ?>
<div class="table-responsive">
<table class="table table-bordered" id="example1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NamaLengkap</th>
                <th>Judul</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $no=1;
                foreach($fung->viewpeminjaman() as $d){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['NamaLengkap']; ?></td>
                    <td><?= $d['Judul']; ?></td>
                    <td><?= $d['TanggalPeminjaman']; ?></td>
                    <td>
                        <?php 
                            $sekarang = strtotime(date('Y-m-d'));
                            $kembali = strtotime($d['TanggalPengembalian']);
                            if($sekarang > $kembali) {
                                echo "<span class='badge badge-primary'>Terlambat</span>";
                            } else {
                                echo $d['TanggalPengembalian'];
                            }
                        ?>
                    </td>
                   <td>
                   <?php 
                            if($d['StatusPeminjaman'] == 'wait') { 
                                echo "<span class='badge badge-warning'>Menunggu Persetujuan</span>";
                            } elseif($d['StatusPeminjaman'] == 'pinjam') {
                                echo "<span class='badge badge-success'>Sedang dipinjam</span>";
                            } else {
                                echo "<span class='badge badge-primary'>Selesai</span>";
                            }
                        ?>
                   </td>
                    
                    <td>
                        <?php 
                            if($d['StatusPeminjaman'] == 'wait'){ ?>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasi<?= $d['PeminjamanID'] ?>">Acc</button>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pengembalian<?= $d['PeminjamanID'] ?>" disabled>Kembali</button>
                         <?php   } elseif($d['StatusPeminjaman'] == 'pinjam'){ ?>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasi<?= $d['PeminjamanID'] ?>" disabled>Acc</button>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pengembalian<?= $d['PeminjamanID'] ?>">Kembali</button>
                      <?php   } else { ?>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasi<?= $d['PeminjamanID'] ?>" disabled>Acc</button>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pengembalian<?= $d['PeminjamanID'] ?>" disabled>Kembali</button>
                    <?php  }
                        ?>
                    
                  <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapuspeminjaman&PeminjamanID=<?= $d['PeminjamanID'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
              </td>
                </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>

        
      <?php 
        foreach($fung->viewpeminjaman() as $d) { ?>
            <div class="modal fade" id="konfirmasi<?= $d['PeminjamanID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Pinjaman</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=konfirmasipeminjaman" method="post">
            <div class="modal-body">
            <input type="text" name="PeminjamanID" value="<?= $d['PeminjamanID'];?>" hidden>
            <input type="text" name="BukuID" value="<?= $d['BukuID'];?>" hidden>
            <input type="text" name="UserID" value="<?= $d['UserID'];?>" hidden>
              <div class="form-group">
                <label for="">UserID</label>
                <input type="text" class="form-control" name="Judul" value="<?= $d['UserID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">BukuID</label>
                <input type="text" class="form-control" name="BukuID" value="<?= $d['BukuID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="text" class="form-control" value="<?= $d['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="TanggalPengembalian" value="<?= $d['TanggalPengembalian'] ?>">
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
      <?php  }
    ?>
    
<?php 
        foreach($fung->viewpeminjaman() as $d) { ?>
            <div class="modal fade" id="pengembalian<?= $d['PeminjamanID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pengembalian Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=konfirmasipengembalian" method="post">
            <div class="modal-body">
            <input type="text" name="PeminjamanID" value="<?= $d['PeminjamanID'];?>" hidden>
              <div class="form-group">
                <label for="">UserID</label>
                <input type="text" class="form-control" name="UserID" value="<?= $d['UserID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">BukuID</label>
                <input type="text" class="form-control" name="BukuID" value="<?= $d['BukuID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="TanggalPeminjaman" value="<?= $d['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="TanggalPengembalian" value="<?= $d['TanggalPengembalian'] ?>" disabled>
              </div>
             <p>Klik Konfirmasi Buku jika sudah dikembalikan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi Pengembalian</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>
      

      <?php 
        foreach($fung->viewbuku() as $d) { ?>
            <div class="modal fade" id="peminjaman<?= $d['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=ajukanpeminjaman" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $d['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $d['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $d['Penulis'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $d['Penerbit'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="number" class="form-control" name="tahun" value="<?= $d['TahunTerbit'] ?>" disabled>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ajukan Pinjam Buku</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>

<?php 
        foreach($fung->viewbuku() as $d) { ?>
            <div class="modal fade" id="ulas<?= $d['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=postulasanbuku" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $d['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $d['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Ulasan</label>
                <textarea name="ulasan" class="form-control" cols="30" rows="10" required></textarea>
              </div>
              <div class="form-group">
                <label for="">Rating</label>
                <select name="rating" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>

        