<?php
    require "koneksi.php";
    if (isset($_POST['tambah'])) {
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

        if (move_uploaded_file($tmp, "../img/".$gambar_baru)){
            $stmt = $conn->prepare("INSERT INTO bookingservice (nama, telpon, motor, servis, tanggal, jam, gambar) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $nama, $telpon, $motor, $servis, $tanggal, $jam, $gambar_baru);
            $result = $stmt->execute();
            $stmt->close();

            if ($stmt) {
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
        }else {
            echo"Gambar gagal diupload";
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group">
                <label for="telpon">Nomor Telpon</label>
                <input type="tel" class="form-control"  name="telpon" placeholder="Masukkan Nomor Telpon" required>
            </div>
            <div class="form-group">
                <label for="motor">Jenis Motor</label>
                <input type="text" class="form-control" name="motor" placeholder="Masukkan Jenis Motor" required>
            </div>
            <div class="form-group">
                <label for="servis">Jenis Service </label>
                <input type="text" class="form-control" name="servis" placeholder="Masukkan Jenis Service" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Booking</label>
                <input type="date" class="form-control" name="tanggal" required>
            </div>
                <div class="form-group">
                <label for="jam">Jam</label>
                <input type="time" class="form-control" name="jam" required>
            </div>
            <div class="form-group">
                <label for="gambar">Upload Gambar</label>
                <input type="file" class="textfield" name="gambar">
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>