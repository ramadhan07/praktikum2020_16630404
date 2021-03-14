<?php

if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $pass       = $_POST['password'];

    include 'connection.php';

    $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        // echo '<script>alert("oke")</script>';
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["password"])) {
            session_start();
            $_SESSION['username']   = $row['username'];
            $_SESSION['level']      = $row['level'];
            header('Location:admin/index.php');
            exit;
        }
    }
    $error = true;
}

?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Login gagal</strong> Periksa kembali Username dan Password
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header bg-transparent mb-0">
                    <h5 class="text-center">Login User</span></h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <!-- <div class="form-group"> -->
                        <input type="submit" name="login" value="Login" class="btn btn-success btn-block">
                        <!-- <a href="?page=home" class="btn btn-block btn-danger">Kembali ke Beranda</a> -->
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>