<?php

use Pkl\MyApp\Core\Message;

$data = Message::getData();
$nik = "";
$nama = "";
$jenis = "";
$telp = "";
$jabatan = "";
$alamat = "";
if ($data) {
    $nik = $data['nik'];
    $nama = $data['nama'];
    $jenis = $data['jenis'];
    $telp = $data['telp'];
    $jabatan = $data['jabatan'];
    $alamat = $data['alamat'];
}

Message::flash();
?>
<!-- Portfolio Section -->
<section id="#service" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title pb-5" data-aos="fade-up">
        <h2>Tambah Data Perangkat</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Data Perangkat</h5>
                <form action="<?= APPURL . '/data-perangkat/tambah'; ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="mb-1">
                                <label for="inputNik" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="inputNik" value="<?= $nik; ?>" placeholder="Nomor Induk Kependudukan" autofocus required>
                            </div>
                            <div class="mb-1">
                                <label for="InputNama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="InputNama" value="<?= $nama; ?>" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-1">
                                <label for="InputJenis" class="form-label">Jenis kelamin</label>
                                <select class="form-select" name="jenis" id="InputJenis" aria-label="Pilihan Jenis Kelamin" required>
                                    <option selected value="">Jenis Kelamin</option>
                                    <?php foreach ($jk as $row) :
                                        if ($jenis == $row) : ?>
                                            <option value="<?= $row; ?>" selected><?= $row; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row; ?>"><?= $row; ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="mb-1">
                                <label for="inputNo" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" name="telp" id="inputWarga" value="<?= $telp; ?>" placeholder="Nomor Telepon" required>
                            </div>
                            <div class="mb-1">
                                <label for="InputJabatan" class="form-label">Jabatan</label>
                                <select class="form-select" name="jabatan" id="InputJabatan" aria-label="Pilihan Jabatan" required>
                                    <option selected value="">Jabatan</option>
                                    <?php foreach ($perangkat as $p) :
                                        if ($jabatan == $p) : ?>
                                            <option value="<?= $p; ?>" selected><?= $p; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $p; ?>"><?= $p; ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="inputAlamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="inputAlamat" value="<?= $alamat; ?>" placeholder="Alamat" required>
                            </div>
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary">Tambah Perangkat</button>
                            <a href="<?= APPURL . '/data-perangkat'; ?>" type="button" class="btn btn-danger mx-2">Kembali</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /Portfolio Section -->