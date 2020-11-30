<?php
//API MySQLi untuk koneksi ke DB
$mysqli = new mysqli("localhost", "root", "", "universitas_pasundan");

//ambil semua data di DB
$result = $mysqli->query("SELECT * FROM mahasiswa");
$rows = $result->fetch_all();

// konversi ke JSON
$data_json = json_encode($rows);

//tampilkan data JSON
//echo $data_json;
?>

<!DOCTYPE html>
<html>

<head>
    <title>REST API</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body class="container">
    <h3 class="my-3">Daftar Mahasiswa</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NRP</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (json_decode($data_json) as $data) { ?>
                <tr>
                    <th scope="row"><?= $data[0]; ?></th>
                    <td><?= $data[1]; ?></td>
                    <td><?= $data[2]; ?></td>
                    <td>@<?= $data[3]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>