<?php
// Password yang akan di-hash
$password = '1234';

// Menghasilkan hash menggunakan password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Menampilkan hash
echo "Hash dari password '1234' adalah: " . $hashed_password;
?>
