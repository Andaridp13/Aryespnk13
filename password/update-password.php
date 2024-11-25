<?php
session_start();

// Cek apakah user admin sudah login
if (!isset($_SESSION["sslogin"])) {
    header("location: ../Form login/login.php");
    exit;
}

require_once "../config.php";
$title = "Ganti Password - SMAN 25";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">password</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">ganti password</li>
                        </ol>
                        <form action="proses-password.php" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <span class="h5" my-2><i class="fa-solid fa-pen-to-square"></i> ganti password</span>
                                <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> simpan</button>
                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> reset</button>
                            </div>
                            <div class="card-body">
                                <div class="col-7">
                                    <label for="curpass" class="form-label">password lama</label>
                                    <input type="password" class="form-control" id="curpass" name="curpass" placeholder="masukan password anda saat ini" required>
                                </div>
                                <div class="col-7">
                                    <label for="newpass" class="form-label">password baru</label>
                                    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="masukan password baru anda" required>
                                </div>
                                <div class="col-7">
                                    <label for="confpass" class="form-label">Konfirmasi</label>
                                    <input type="password" class="form-control" id="confpass" name="confpass" placeholder="ulangi password baru anda" required>
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