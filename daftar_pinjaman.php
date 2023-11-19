<?php
function http_request($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/API-Library/api_daftar_pinjaman.php");
$sql = json_decode($data, TRUE);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Lexend', sans-serif;
        }

        [data-bs-theme="light"] {
            --bs-body-bg: #f4f4f4;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg p-5 mt-3 rounded bg-dark"></nav>
    </div>
    <div class="container">
        <div class="card mt-5 shadow-lg">
            <div class="card-header bg-dark"></div>
            <div class="card-body">
                <a href="index.php" class="btn btn-dark mb-3">Back</a>
                <a href="form_input_buku.php"><button class="btn btn-outline-dark mb-3">Tambah</button></a>
                <div class="row justify-content-center">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered shadow">
                            <thead class="lead">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Penulis</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="lead">
                                <?php
                                $no = 1;
                                foreach ($sql as $data) {
                                ?>
                                    <form action="proses_pinjam.php" method="POST">
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['judul'] ?></td>
                                            <td><?= $data['penerbit'] ?></td>
                                            <td><?= $data['penulis'] ?></td>
                                            <td><?= $data['tahun'] ?></td>
                                            <td>
                                                <a href="proses_hapus.php?hapus=<?= $data['id']; ?>" class="btn btn-outline-dark">Hapus</a>
                                            </td>
                                        </tr>
                                    </form>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>