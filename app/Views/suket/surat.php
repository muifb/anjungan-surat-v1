<!-- Contact Section -->
<section id="services" class="about-alt section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Surat Keterangan <?= $surat; ?></h2>
    </div>
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <form action="<?= APPURL . '/form-surat/cetak-surat'; ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <input type="hidden" name="jenis_surat" value="<?= $surat; ?>" class="form-control">

                <div class="col-md-6 mb-3">
                    <div class="mb-1">
                        <label for="nik" class="form-label">NIK</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" autofocus>
                            <button class="btn btn-outline-secondary cari" type="button" id="cari">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" disabled readonly>
                        <input type="hidden" name="nama" class="form-control" id="hnama">
                    </div>
                    <div class="mb-1">
                        <label for="tanggal" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal" placeholder="Tanggal Lahir" disabled readonly>
                        <input type="hidden" name="tgl_lahir" class="form-control" id="htanggal">
                    </div>
                    <div class="mb-1">
                        <label for="jenis" class="form-label">Jenis kelamin</label>
                        <input type="text" class="form-control" id="jenis" placeholder="Jenis Kelamin" disabled readonly>
                        <input type="hidden" class="form-control" name="jk" id="hjenis">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="mb-1">
                        <label for="warga" class="form-label">Kewarganegaraan/Agama</label>
                        <input type="text" class="form-control" id="warga" placeholder="Kewarganegaraan/Agama" disabled readonly>
                        <input type="hidden" class="form-control" name="warga" id="hwarga">
                    </div>
                    <div class="mb-1">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" disabled readonly>
                        <input type="hidden" class="form-control" name="pekerjaan" id="hpekerjaan">
                    </div>
                    <div class="mb-1">
                        <label for="status" class="form-label">Status Perkawinan</label>
                        <input type="text" class="form-control" id="status" placeholder="Status Perkawinan" disabled readonly>
                        <input type="hidden" class="form-control" name="status" id="hstatus">
                    </div>
                    <div class="mb-1">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" disabled readonly>
                        <input type="hidden" class="form-control" name="alamat" id="halamat">
                    </div>
                </div>

                <div class=" row mb-3">
                    <label for="nomorSurat" class="form-label">Nomor Surat</label>
                    <input type="hidden" class="form-control" name="no_surat" id="nosurat">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="srt" id="nomorSurat" aria-describedby="nomorHelpBlock" required>
                        <div id="nomorHelpBlock" class="form-text">
                            Nomor, Contoh : 202
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nomorSurat1" value="<?= Tanggal::bulan_romawi(date('m')); ?>" aria-describedby="nomorHelpBlock1" disabled readonly>
                        <input type="hidden" class="form-control" name="srt1" value="<?= Tanggal::bulan_romawi(date('m')); ?>" id="bulan">
                        <div id="nomorHelpBlock1" class="form-text">
                            Bulan
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="srt2" value="<?= date('Y'); ?>" id="nomorSurat2" aria-describedby="nomorHelpBlock2" disabled readonly>
                        <input type="hidden" class="form-control" name="srt2" value="<?= date('Y'); ?>" id="tahun">
                        <div id="nomorHelpBlock2" class="form-text">
                            Tahun
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control keterangan" name="keterangan" id="Keterangan" rows="2"></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                    <button type="submit" class="btn btn-primary kirim" disabled>Cetak Surat</button>
                    <a href="<?= APPURL; ?>" type="button" class="btn btn-danger mx-2">Kembali</a>
                </div>

            </div>

        </form>
        <!-- End Form -->
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Tidak Ditemukan!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang anda cari tidak terdaftar dalam desa kami. Silahkan mencari data yang lain</div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /Contact Section -->

<script>
    const isEmpty = str => !str.trim().length;
    const keterangan = document.getElementsByClassName("keterangan")[0];
    const tombol = document.querySelector('.kirim');

    keterangan.addEventListener("input", function() {
        if (isEmpty(this.value)) {
            // console.log("NAME is invalid (Empty)");
            tombol.setAttribute('disabled', 'disabled');
        } else {
            // console.log(`NAME value is: ${this.value}`);
            tombol.removeAttribute('disabled');
        }
    });
</script>