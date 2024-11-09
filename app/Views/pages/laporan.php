<!-- Portfolio Section -->
<section id="#service" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Laporan Surat</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Pembuatan Surat</h5>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Keterangan</th>
                            <th>Tanggal Cetak</th>
                            <th>Dicetak Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        use PhpParser\Node\Stmt\Echo_;

                        $nomor = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['jenis_surat']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?= Tanggal::tgl_idn($row['tgl_cetak'], true); ?></td>
                                <td><?= $row['nm_perangkat'] ? $row['nm_perangkat'] : 'Admin'; ?></td>
                                <td>
                                    <a href="<?= APPURL . '/form-surat/cetak-surat/' . $row['id_surat']; ?>" class="btn btn-outline-primary btn-sm" type="button">
                                        <i class="bi bi-printer-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jenis Surat date</th>
                            <th>Keterangan</th>
                            <th>Tanggal Cetak</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

</section><!-- /Portfolio Section -->