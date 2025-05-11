<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']);
				$mahasiswa->setTelepon($row['telp']);
				

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}
	function save($data) {
		$this->tabelmahasiswa->open();
		if ($data['id'] != '') {
			$query = "UPDATE mahasiswa SET nim='{$data['nim']}', nama='{$data['nama']}', tempat='{$data['tempat']}', tl='{$data['tl']}', gender='{$data['gender']}', email='{$data['email']}', telp='{$data['telp']}' WHERE id={$data['id']}";
		} else {
			$query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) VALUES ('{$data['nim']}', '{$data['nama']}', '{$data['tempat']}', '{$data['tl']}', '{$data['gender']}', '{$data['email']}', '{$data['telp']}')";
		}
		$this->tabelmahasiswa->execute($query);
		$this->tabelmahasiswa->close();
	}
	
	function delete($id) {
		$this->tabelmahasiswa->open();
		$query = "DELETE FROM mahasiswa WHERE id=$id";
		$this->tabelmahasiswa->execute($query);
		$this->tabelmahasiswa->close();
	}
	
	function find($id) {
		$this->tabelmahasiswa->open();
		$query = "SELECT * FROM mahasiswa WHERE id=$id";
		$this->tabelmahasiswa->execute($query);
		$row = $this->tabelmahasiswa->getResult();
		$this->tabelmahasiswa->close();
	
		$m = new Mahasiswa();
		$m->setId($row['id']);
		$m->setNim($row['nim']);
		$m->setNama($row['nama']);
		$m->setTempat($row['tempat']);
		$m->setTl($row['tl']);
		$m->setGender($row['gender']);
		$m->setEmail($row['email']);
		$m->setTelepon($row['telp']);
		return $m;
	}
	


	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
	
	function getEmail($i) {
		return $this->data[$i]->email;
	}
	function getTelepon($i) {
		return $this->data[$i]->telp;
	}
	
}
