<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{	
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;
		$data = "<h2>Daftar Mahasiswa</h2>";
		$data .= "<a href='index.php?tambah=true'>+ Tambah Mahasiswa</a><br><br>";

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td> 
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
			<td>
    			<a href='index.php?edit=" . $this->prosesmahasiswa->getId($i) . "'>Edit</a> |
    			<a href='index.php?delete=" . $this->prosesmahasiswa->getId($i) . "' onclick=\"return confirm('Yakin ingin menghapus?')\">Delete</a>
			</td>
			</tr>";
		}
		// Bagian FORM
$form = "";
if (isset($_GET['edit'])) {
    $mhs = $this->prosesmahasiswa->find($_GET['edit']);
    $form .= "<h3>Edit Mahasiswa</h3>";
    $form .= "<form method='post' action='index.php'>
        <input type='hidden' name='id' value='" . $mhs->getId() . "'>
        NIM: <input type='text' name='nim' value='" . $mhs->getNim() . "'><br>
        Nama: <input type='text' name='nama' value='" . $mhs->getNama() . "'><br>
        Tempat Lahir: <input type='text' name='tempat' value='" . $mhs->getTempat() . "'><br>
        Tanggal Lahir: <input type='date' name='tl' value='" . $mhs->getTl() . "'><br>
        Gender: <input type='text' name='gender' value='" . $mhs->getGender() . "'><br>
        Email: <input type='email' name='email' value='" . $mhs->getEmail() . "'><br>
        Telepon: <input type='text' name='telp' value='" . $mhs->getTelepon() . "'><br>
        <input type='submit' name='simpan' value='Simpan'>
    </form>";
}
elseif (isset($_GET['tambah'])) {
    $form .= "<h3>Tambah Mahasiswa</h3>";
    $form .= "<form method='post' action='index.php'>
        <input type='hidden' name='id' value=''>
        NIM: <input type='text' name='nim'><br>
        Nama: <input type='text' name='nama'><br>
        Tempat Lahir: <input type='text' name='tempat'><br>
        Tanggal Lahir: <input type='date' name='tl'><br>
        Gender: <input type='text' name='gender'><br>
        Email: <input type='email' name='email'><br>
        Telepon: <input type='text' name='telp'><br>
        <input type='submit' name='simpan' value='Simpan'>
    </form>";
}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->replace("DATA_FORM", $form);
		$this->tpl->write();
		

	}
	
}
