<?php
    require "koneksi.php";
    if (isset($_POST['tambah'])) {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $telpon = $_POST["telpon"];
        $motor = $_POST["motor"];
        $servis = $_POST["servis"];
        $tanggal = $_POST["tanggal"];
        $jam = $_POST["jam"];

        $result = mysqli_query($conn, "INSERT INTO bookingservice VALUES ('', '$nama', '$telpon', '$motor', '$servis', '$tanggal', '$jam')");

        if ($result) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING SERVICE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group">
                <label for="telpon">Nomor Telpon</label>
                <input type="tel" class="form-control" id="telpon" name="telpon" placeholder="Masukkan Nomor Telpon" required>
            </div>
            <div class="form-group">
                <label for="motor">Jenis Motor</label>
                <input type="text" class="form-control" id="motor" name="motor" placeholder="Masukkan Jenis Motor" required>
            </div>
            <div class="form-group">
                <label for="servis">Jenis Service </label>
                <input type="text" class="form-control" id="servis" name="servis" placeholder="Masukkan Jenis Service" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Booking</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
                <div class="form-group">
                <label for="jam">Jam</label>
                <input type="time" class="form-control" id="jam" name="jam" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
