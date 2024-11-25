<?php


require_once "../config.php";

$title = "Tambah User - SMAN 25";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Tambah user gagal, username sudah ada..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'not image') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Tambah user gagal, file yang anda upload bukan gambar..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Tambah user gagal, maximal ukuran gambar 1 MB..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah user berhasil, segera ganti password anda!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Tambah user</li>
                        </ol>
                        <form action="proses-user.php" method="POST" enctype="multipart/form-data">
                            <?php
                                if ($msg !== '') {
                                    echo $alert;
                                }

                              ?>
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah user</span>
                                <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> reset</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">username</label>
                                        <label for="" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text"  class="form-control border-0 border-bottom" id="username" name = "username" maxlength="20" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Nama</label>
                                        <label for="" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" class="form-control border-0 border-bottom" id="Nama" name = "Nama" maxlength="20" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Jabatan</label>
                                        <label for="" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <select name="Jabatan" id="Jabatan" class="form-select border-0 border-bottom" required>
                                                <option value="" selected>--pilih jabatan--</option>
                                                <option value="Kepsek" selected>Kepsek</option>
                                                <option value="Staf TU" selected>Stap TU</option>
                                                <option value="Guru" selected>Guru</option>
                                                <option value="Siswa" selected>Siswa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Alamat</label>
                                        <label for="" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control" placeholder="domisili" required></textarea>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="col-4 text-center px-5">
                                        <img src="../asset/image/defauld.png" alt="gambar user" class="mb-3" width="40%">
                                        <input type="file" name="image" class="form-control form-control-sm">
                                        <small class="text-secondary">pilih foto PNG, JPG, atau JPEG maximal dengan ukuran 1 MB</small>
                                        <div><small class="text-secondary">Widht = Height</small>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </form>
                    </div>
                </main>

<?php

    require_once "../template/footer.php";
?>