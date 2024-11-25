<?php

require_once "../config.php";

if (isset($_POST['simpan'])) {
    $curpass = trim(htmlspecialchars($_POST['curpass']));
    $newpass = trim(htmlspecialchars($_POST['newpass']));
    $confpass = trim(htmlspecialchars($_POST['confpass']));

    $userName = $_SESSION['ssUser'];
    $queryUser = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$userName'");
    $data = mysqli_fetch_array($queryUser);

    if ($newpass !== $confpass) {
        header("location:update-password.php?msg=error1");
        exit;
    } 

    if(!password_verify($curpass, $data['password'])) {
        header("location:update-password.php?msg=error2");
        exit;
    } else {
        $pass = password_hash($newpass, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE tbl_user SET password = '$pass' WHERE username = '$username'");
        header("location:update-password.php?update");
        exit;
    }
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Home</li>
            </ol>
            
            <!-- Menampilkan pesan sukses atau error -->
            <?php
            if (isset($_SESSION["success"])) {
                echo '<div class="alert alert-success">' . $_SESSION["success"] . '</div>';
                unset($_SESSION["success"]);
            } elseif (isset($_SESSION["error"])) {
                echo '<div class="alert alert-danger">' . $_SESSION["error"] . '</div>';
                unset($_SESSION["error"]);
            }
            ?>
            
            <!-- Form Ganti Password -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user-cog me-1"></i>
                    Ganti Password
                </div>
                <div class="card-body">
                    <form action="update-password.php" method="POST">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
require_once "template/footer.php";
?>