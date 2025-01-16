<?php
require_once('classes/Mahasiswa.php');
$mhs = new Mahasiswa();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $mhs->add($_POST);
}



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card  p-4 mx-auto" style="width: 28rem;">
            <h1>Form Add Mahasiswa</h1>

            <form action="" method="post">
                <input type="hidden" name="form_input" id="edit">
                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="laki" name="gender" value="L">
                    <label class="form-check-label" for="laki">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="perempuan" name="gender" value="P">
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="mt5">
            <h2>Daftar Mahasiswa</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = $mhs->show();
                    foreach ($data as $key => $item) { ?>
                        <tr>
                            <td><?= $item['nim'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['email'] ?></td>
                            <td><?= $item['gender'] ?></td>
                            <td>
                                <a href="edit.php?nim=<?= $item['nim'] ?>"class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?nim=<?= $item['nim'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>