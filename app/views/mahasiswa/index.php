<div class="container mt-5 ">
    <h1>Halaman Mahasiswa</h1>
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <ul>
                        <li><?= $mhs['nama']; ?></li>
                        <li><?= $mhs['nim']; ?></li>
                        <li><?= $mhs['email']; ?></li>
                        <li><?= $mhs['jurusan']; ?></li>
                    </ul>
                    <br>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>
<!-- <li class="list-group-item d-flex justify-content-between align-items-start"><?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-primary">detail</a>
                    </li> -->