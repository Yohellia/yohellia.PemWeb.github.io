<?php
    require "koneksi.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "DELETE FROM bookingservice WHERE id = $id");
    $bookingservice = [];

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            document.location.href = 'dashboard.php';
        </script>";
    }
?>