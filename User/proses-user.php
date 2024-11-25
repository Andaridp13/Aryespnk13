<?php

require_once "../config.php"; // Menggunakan require_once untuk memastikan config.php hanya dimuat satu kali

if (isset($_POST['simpan'])) {
    // Ambil value elemen yang diposting
    $username = trim(htmlspecialchars($_POST['username']));
    $Nama     = trim(htmlspecialchars($_POST['Nama']));
    $Jabatan  = $_POST['Jabatan'];
    $Alamat   = trim(htmlspecialchars($_POST['Alamat']));
    $gambar   = trim(htmlspecialchars($_FILES['image']['name']));

    // Hash password '1234'
    $password = '1234';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek username
    $cekusername = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
    if (mysqli_num_rows($cekusername) > 0) {
        header("location:add_user.php?msg=cancel");
        return;
    }

    // Upload gambar jika ada
    if ($gambar != null) {
        $url = 'add_user.php';
        $gambar = uploadimg($url); // Memanggil fungsi uploadimg dari config.php
    } else {
        $gambar = 'default.png';
    }

    // Simpan data ke dalam tabel
    mysqli_query($koneksi, "INSERT INTO tbl_user (username, password, Nama, Alamat, Jabatan, gambar) VALUES('$username', '$hashed_password', '$Nama', '$Alamat', '$Jabatan', '$gambar')");

    header("location:add_user.php?msg=added");
    return;
}
?>