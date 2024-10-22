<!-- Portfolio Section -->
<section id="#service" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title pb-5" data-aos="fade-up">
        <h2>Data Perangkat</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?= APPURL . '/data-perangkat/tambah'; ?>" type="button" class="btn btn-success">Tambah Data Perangkat</a>
                    </h5>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telephon</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $row['nik']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['jk']; ?></td>
                                    <td><?= $row['no_hp']; ?></td>
                                    <td><?= $row['jabatan']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telephon</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

    </div>

</section><!-- /Portfolio Section -->