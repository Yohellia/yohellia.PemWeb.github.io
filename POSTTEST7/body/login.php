<?php
    session_start();
    require "koneksi.php";
    
    if (isset($_POST['masuk'])) {
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM user where username = '$name'");

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($pass, $row['password'])) {
                $_SESSION['login'] = true;
                header("Location: dashboard.php");
                exit;
            }
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="regis.css">
</head>
<body>
    <div class="form">
        <div class="form-container">
            <h1>Masuk</h1><hr>
            <?php
                if (isset($error)) {
                    echo "<p style='color: red;'>Username dan password salah</p>";
                }
            ?>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" class="textfield" required>
                <input type="password" name="password" placeholder="Password" class="textfield" required>
                <div class="remember">
                    <input type="checkbox" name="remember" value="true">
                    <label for="remember">Ingat username ini</label>
                </div>
                <input type="submit" name="masuk" value="Masuk" class="login-btn">
                <a href="regis.php" class="login-btn">Buat Akun</a>
                <a href="index.html" class="login-btn">Balik ke beranda</a>

            </form>
        </div>
    </div>
</body>
</html>
