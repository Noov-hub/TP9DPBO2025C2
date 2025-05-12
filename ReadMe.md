# TP9 DPBO
# Janji
Saya Ibnu Fadhilah dengan NIM 2300613 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.


## Deskripsi
memungkinkan pengguna untuk:
- Melihat daftar mahasiswa
- Menambahkan data mahasiswa baru
- Mengedit data mahasiswa yang ada
- Menghapus data mahasiswa

## Struktur Program
```
├── index.php                # Entry point aplikasi
├── model/
│   ├── DB.class.php         # Kelas untuk koneksi database
│   ├── Mahasiswa.class.php  # Model data mahasiswa
│   ├── TabelMahasiswa.class.php # Model untuk operasi tabel mahasiswa
│   └── Template.class.php   # Kelas untuk template view
├── presenter/
│   ├── KontrakPresenter.php     # Interface untuk Presenter
│   └── ProsesMahasiswa.php  # Presenter untuk logika bisnis mahasiswa
├── templates/
│   └── skin.html            # Template HTML untuk tampilan
└── view/
    ├── TampilMahasiswa.php  # View untuk menampilkan data mahasiswa
    └── KontrakView.php          # Interface untuk View
```

## Alur Program

### 1. Inisialisasi
- Saat `index.php` diakses, aplikasi akan membuat instance dari `TampilMahasiswa` (View)
- View kemudian membuat instance `ProsesMahasiswa` (Presenter)
- Presenter membuat koneksi ke database melalui `TabelMahasiswa`

### 2. Menampilkan Data
1. View memanggil `tampil()` method
2. Presenter memanggil `prosesDataMahasiswa()` untuk mengambil data dari database
3. Data diubah menjadi objek `Mahasiswa` dan disimpan dalam array
4. View mengiterasi data dan memformatnya ke dalam tabel HTML
5. View memuat template `skin.html` dan mengganti placeholder dengan data yang telah diformat

### 3. Operasi CRUD
#### Create/Update:
1. Pengguna mengklik "Tambah Mahasiswa" atau "Edit"
2. Form ditampilkan dengan field yang sesuai
3. Saat form disubmit, data dikirim ke `index.php`
4. `index.php` memanggil `save()` method pada Presenter
5. Presenter menentukan apakah operasi INSERT atau UPDATE berdasarkan ID
6. Data disimpan ke database
7. Pengguna diarahkan kembali ke halaman utama

#### Delete:
1. Pengguna mengklik "Delete"
2. Konfirmasi muncul sebelum penghapusan
3. Jika dikonfirmasi, `index.php` memanggil `delete()` method pada Presenter
4. Presenter menjalankan query DELETE
5. Pengguna diarahkan kembali ke halaman utama

## Komponen Utama

### 1. Model
- `Mahasiswa.class.php`: Merepresentasikan entitas mahasiswa dengan atribut dan method getter/setter
- `TabelMahasiswa.class.php`: Menangani operasi database terkait tabel mahasiswa
- `DB.class.php`: Membungkus fungsi-fungsi koneksi dan query MySQL

### 2. Presenter
- `ProsesMahasiswa.php`: Mengimplementasikan logika bisnis:
  - Mengambil data dari model
  - Memproses operasi CRUD
  - Menyediakan method untuk View mengakses data

### 3. View
- `TampilMahasiswa.php`: Menangani tampilan:
  - Membuat tabel data mahasiswa
  - Menampilkan form tambah/edit
  - Menggunakan template untuk konsistensi tampilan

### 4. Template
- `skin.html`: Template dasar HTML dengan Bootstrap yang menyediakan struktur dasar dan styling

## Fitur Tambahan
- Validasi konfirmasi sebelum penghapusan data
- Form yang dinamis (tambah/edit) dalam satu halaman
- Tampilan responsif dengan Bootstrap
- Pemisahan yang jelas antara logika bisnis dan tampilan
