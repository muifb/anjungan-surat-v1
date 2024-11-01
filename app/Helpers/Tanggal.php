<?php

class Tanggal
{

    protected $d, $m, $shortm;

    public static function tanggal_indo($tgl, $hr = false)
    {
        $hari = self::getHari(date('N', strtotime($tgl)));
        $tanggal = substr($tgl, 8, 2);
        $bulan = self::getBulan(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        if ($hr) {
            return $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
        }
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    public static function tgl_indo($tgl, $hr = false)
    {
        $hari = self::getHari(date('N', strtotime($tgl)));
        $jam = substr($tgl, 11, 5);
        // $mnt = substr($tgl, 14, 2);
        $tanggal = substr($tgl, 8, 2);
        // $bulan = getBulan(substr($tgl, 5, 2));
        $shortBulan = self::getShortBulan(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        if ($hr) {
            return $tanggal . ' ' . $shortBulan . ' ' . $tahun . ', ' . $hari . ' ' . $jam;
        }
        return $tanggal . ' ' . $shortBulan . ' ' . $tahun;
    }

    private static function getBulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    private static function getShortBulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    private static function getHari($hr)
    {
        switch ($hr) {
            case 1:
                return "Senin";
                break;
            case 2:
                return "Selasa";
                break;
            case 3:
                return "Rabu";
                break;
            case 4:
                return "Kamis";
                break;
            case 5:
                return "Jumat";
                break;
            case 6:
                return "Sabtu";
                break;
            case 7:
                return "Minggu";
                break;
        }
    }
}
