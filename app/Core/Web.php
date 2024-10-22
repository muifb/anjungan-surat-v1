<?php

namespace Pkl\MyApp\Core;

use Pkl\MyApp\Core\Router;
use Pkl\MyApp\Controllers\DefaultApp;
use Pkl\MyApp\Controllers\AuthController;
use Pkl\MyApp\Controllers\LaporanController;
use Pkl\MyApp\Controllers\PerangkatController;
use Pkl\MyApp\Controllers\SuratController;
use Pkl\MyApp\Controllers\UserController;
use Pkl\MyApp\Controllers\WargaController;
use Pkl\MyApp\Middleware\AdminMiddleware;
use Pkl\MyApp\Middleware\AuthMiddleware;
use Pkl\MyApp\Middleware\PetugasMiddleware;
use Pkl\MyApp\Middleware\SigninMiddleware;

class Web
{
    public function __construct()
    {
        // routes home
        Router::get('/', [DefaultApp::class, 'index'], [PetugasMiddleware::class]);

        // routes surat
        Router::get('/form-surat/([a-z0-9]+(?:(?:-|_)+[a-z0-9]+)*$)', [SuratController::class, 'index'], [PetugasMiddleware::class]);
        Router::post('/form-surat/cetak-surat', [SuratController::class, 'insertSurat'], [PetugasMiddleware::class]);
        Router::get('/form-surat/cetak-surat/([0-9a-zA-Z]*)', [SuratController::class, 'cetakSurat'], [AuthMiddleware::class]);

        Router::get('/laporan', [LaporanController::class, 'storeLaporan'], [AuthMiddleware::class]);

        // routes warga
        Router::get('/data-warga', [WargaController::class, 'storeWarga'], [AdminMiddleware::class]);
        Router::get('/data-warga/tambah', [WargaController::class, 'createWarga'], [AdminMiddleware::class]);
        Router::post('/data-warga/tambah', [WargaController::class, 'addWarga'], [AdminMiddleware::class]);

        // routes perangkat
        Router::get('/data-perangkat', [PerangkatController::class, 'storePerangkat'], [AdminMiddleware::class]);
        Router::get('/data-perangkat/tambah', [PerangkatController::class, 'createPerangkat'], [AdminMiddleware::class]);
        Router::post('/data-perangkat/tambah', [PerangkatController::class, 'addPerangkat'], [AdminMiddleware::class]);

        // routes user
        Router::get('/data-user', [UserController::class, 'storeUser'], [AdminMiddleware::class]);
        Router::post('/data-user/tambah', [UserController::class, 'addUser'], [AdminMiddleware::class]);
        Router::get('/data-user/hapus/([0-9a-zA-Z]*)', [UserController::class, 'destroy'], [AdminMiddleware::class]);

        // routes getData, profile
        Router::post('/getData', [DefaultApp::class, 'getData'], [AuthMiddleware::class]);
        Router::get('/profile', [DefaultApp::class, 'profile'], [AuthMiddleware::class]);

        // routes login, logout
        Router::get('/login', [AuthController::class, 'index'], [SigninMiddleware::class]);
        Router::post('/login', [AuthController::class, 'login']);
        Router::get('/logout', [AuthController::class, 'logout']);

        Router::run();
    }
}
