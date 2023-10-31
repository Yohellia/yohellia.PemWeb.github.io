<?php
    require "koneksi.php";
    
    if (isset($_POST['daftar'])) {
        $name = $_POST['username'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        if($pass === $cpass) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT username FROM user where username = '$name'");

            if (mysqli_fetch_assoc($result)){
                echo "
                <script>
                    alert('username sudah ada');
                    document.location.href = 'login.php';
                </script>";
            }else{
                $result = mysqli_query($conn, "INSERT INTO user VALUES ('', '$name', '$pass')");

                if (mysqli_affected_rows($conn) > 0) {
                    echo "
                    <script>
                        alert('Register berhasil');
                        document.location.href = 'login.php';
                    </script>";
                }else{
                    echo "
                    <script>
                        alert('Register gagal');
                        document.location.href = 'regis.php';
                    </script>";
                }
            }

        }else {
            echo "
            <script>
                alert('Password tak sama!');
                document.location.href = 'regis.php';
            </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRASI</title>
    <link rel="stylesheet" href="regis.css">
</head>
<body>
    <div class="form">
        <div class="form-container">
            <h1>Daftar</h1><hr>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" class="textfield" required>
                <input type="password" name="password" placeholder="Password" class="textfield" required>
                <input type="password" name="cpassword" placeholder="Ulangi Password" class="textfield" required>
                <div class="remember">
                    <input type="checkbox" name="remember" value="true">
                    <label for="remember">Ingat username ini</label>
                </div>
                <input type="submit" name="daftar" value="Daftar" class="login-btn">
            </form>
        </div>
    </div>
</body>
</html>