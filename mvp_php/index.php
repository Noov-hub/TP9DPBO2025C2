<?php
include_once("view/TampilMahasiswa.php");
include_once("presenter/ProsesMahasiswa.php");

if (isset($_POST['simpan'])) {
    $pm = new ProsesMahasiswa();
    $pm->save($_POST);
    header("Location: index.php");
    exit;
}

if (isset($_GET['delete'])) {
    $pm = new ProsesMahasiswa();
    $pm->delete($_GET['delete']);
    header("Location: index.php");
    exit;
}

$view = new TampilMahasiswa();
$view->tampil();
