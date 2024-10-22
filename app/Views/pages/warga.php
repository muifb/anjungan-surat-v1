<!-- Portfolio Section -->
<section id="#service" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title pb-5" data-aos="fade-up">
        <h2>Data Warga</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="<?= APPURL . '/data-warga/tambah'; ?>" type="button" class="btn btn-success">Tambah Data Warga</a>
                </h5>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Desa</th>
                            <th>RT</th>
                            <th>RW</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['nik']; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['jk']; ?></td>
                                <td><?= Tanggal::tanggal_indo($row['tgl_lahir']); ?></td>
                                <td><?= $row['pekerjaan']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['rt']; ?></td>
                                <td><?= $row['rw']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Desa</th>
                            <th>RT</th>
                            <th>RW</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

</section><!-- /Portfolio Section -->