<?php

$page = $_GET['controller'] ?? 'perusahaan';
$action = $_GET['action'] ?? 'index';

switch ($page) {
    case 'perusahaan':
        require_once __DIR__ . '/Controller/PerusahaanController.php';
        $controller = new PerusahaanController();
        break;
    case 'karyawan':
        require_once __DIR__ . '/Controller/KaryawanController.php';
        $controller = new KaryawanController();
        break;
    case 'keterangan-gaji':
        require_once __DIR__ . '/Controller/KeteranganGajiController.php';
        $controller = new KeteranganGajiController();
        break;
    case 'slip-gaji':
        require_once __DIR__ . '/Controller/SlipGajiController.php';
        $controller = new SlipGajiController();
        break;
    default:
        die('404 Not Found');
}

switch ($action) {
    case 'index': $controller->index(); break;
    case 'create': $controller->create(); break;
    case 'store': $controller->store(); break;
    case 'show': $controller->show($_GET['id']); break;
    case 'edit': $controller->edit($_GET['id']); break;
    case 'update': $controller->update($_GET['id']); break;
    case 'delete': $controller->delete($_GET['id']); break;
    default:
        die('404 Not Found');
}