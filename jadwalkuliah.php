<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="path/to/your/custom.js"></script>


  <title>ADMINISTRATOR</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <a class="navbar-brand nav-link text-white" href="#">JADWAL MATA KULIAH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 text-white" type="submit">Search</button>
      </form>
      <div class="icon ml-4">
        <h5>
          <i class="fas fa-envelope-square mr-3"></i>
          <i class="fas fa-bell-slash mr-3"></i>
          <i class="fas fa-sign-out-alt mr-3"></i>
        </h5>
      </div>
    </div>
  </nav>
  <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-info mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link active text-white" href=""><i
              class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="mahasiswa.php"><i class="fas fa-user-graduate mr-2"></i>Daftar
            Mahasiswa</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="dosen.php"><i class="fas fa-chalkboard-teacher mr-2"></i>Daftar
            Dosen</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="pegawai.php"><i class="fas fa-users mr-2"></i>Daftar
            Pegawai</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="jadwalkuliah.php"><i
              class="far fa-calendar-alt mr-2"></i>Jadwal Kuliah</a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>

    <div class="col-md-10 p-5 pt-2" style="margin-bottom  : 20px;">
      <h3><i class="far fa-calendar-alt mr-2"></i> Jadwal Mata Kuliah </h3>
      <hr>
      <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahjadwal"><i
          class="fas fa-plus-circle mr-2"></i>TAMBAH DATA JADWAL MATA KULIAH</a>
      <table class="table table-striped table-borderedless table-hover">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">HARI</th>
            <th scope="col">JAM</th>
            <th scope="col">MATA KULIAH</th>
            <th scope="col">DOSEN</th>
            <th scope="col">RUANGAN</th>
            <th scope="col">KODE</th>
            <th colspan="3" scope="col">AKSI</th>
          </tr>
        </thead>
        <?php
            include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM jadwalkuliah");
                $no = 1;
                while ($data = mysqli_fetch_array($query)) {                 
          ?>
        <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $data['hari'];?></td>
          <td><?php echo $data['jam'];?></td>
          <td><?php echo $data['matakuliah'];?></td>
          <td><?php echo $data['dosen'];?></td>
          <td><?php echo $data['ruangan'];?></td>
          <td><?php echo $data['kode'];?></td>
          <td>
          <td class="action-buttons">
            <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
            <a href="#" data-toggle="modal" data-target="#editjadwal<?php echo $data['kode'];?>"
              style="color: #28a745;">Edit</a>
            <i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
            <a href="#" data-toggle="modal" data-target="#deletejadwal<?php echo $data['kode'];?>"
              style="color: #dc3545;">Delete</a>
            <span class="ml-2"></span>
          </td>




          </td>

        </tr>
        <!--Update Modal-->
        <div class="example-modal">
          <div class="modal fade" id="editjadwal<?php echo $data['kode'];?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Edit Data Mahasiswa</h3>
                </div>
                <div class="modal-body">
                  <form action="update_jadwal.php" method="post" role="form">
                    <?php
                        $kode = $data['kode'];
                        $query1 = mysqli_query($koneksi, "SELECT * FROM jadwalkuliah WHERE kode='$kode'");
                        while ($data1 = mysqli_fetch_assoc($query1)) {
                        ?>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Hari</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="hari" value="<?php echo
                        $data1['hari']; ?>"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Jam</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="jam" value="<?php echo
                          $data1['jam']; ?>"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Mata Kuliah</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="matakuliah" value="<?php echo
                          $data1['matakuliah']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Dosen</label>
                        <div class="col-sm-8"><input type="text" name="dosen" class="form-control" value="<?php echo
                          $data1['dosen']; ?>">
                          </input>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Ruangan</label>
                        <div class="col-sm-8"><input type="text" name="ruangan" class="form-control" value="<?php echo
                          $data1['ruangan']; ?>">
                          </input>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Kode</label>
                        <div class="col-sm-8"><input type="text" name="kode" class="form-control" value="<?php echo
                          $data1['kode']; ?>" readonly>
                          </input>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="noedit" type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update">
                    </div>

                    <?php
                    }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!--modal delete-->
        <div class="example-modal">
          <div id="deletejadwal<?php echo $data['kode']; ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                </div>
                <div class="modal-body">
                  <h5 align="center">Apakah anda yakin ingin menghapus <?php echo $data['kode']; ?> <strong><span
                        class="grt"></span></strong> ?</h5>
                </div>
                <div class="modal-footer">
                  <button id="nodelete" type="button" class="btn btn-danger pull-left"
                    data-dismiss="modal">Cancel</button>
                  <a href="hapus_jadwal.php?kode=<?php echo $data['kode']; ?>" class="btn btn-primary ml-2">
                    <div class="row">
                      <div class="col-md-2">
                        <i class="fas fa-trash-alt"></i>
                      </div>
                      <div class="col-md-10">
                        Delete
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>



        <?php
          }
        ?>
      </table>




      </tbody>
      </table>
    </div>

  </div>
  <!-- Simpan Modal  -->
  <div class="example-modal">
    <div id="tambahjadwal" class="modal fade" role="dialog" style="display:none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Tambah Data Jadwal Mata Kuliah</h3>
          </div>
          <div class="modal-body">
            <form action="simpan_jadwal.php" method="post" role="form">
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label text-right">Hari</label>
                  <div class="col-sm-8">
                  <select name="hari" id="hari" class="form-control">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                  </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label text-right">Jam</label>
                  <div class="col-sm-8"><input type="text" class="form-control" name="jam" placeholder="Jam" value="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label text-right">Mata Kuliah</label>
                  <div class="col-sm-8"><input type="text" class="form-control" name="matakuliah"
                      placeholder="Mata Kuliah" id="matakuliah" value="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label text-right">Dosen</label>
                  <div class="col-sm-8"><input type="text" name="dosen" class="form-control" placeholder="Dosen">
                    </input>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label text-right">Ruangan</label>
                  <div class="col-sm-8"><input type="text" name="ruangan" class="form-control" placeholder="Ruangan">
                    </input>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label text-right">Kode</label>
                  <div class="col-sm-8"><input type="text" name="kode" class="form-control" placeholder="Kode">
                    </input>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>





  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>




</body>

</html>