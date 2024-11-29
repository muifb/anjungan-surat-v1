<style>
    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-0.5 * var(--bs-gutter-x));
        margin-left: calc(-0.5 * var(--bs-gutter-x));
    }

    .row>* {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x) * 0.5);
        padding-left: calc(var(--bs-gutter-x) * 0.5);
        margin-top: var(--bs-gutter-y);
    }

    .col {
        flex: 1 0 0%;
    }

    .row-cols-auto>* {
        flex: 0 0 auto;
        width: auto;
    }

    .row-cols-1>* {
        flex: 0 0 auto;
        width: 100%;
    }

    .row-cols-2>* {
        flex: 0 0 auto;
        width: 50%;
    }

    .row-cols-3>* {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .row-cols-4>* {
        flex: 0 0 auto;
        width: 25%;
    }

    .row-cols-5>* {
        flex: 0 0 auto;
        width: 20%;
    }

    .row-cols-6>* {
        flex: 0 0 auto;
        width: 16.66666667%;
    }

    .col-auto {
        flex: 0 0 auto;
        width: auto;
    }

    .col-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }

    .col-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }

    .col-3 {
        flex: 0 0 auto;
        width: 25%;
    }

    .col-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .col-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }

    .col-6 {
        flex: 0 0 auto;
        width: 50%;
    }

    .col-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }

    .col-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }

    .col-9 {
        flex: 0 0 auto;
        width: 75%;
    }

    .col-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }

    .col-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }

    .col-12 {
        flex: 0 0 auto;
        width: 100%;
    }

    h1,
    h3,
    h5,
    h6 {
        text-align: center;
        padding-right: 200px;
        color: var(--default-color);
    }

    /* .row {
            margin-top: 20px;
        } */

    .desalogo {
        font-size: 24px;
        font-size: 2.5vw;
        margin-bottom: 0;
    }

    .kablogo {
        font-size: 2vw;
        margin-bottom: 0;
    }

    .alamatlogo {
        font-size: 1.5vw;
        margin-bottom: 0;
    }

    .kodeposlogo {
        font-size: 1.7vw;
        margin-bottom: 0;
    }

    #tls {
        text-align: right;
    }

    .alamat-tujuan {
        margin-left: 25%;
    }

    .tertanda {
        margin-left: 7%;
    }

    .garis1 {
        border-top: 3px solid black;
        height: 2px;
        border-bottom: 1px solid black;
    }

    #logo {
        margin: auto;
        margin-left: 80%;
        margin-right: auto;
        height: 140px;
    }

    #text-header {
        /* margin: auto; */
        padding-left: 10%;
        /* margin-right: auto; */
    }

    #tempat-tgl {
        margin-left: 120px;
    }

    #camat {
        text-align: center;
    }

    #nama-camat {
        margin-top: 100px;
        text-align: center;
    }

    .justify {
        text-indent: 45px;
        text-align: justify;
    }

    .kop-surat {
        padding-top: 3rem !important;
    }

    @media print {
        #logo {
            height: 80px;
        }

        .print {
            flex: none;
        }

        .justify {
            text-indent: 45px;
            text-align: justify;
        }

        .kop-surat {
            padding-top: 0rem !important;
        }

        .kembali {
            display: none;
        }
    }
</style>
<div id="services">
    <a href="<?= APPURL . '/form-surat/' . $kembali; ?>" type="button" class="btn btn-outline-secondary ms-5 mt-2 kembali">
        Kembali
    </a>
    <header class="kop-surat">
        <div class="row">
            <div id="img" class="col-3">
                <img id="logo" src="<?= APPURL . '/assets/img/lambang-kabupaten-kudus.png' ?>" />
            </div>
            <div id="text-header" class="col-9 list-title print">
                <h3 class="kablogo">PEMERINTAH KABUPATEN KUDUS</h3>
                <h3 class="kablogo">KECAMATAN KALIWUNGU</h3>
                <h1 class="desalogo"><strong>DESA BAKALANKRAPYAK</strong></h1>
                <h6 class="alamatlogo">Jl. Raya Besito No.1, Desa Bakalankrapyak, kec. Kaliwungu 59332</h6>
                <!-- <h5 class="kodeposlogo"><strong>BERGAS 50552</strong></h5> -->
            </div>
        </div>
    </header>

    <div class="container">
        <hr class="garis1" />
        <div class="row">
            <div class="list-title text-center mb-3">
                <div><strong><u>SURAT KETERANGAN <?= strtoupper($data['jenis_surat']); ?></u></strong></div>
                <div class="fw-normal fs-6">Nomor : <?= $data['no_surat']; ?></div>
            </div>
            <div class="container mb-2">
                <div class="list-title">
                    <p class="justify">Yang bertanda tangan dibawah ini Kepala Desa Bakalankrapyak, Kecamatan Kaliwungu, Kabupaten Kudus menerangkan dengan sebenarnya, bahwa:</p>
                </div>
                <div class="ms-5 mb-4">
                    <div class="row list-title fs-6">
                        <div class="col-4">NIK</div>
                        <div class="col-8">: <?= $data['nik']; ?></div>
                    </div>
                    <div class="row list-title fs-6">
                        <div class="col-4">Nama Lengkap</div>
                        <div class="col-8">: <?= $data['nama']; ?></div>
                    </div>
                    <div class="row list-title fs-6">
                        <div class="col-4">Jenis Kelamin</div>
                        <div class="col-8">: <?= $data['jk']; ?></div>
                    </div>
                    <div class="row list-title fs-6">
                        <div class="col-4">Tanggal Lahir</div>
                        <div class="col-8">: <?= Tanggal::tanggal_indo($data['tgl_lahir']); ?></div>
                    </div>
                    <div class="row list-title fs-6">
                        <div class="col-4">Bangsa/Agama</div>
                        <div class="col-8">: <?= $data['kwa'] . '/' . $data['agama']; ?></div>
                    </div>
                    <div class="row list-title fs-6">
                        <div class="col-4">Pekerjaan</div>
                        <div class="col-8">: <?= $data['pekerjaan']; ?></div>
                    </div>
                    <div class="row list-title fs-6">
                        <div class="col-4">Alamat KTP</div>
                        <div class="col-8">: Desa <?= $data['alamat'] . ' RT. ' . $data['rt'] . ' RW ' . $data['rw']; ?></div>
                    </div>
                </div>
                <div class="list-title">
                    <p class="justify"><?= $paragraf; ?></p>
                    <p class="justify">Surat keterangan ini dibuat untuk <strong><u><?= $data['keterangan']; ?></u></strong>.</p>
                    <p class="justify">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya mohon kepada yang bersangkutan untuk mengetahui dan maklum adanya.</p>
                </div>
            </div>
            <div id="tgl-srt" class="col-md-6">
                <p id="tls">Bakalankrapyak, <?= Tanggal::tanggal_indo($data['tgl_cetak']); ?></p>
            </div>
            <div id="alamat" class="row">
                <div id="lampiran" class="col-6">
                    <p id="camat"><strong></br>Pemohon</br></strong></p>
                    <div id="nama-camat"><strong><?= $data['nama']; ?></strong></div>
                </div>
                <div id="tgl-srt" class="col-6">
                    <div class="alamat-tujuan">
                        <p id="camat"><strong>KEPALA DESA BAKALANKRAPYAK</strong></p>
                        <div id="nama-camat"><strong><?= $dt['nama']; ?></strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.print();
</script>