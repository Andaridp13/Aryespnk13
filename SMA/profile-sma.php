<?php

require_once "../config.php";

$title  = "Profile SMA - SMAN 25";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Mendapatkan pesan dari URL jika ada
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

// Menampilkan alert sesuai kondisi pesan
$alert = '';
if ($msg == 'not image') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Update data sekolah gagal, file yang anda upload bukan gambar..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Update data sekolah gagal, maximal ukuran gambar 1 MB..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data sekolah berhasil diperbarui
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

// Melakukan query untuk mendapatkan data
$sma = mysqli_query($koneksi, "SELECT * FROM tbl_login WHERE id = 1");
$data = mysqli_fetch_array($sma);

// Cek jika $data bernilai null, isi dengan nilai default
if (!$data) {
    echo '<div class="alert alert-danger" role="alert">Data sekolah tidak ditemukan.</div>';
    $data = ['gambar' => 'default.png', 'nama' => '', 'email' => '']; // Set nilai default
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SMA</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Profile SMA</li>
            </ol>

            <form action="proses-sekolah.php" method="POST" enctype="multipart/form-data">
                <?php if ($msg !== '') { echo $alert; } ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-pen-to-square"></i> Data Sekolah</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center px-5">
                                <input type="hidden" name="gambarlama" value="<?= $data['gambar'] ?>">
                                <img src="../asset/image/<?= $data['gambar'] ?>" alt="gambar sekolah" class="mb-3" style="width:100%; max-width:200px;">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih gambar PNG, JPG, atau JPEG dengan ukuran maksimal 1 MB</small>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?? 1 ?>">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama sekolah" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control border-0 border-bottom" id="email" name="email" value="<?= $data['email'] ?>" placeholder="Email sekolah" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<?php require_once "../template/footer.php"; ?>
