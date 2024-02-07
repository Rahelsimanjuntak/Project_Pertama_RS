<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <title>ADMINISTRATOR</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
        <a class="navbar-brand nav-link text-white" href="#">SELAMAT DATANG ADMIN</a>
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
                    <a class="nav-link text-white" href="pegawai.php"><i class="fas fa-users mr-2"></i>Daftar Pegawai</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=""><i class="far fa-calendar-alt mr-2"></i>Jadwal Kuliah</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-user-graduate mr-2"></i> Daftar Mahasiswa</h3>
            <hr>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah"> <i
                    class="fas fa-plus-circle mr-2"></i>TAMBAH DATA MAHASISWA
            </button>
            <table class="table table-striped table-bordered">
                <thead align="center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">NAMA MAHASISWA</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">JURUSAN</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <?php
                  include 'koneksi.php';
                  $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                  $no = 1;
                  while ($data = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td>
                        <?php echo $no++; ?>
                    </td>
                    <td>
                        <?php echo $data['nim'];?>
                    </td>
                    <td>
                        <?php echo $data['nama'];?>
                    </td>
                    <td>
                        <?php echo $data['alamat'];?>
                    </td>
                    <td>
                        <?php echo $data['jurusan'];?>
                    </td>
                    <td align="center">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalEdit<?php echo $data['nim'];?>"> <i
                                class="fas fa-edit bg-success p-2 text-white rounded"></i>
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete<?php echo $data['nim'];?>"> <i
                                class="fas fa-trash bg-danger p-2 text-white rounded"></i>
                            Delete
                        </button>
                    </td>
                </tr>
                <!-- Update Modal -->
                <div class="modal fade" id="modalEdit<?php echo $data['nim'];?>" tabindex="-1"
                    aria-labelledby="modalEditLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="modalEditLabel">Edit Data Mahasiswa</h3>
                            </div>
                            <div class="modal-body">
                                <form action="update_mhs.php" method="post" role="form">
                                    <?php
                                            $nim = $data['nim'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                            ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">NIM </label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="nim"
                                                    value="<?php echo $data1['nim']; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="nama"
                                                    value="<?php echo $data1['nama']; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Alamat </label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="alamat"
                                                    value="<?php echo $data1['alamat']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Jurusan </label>
                                            <div class="col-sm-8"><input type="text" name="jurusan" class="form-control"
                                                    value="<?php echo $data1['jurusan']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete<?php echo $data['nim'];?>" tabindex="-1" aria-labelledby="modalDeleteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="modalDelete">Konfirmasi Hapus data</h3>
                </div>
                <div class="modal-body">
                    <h5 align="center">Apakah anda yakin ingin menghapus NIM <?php echo $data['nim'];?><strong><span
                                class="grt"></span></strong> ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="hapus_mhs.php?nim=<?php echo $data['nim']; ?>" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
                ?>
    </table>


    </div>
    <!-- Simpan Modal  -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="modalTambahLabel">Tambah Data Baru</h3>
                </div>
                <div class="modal-body">
                    <form action="simpan_mhs.php" method="post" role="form">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">NIM</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="nim"
                                        placeholder="NIM" value=""></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama
Mahasiswa" value=""></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Alamat</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="alamat"
                                        placeholder="Alamat" id="alamat" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Jurusan </label>
                                <div class="col-sm-8"><input type="text" name="jurusan" class="form-control"
                                        placeholder="Jurusan">
                                    </input>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.4.1.slim.min.js"
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