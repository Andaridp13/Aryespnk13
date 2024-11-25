<?php
// Memulai sesi
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["sslogin"])) {
    header("location: ../Form login/login.php");
    exit();
}

// Menghubungkan ke database
require_once "../config.php";

// Cek apakah tombol simpan diklik
if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    // Menyiapkan query untuk menambahkan data ke tabel siswa
    $query = "INSERT INTO tbl_siswa (nis, nama, alamat, kelas, jurusan) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);

    // Mengikat parameter
    mysqli_stmt_bind_param($stmt, 'sssss', $nis, $nama, $alamat, $kelas, $jurusan);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil, kembali ke halaman siswa dengan pesan sukses
        $_SESSION['message'] = "Data siswa berhasil ditambahkan.";
        header("location: siswa.php");
    } else {
        // Jika gagal, kembali ke halaman siswa dengan pesan error
        $_SESSION['error'] = "Gagal menambahkan data siswa.";
        header("location: siswa.php");
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
} else {
    // Jika akses langsung ke halaman ini tanpa submit form, kembali ke halaman siswa
    header("location: siswa.php");
}

// Menutup koneksi database
mysqli_close($koneksi);
?>