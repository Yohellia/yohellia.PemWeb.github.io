<?php
require 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM bookingservice where id=$id");
    $bookingservice =[];
while($row=mysqli_fetch_array($result)){
    $bookingservice[] = $row;
}
$bookingservice = $bookingservice[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT DATA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="edit.css">
<body>
    <div class="container">
        <h2>Ubah Data Booking Service</h2>
        <form method="post" action="tampilkanedit.php" enctype="multipart/form-data">
        <div class="form-group">
                <input type="hidden" class="form-control" name="id" placeholder="id" value="<?=$id?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?=$bookingservice['nama']?>" required>
            </div>
            <div class="form-group">
                <label for="telpon">Nomor Telpon :</label>
                <input type="tel" class="form-control" name="telpon" placeholder="Masukkan Nomor Telpon" value="<?=$bookingservice['telpon']?>" required>
            </div>
            <div class="form-group">
                <label for="motor">Jenis Motor :</label>
                <input type="text" class="form-control" name="motor" placeholder="Masukkan Jenis Motor" value="<?=$bookingservice['motor']?>" required>
            </div>
            <div class="form-group">
                <label for="servis">Jenis Service :</label>
                <input type="text" class="form-control" name="servis" placeholder="Masukkan Jenis Service " value="<?=$bookingservice['servis']?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Booking :</label>
                <input type="date" class="form-control" name="tanggal" value="<?=$bookingservice['tanggal']?>" required>
            <div class="form-group">
                <label for="jam">Jam :</label>
                <input type="time" class="form-control" name="jam" value="<?=$bookingservice['jam']?>" required>
            </div>
            <div class="form-group">
                <label for="gambar">Upload Gambar</label>
                <input type="file" class="textfield" name="gambar" required>
            </div>
        </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
