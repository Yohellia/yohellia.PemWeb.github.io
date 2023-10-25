<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $telpon = $_POST["telpon"];
    $motor = $_POST["motor"];
    $servis = $_POST["servis"];
    $tanggal = $_POST["tanggal"];
    $jam = $_POST["jam"];

    $gambar = $_FILES['gambar']['name'];
    $x = explode('.',$gambar);
    $exstensi = strtolower(end($x));
    $gambar_baru = "$nama.$exstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    $get_gambar = mysqli_query($conn, "SELECT gambar FROM bookingservice WHERE id='$id'");
    $data_old = mysqli_fetch_array($get_gambar);
    unlink("../img/".$data_old['gambar']);

    $update_stmt = mysqli_prepare($conn, "UPDATE bookingservice SET nama=?, telpon=?, motor=?, servis=?, tanggal=?, jam=?, gambar=? WHERE id=?");
    mysqli_stmt_bind_param($update_stmt, "sssssssi", $nama, $telpon, $motor, $servis, $tanggal, $jam, $gambar_baru, $id);
    $result = mysqli_stmt_execute($update_stmt);

    if ($result) {
        echo "<script>
            alert('data berhasil diubah');
        </script>";
    } else {
        echo "<script>
            alert('data gagal diubah');
        </script>";
    }

    move_uploaded_file($tmp, "../img/".$gambar_baru);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Service</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="container">
    <?php
    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $telpon = $_POST["telpon"];
        $motor = $_POST["motor"];
        $servis = $_POST["servis"];
        $tanggal = $_POST["tanggal"];
        $jam = $_POST["jam"];
        $gambar = $_FILES['gambar']['name'];
    ?>
        <h2>Data Berhasil Diubah</h2>
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <th>Nomor Telpon</th>
                <td><?php echo $telpon; ?></td>
            </tr>
            <tr>
                <th>Jenis Motor</th>
                <td><?php echo $motor; ?></td>
            </tr>
            <tr>
                <th>Service</th>
                <td><?php echo $servis; ?></td>
            </tr>
            <tr>
                <th>Tanggal Booking</th>
                <td><?php echo $tanggal; ?></td>
            </tr>
            <tr>
                <th>Jam</th>
                <td><?php echo $jam; ?></td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td><?php echo $gambar_baru; ?></td>
            </tr>
        </table>
    <?php
    } else {
        echo "Data belum diisi.";
    }
    ?>

    <a href="dashboard.php" class="btn btn-primary">KEMBALI</a> 
</div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>