<?php

use Pkl\MyApp\Core\Message;

$isi = Message::getData();
$nik = "";
$lvl = "";
$username = "";
if ($isi) {
    $nik = $isi['nik'];
    $lvl = $isi['level'];
    $username = $isi['username'];
}

Message::flash();
?>
<!-- Portfolio Section -->
<section id="#service" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title pb-5" data-aos="fade-up">
        <h2>Data User</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1;
                                    foreach ($data as $row) : ?>
                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td>
                                                <a href="<?= APPURL . '/data-user/hapus/' . $row['id_user']; ?>" class="btn btn-outline-danger btn-sm tombol-hapus">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah User</h5>

                            <form action="<?= APPURL . '/data-user/tambah'; ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                                <div class="mb-1">
                                    <label for="inputNama" class="form-label">Nama User</label>
                                    <select class="form-select" name="nik" id="inputNama" aria-label="Pilihan Perangkat" required>
                                        <option selected value="">Nama User</option>
                                        <?php foreach ($perangkat as $p) :
                                            if ($nik == $p['nik']) : ?>
                                                <option value="<?= $p['nik']; ?>" selected><?= $p['nama']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $p['nik']; ?>"><?= $p['nama']; ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="inputLevel" class="form-label">Level User</label>
                                    <select class="form-select" name="level" id="inputLevel" aria-label="Pilihan Perangkat" required>
                                        <option selected value="">Level User</option>
                                        <?php foreach ($level as $l) :
                                            if ($lvl == $l) : ?>
                                                <option value="<?= $l; ?>" selected><?= $l; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $l; ?>"><?= $l; ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control user-username" name="username" id="username" value="<?= $username; ?>" placeholder="Username">
                                    <div class="invalid-feedback" id="invalid-feedback-username">
                                        Please enter a message in the textarea.
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>

                                <div class="col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary tambah-user">Tambah User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>
<!-- /Portfolio Section -->

<script>
    const isEmpty = str => !str.trim().length;
    const akunUser = document.getElementsByClassName('user-username')[0];
    const pesan = document.getElementById('invalid-feedback-username');
    const tambahUser = document.querySelector('.tambah-user');

    function containsWhitespace(e) {
        return e.match(/\s/) !== null;
    }

    akunUser.addEventListener("keyup", function() {
        if (isEmpty(this.value)) {
            // console.log("username tidak boleh kosong");
            pesan.innerHTML = "Username tidak boleh kosong!"
            akunUser.classList.add("is-invalid");
            tambahUser.setAttribute('disabled', 'disabled');
        } else if (this.value.length <= 5) {
            // console.log("Username minimal 5 karakter");
            pesan.innerHTML = "Username minimal 5 karakter!"
            akunUser.classList.add("is-invalid");
            tambahUser.setAttribute('disabled', 'disabled');
        } else if (containsWhitespace(this.value)) {
            // console.log("username tidak boleh mengandung spasi");
            pesan.innerHTML = "Username tidak boleh mengandung spasi!"
            akunUser.classList.add("is-invalid");
            tambahUser.setAttribute('disabled', 'disabled');
        } else {
            pesan.innerHTML = ""
            // console.log("username : tidak mengandung spasi");
            akunUser.classList.remove("is-invalid");
            akunUser.classList.add("is-valid");
        }

        if (this.value.length >= 5 && !containsWhitespace(this.value)) {
            pesan.innerHTML = ""
            akunUser.classList.remove("is-invalid");
            akunUser.classList.add("is-valid");
            tambahUser.removeAttribute('disabled');
        }
    });
</script>