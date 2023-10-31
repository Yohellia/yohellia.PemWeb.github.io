<?php
require "koneksi.php";

$result = mysqli_query($conn,"select * from bookingservice");
$bookingservice =[];
while($row=mysqli_fetch_array($result)){
    $bookingservice[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING SERVICE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard">
        <main class="dash-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="listbooking.php">List Booking Service</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
            <section class="dash-main">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nomor Telpon</th>
                            <th>Jenis Motor</th>
                            <th>Service</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($bookingservice as $bs):?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $bs["nama"]?></td>
                            <td><?php echo $bs["telpon"]?></td>
                            <td><?php echo $bs["motor"]?></td>
                            <td><?php echo $bs["servis"]?></td>
                            <td><?php echo $bs["tanggal"]?></td>
                            <td><?php echo $bs["jam"]?></td>
                            <td><img src="../img/<?php echo $bs['gambar']; ?>" alt="ini gambar" width="50px" height="50px"></td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>