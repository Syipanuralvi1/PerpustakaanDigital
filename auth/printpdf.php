<h1>Data Peminjaman</h1>
<hr>
    
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
                foreach($fung->viewpeminjaman() as $b){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['Judul']; ?></td>
                    <td><?= $b['NamaLengkap']; ?></td>
                    <td><?= $b['TanggalPeminjaman']; ?></td>
                    <td>
                        <?php 
                            $sekarang = strtotime(date('Y-m-d'));
                            $kembali = strtotime($b['TanggalPengembalian']);
                            if($sekarang > $kembali) {
                                echo "<span class='badge badge-primary'>Terlambat</span>";
                            } else {
                                echo $b['TanggalPengembalian'];
                            }
                        ?>
                    </td>
                   <td>
                   <?php 
                            if($b['StatusPeminjaman'] == 'wait') { 
                                echo "<span class='badge badge-warning'>Menunggu Persetujuan</span>";
                            } elseif($b['StatusPeminjaman'] == 'pinjam') {
                                echo "<span class='badge badge-success'>Sedang dipinjam</span>";
                            } else {
                                echo "<span class='badge badge-primary'>Selesai</span>";
                            }
                        ?>
                   </td>
                </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>




      <?php 
        foreach($fung->viewpeminjaman() as $b) { ?>
            <div class="modal fade" id="konfirmasipeminjaman<?= $b['PeminjamanID'] ?>">
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
            <input type="text" name="PeminjamanID" value="<?= $b['PeminjamanID'];?>" hidden>
            <input type="text" name="BukuID" value="<?= $b['BukuID'];?>" hidden>
            <input type="text" name="UserID" value="<?= $b['UserID'];?>" hidden>
              <div class="form-group">
                <label for="">UserID</label>
                <input type="text" class="form-control" name="Judul" value="<?= $b['UserID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">BukuID</label>
                <input type="text" class="form-control" name="BukuID" value="<?= $b['BukuID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="TanggalPeminjaman" value="<?= $b['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="TanggalPengembalian" value="<?= $b['TanggalPengembalian'] ?>">
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
        foreach($fung->viewpeminjaman() as $b) { ?>
            <div class="modal fade" id="konfirmasipengembalian<?= $b['PeminjamanID'] ?>">
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
            <input type="text" name="PeminjamanID" value="<?= $b['PeminjamanID'];?>" hidden>
              <div class="form-group">
                <label for="">UserID</label>
                <input type="text" class="form-control" name="UserID" value="<?= $b['UserID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">BukuID</label>
                <input type="text" class="form-control" name="BukuID" value="<?= $b['BukuID'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="TanggalPeminjaman" value="<?= $b['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="TanggalPengembalian" value="<?= $b['TanggalPengembalian'] ?>" disabled>
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
        foreach($fung->viewbuku() as $b) { ?>
            <div class="modal fade" id="peminjaman<?= $b['BukuID'] ?>">
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
            <input type="text" name="BukuID" value="<?= $b['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $b['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $b['Penulis'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $b['Penerbit'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="number" class="form-control" name="tahun" value="<?= $b['TahunTerbit'] ?>" disabled>
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
        foreach($fung->viewbuku() as $b) { ?>
            <div class="modal fade" id="ulas<?= $b['BukuID'] ?>">
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
            <input type="text" name="BukuID" value="<?= $b['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $b['Judul'] ?>" disabled>
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
    
<script>
    window.print();
</script>
        