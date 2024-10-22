<!-- Portfolio Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <!-- <div class="container section-title pb-5" data-aos="fade-up">
        <h2>Profile</h2>
    </div> -->
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="container">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Halaman Profile</h5>
                    <div class="row gy-4 mb-5">

                        <div class="col-lg-6">
                            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-person-vcard flex-shrink-0"></i>
                                <div>
                                    <h3>Nomor Induk Kependudukan</h3>
                                    <p><?= $data['nik']; ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-person-rolodex flex-shrink-0"></i>
                                <div>
                                    <h3>Nama Lengkap</h3>
                                    <p><?= $data['nama']; ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                                <i class="bi bi-gender-ambiguous flex-shrink-0"></i>
                                <div>
                                    <h3>Jenis Kelamin</h3>
                                    <p><?= $data['jk']; ?></p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>
                        <div class="col-lg-6">
                            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Nomor Telepon</h3>
                                    <p><?= $data['no_hp']; ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-command flex-shrink-0"></i>
                                <div>
                                    <h3>Jabatan</h3>
                                    <p><?= $data['jabatan']; ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Alamat</h3>
                                    <p><?= $data['alamat']; ?></p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</section>
<!-- /Portfolio Section -->