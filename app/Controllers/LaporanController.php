<?php

namespace Pkl\MyApp\Controllers;

use Pkl\MyApp\Core\Controller;
use Pkl\MyApp\Models\SuratModel;
use Pkl\MyApp\Models\ProfileModel;

class LaporanController extends Controller
{
    public function __construct()
    {
        // 
    }
    public function storeLaporan()
    {
        if ($_SESSION['login']['akses'] == 'Administrator') {
            $d = [
                'title' => 'Laporan',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $d = [
                'title' => 'Laporan',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }
        $data = [
            'data' => $this->model(SuratModel::class)->getAll()
        ];
        $this->view('template/template-header', $d);
        $this->view('pages/laporan', $data);
        $this->view('template/template-footer');
    }
}
