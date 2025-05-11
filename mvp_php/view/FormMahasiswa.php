<h2><?= isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Data Mahasiswa</h2>
<form method="post" action="">
    <input type="hidden" name="id" value="<?= $mhs->getId() ?? '' ?>">
    
    NIM: <input type="text" name="nim" value="<?= $mhs->getNim() ?? '' ?>"><br>
    Nama: <input type="text" name="nama" value="<?= $mhs->getNama() ?? '' ?>"><br>
    Tempat Lahir: <input type="text" name="tempat" value="<?= $mhs->getTempat() ?? '' ?>"><br>
    Tanggal Lahir: <input type="date" name="tl" value="<?= $mhs->getTl() ?? '' ?>"><br>
    Gender: <input type="text" name="gender" value="<?= $mhs->getGender() ?? '' ?>"><br>
    Email: <input type="email" name="email" value="<?= $mhs->getEmail() ?? '' ?>"><br>
    Telepon: <input type="text" name="telepon" value="<?= $mhs->getTelepon() ?? '' ?>"><br>
    
    <input type="submit" name="simpan" value="Simpan">
</form>
<br>
<a href="index.php">Kembali ke Daftar</a>
