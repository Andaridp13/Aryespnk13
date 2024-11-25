<?php

require_once "../config.php";

// Jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    // Ambil value yang diposting
    $id     = isset($_POST['id']) ? $_POST['id'] : null;
    $nama   = isset($_POST['nama']) ? trim(htmlspecialchars($_POST['nama'])) : '';
    $email  = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
    $gambar = isset($_POST['gambarlama']) ? trim(htmlspecialchars($_POST['gambarlama'])) : 'img-default.jpg';

    // Cek apakah gambar user ada
    if ($_FILES['image']['error'] === 4) {
        // Jika tidak ada gambar baru yang diupload, gunakan gambar lama
        $gambarsekolah = $gambar;
    } else {
        // Jika ada gambar baru, upload gambar baru
        $url = 'profile-sma.php';
        $gambarsekolah = uploadimg($url);
        @unlink('../asset/image/' . $gambar); // Hapus gambar lama
    }

    // Update data
    if ($id !== null) {  // Pastikan id tidak null
        mysqli_query($koneksi, "UPDATE tbl_login SET
                                nama = '$nama',
                                email = '$email',
                                gambar = '$gambarsekolah'
                                WHERE id = $id
                                ");
        header("location:profile-sma.php?msg=updated");
    } else {
        echo "ID tidak ditemukan.";
    }
    return;
}
?>