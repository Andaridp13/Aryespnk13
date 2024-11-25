<?php

session_start();

if (!isset($_SESSION["sslogin"])) {
    header("location: ../Form login/login.php"); 
    exit(); 
} 

require_once "../config.php"; 
$title = "Siswa - SMAN 25"; 
require_once "../template/header.php"; 
require_once "../template/navbar.php"; 
require_once "../template/sidebar.php"; 

// Query untuk mengambil data siswa dari tabel siswa
$query = "SELECT * FROM tbl_siswa";
$result = mysqli_query($koneksi, $query);
?>

<div id="layoutSidenav_content"> 
    <main> 
        <div class="container-fluid px-4"> 
            <h1 class="mt-4">Data Siswa</h1> 
            <ol class="breadcrumb mb-4"> 
                <li class="breadcrumb-item "><a href="../index.php">Home</a></li> 
                <li class="breadcrumb-item active">Siswa</li> 
            </ol> 
            
            <!-- Form Tambah Siswa -->
            <form action="proses-siswa.php" method="POST"> 
                <div class="card mb-4"> 
                    <div class="card-header"> 
                        <span class="h5" my-2><i class="fa-solid fa-pen-to-square"></i> Tambah Siswa</span> 
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button> 
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button> 
                    </div> 
                    <div class="card-body"> 
                        <div class="col-7 mb-3"> 
                            <label for="nis" class="form-label">NIS</label> 
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS Siswa" required> 
                        </div> 
                        <div class="col-7 mb-3"> 
                            <label for="nama" class="form-label">Nama</label> 
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Siswa" required> 
                        </div> 
                        <div class="col-7 mb-3"> 
                            <label for="alamat" class="form-label">Alamat</label> 
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Siswa" required> 
                        </div> 
                        <div class="col-7 mb-3"> 
                            <label for="kelas" class="form-label">Kelas</label> 
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas Siswa" required> 
                        </div> 
                        <div class="col-7 mb-3"> 
                            <label for="jurusan" class="form-label">Jurusan</label> 
                            <select class="form-control" id="jurusan" name="jurusan" required>
                                <option value="" disabled selected>Pilih Jurusan</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Tabel Data Siswa -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Siswa
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?= $row['nis']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['kelas']; ?></td>
                                    <td><?= $row['jurusan']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
require_once "../template/footer.php";
?>