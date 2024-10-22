<?php

use Pkl\MyApp\Core\Message;

$data = Message::getData();
$nik = "";
$nama = "";
$tanggal = "";
$jenis = "";
$warga = "";
$agama = "";
$pekerjaan = "";
$status = "";
$alamat = "";
$rt = "";
$rw = "";
if ($data) {
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tanggal = $data['tanggal'];
    $jenis = $data['jenis'];
    $warga = $data['warga'];
    $agama = $data['agama'];
    $pekerjaan = $data['pekerjaan'];
    $status = $data['status'];
    $alamat = $data['alamat'];
    $rt = $data['rt'];
    $rw = $data['rw'];
}

Message::flash();
?>
<!-- Portfolio Section -->
<section id="#service" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title pb-5" data-aos="fade-up">
        <h2>Tambah Data Warga</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Data Warga</h5>
                <form action="<?= APPURL . '/data-warga/tambah'; ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
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
                                <label for="InputTanggal" class="form-label">Tanggal Lahir</label>
                                <!-- <input type="text" class="form-control" name="tanggal" id="InputTanggal" placeholder="Tanggal Lahir" required> -->
                                <input type="datetime-local" class="flatpickr-input" name="tanggal" id="InputTanggal" value="<?= $tanggal; ?>" placeholder="Tanggal Lahir" required>
                            </div>
                            <div class="mb-1">
                                <label for="InputJenis" class="form-label">Jenis kelamin</label>
                                <select class="form-select" name="jenis" id="InputJenis" aria-label="Pilihan Jenis Kelamin" required>
                                    <option selected value="">Jenis Kelamin</option>
                                    <?php foreach ($jkel as $j) :
                                        if ($jenis == $j) : ?>
                                            <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $j; ?>"><?= $j; ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="mb-1">
                                <label for="inputWarga" class="form-label">Kewarganegaraan</label>
                                <select class="form-select" name="warga" id="inputWarga" aria-label="Pilihan Kwarganegaraan" required>
                                    <option selected value="">Kwarganegaraan</option>
                                    <?php foreach ($kwar as $k) :
                                        if ($warga == $k) : ?>
                                            <option value="<?= $k; ?>" selected><?= $k; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $k; ?>"><?= $k; ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="inputAgama" class="form-label">Agama</label>
                                <select class="form-select" name="agama" id="inputAgama" aria-label="Pilihan Agama" required>
                                    <option selected value="">Agama</option>
                                    <?php foreach ($agm as $a) :
                                        if ($agama == $a) : ?>
                                            <option value="<?= $a; ?>" selected><?= $a; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $a; ?>"><?= $a; ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="InputPekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="InputPekerjaan" value="<?= $pekerjaan; ?>" placeholder="Pekerjaan" required>
                            </div>
                            <div class="mb-1">
                                <label for="inputStatus" class="form-label">Status Perkawinan</label>
                                <select class="form-select" name="status" id="inputStatus" aria-label="Pilihan Status Perkawinan" required>
                                    <option selected value="">Status Perkawinan</option>
                                    <?php foreach ($sts as $s) :
                                        if ($status == $s) : ?>
                                            <option value="<?= $s; ?>" selected><?= $s; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $s; ?>"><?= $s; ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputAlamat" class="form-label">Desa</label>
                                    <input type="text" class="form-control" name="alamat" id="inputAlamat" value="<?= $alamat; ?>" placeholder="Desa" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputRt" class="form-label">Rt</label>
                                    <select class="form-select" name="rt" id="inputRt" aria-label="Pilihan Rt" required>
                                        <option selected value="">RT</option>
                                        <?php for ($noRt = 1; $noRt <= $no; $noRt++) :
                                            if ($rt == $noRt) : ?>
                                                <option value="<?= $noRt; ?>" selected><?= $noRt; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $noRt; ?>"><?= $noRt; ?></option>
                                        <?php endif;
                                        endfor ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputRw" class="form-label">Rw</label>
                                    <select class="form-select" name="rw" id="inputRw" aria-label="Pilihan Rw" required>
                                        <option selected value="">RW</option>
                                        <?php for ($noRw = 1; $noRw <= $no; $noRw++) :
                                            if ($rw == $noRw) : ?>
                                                <option value="<?= $noRw; ?>" selected><?= $noRw; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $noRw; ?>"><?= $noRw; ?></option>
                                        <?php endif;
                                        endfor ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary">Tambah Warga</button>
                            <a href="<?= APPURL . '/data-warga'; ?>" type="button" class="btn btn-danger mx-2">Kembali</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /Portfolio Section -->