# TP10DPBO2425C1

## Janji

Saya Dzaka Musyaffa Hidayat dengan NIM 2404913 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi

Program ini adalah aplikasi manajemen data yang berkaitan dengan perkeretaapian. Aplikasi ini dibangun menggunakan bahasa PHP dengan menerapkan konsep Model-View-ViewModel (MVVM), dan memanfaatkan basis data MySQL/MariaDB.

Data yang dikelola meliputi:

1. ``Depo``: Tempat penyimpanan dan perawatan sarana kereta api.
2. ``Lokomotif``: Kendaraan utama penarik rangkaian kereta.
3. ``Gerbong``: Kendaraan yang ditarik oleh lokomotif (untuk penumpang atau barang).
4. ``Rangkaian``: Kumpulan lokomotif dan/atau gerbong yang membentuk satu kesatuan.
5. ``Detail Rangkaian``: Detail komponen (lokomotif/gerbong) yang ada dalam sebuah rangkaian.

Program ini menyediakan fungsi CRUD (Create, Read, Update, Delete) untuk setiap entitas, memungkinkan pengguna untuk mengelola data perkeretaapian secara efisien melalui antarmuka web.

## Desain Program

Aplikasi ini dirancang dengan arsitektur Model-View-ViewModel (MVVM), yang memisahkan logika antarmuka pengguna dari logika bisnis dan data, sehingga mempermudah pemeliharaan dan pengembangan.

### 1. Model ``(models/``)

Kelas-kelas dalam folder ini bertanggung jawab untuk berinteraksi langsung dengan basis data. Setiap file merepresentasikan satu entitas data dan berisi logika untuk operasi CRUD (seperti ``Depo.php``, ``Lokomotif.php``, dll.).
- Kelas ``Database.php`` di dalam folder ``config/`` digunakan untuk menangani koneksi ke database (``db_kereta.sql``).

### 2. ViewModel (``viewmodels/``)

Kelas-kelas ViewModel (seperti ``DepoViewModel.php``) bertindak sebagai jembatan antara Model dan View yang memiliki tugas:
- Menerima permintaan dari View (input pengguna).
- Memanggil metode yang sesuai dari Model untuk memproses data.
- Memformat data yang diterima dari Model agar siap ditampilkan oleh View.
- Menampung logika bisnis yang terkait dengan tampilan.

### 3. View (``views/``)

Folder ini berisi file-file HTML/PHP yang berfungsi sebagai antarmuka pengguna (UI). Mereka bertanggung jawab penuh atas presentasi data kepada pengguna dan menerima input dari pengguna.
- Setiap entitas memiliki dua View utama: satu untuk menampilkan daftar data (``*_list.php``) dan satu untuk formulir input/edit (``*_form.php``).
- Folder template/ berisi bagian header dan footer yang digunakan kembali di semua halaman untuk menjaga konsistensi tampilan.

### 4. Controller (``index.php``)

File index.php bertindak sebagai Controller sentral (Front Controller) yang memiliki tugas:
- Menerima semua permintaan HTTP.
- Mengarahkan permintaan ke ViewModel yang tepat.
- Memuat View yang sesuai untuk menampilkan hasil.

## Struktur Folder
```
TP10DPBO2425C1/
├── db_kereta.sql
├── project/
│   ├── config/
│   │   └── Database.php
│   ├── index.php
│   ├── models/
│   │   ├── Depo.php
│   │   ├── DetailRangkaian.php
│   │   ├── Gerbong.php
│   │   ├── Lokomotif.php
│   │   └── Rangkaian.php
│   ├── viewmodels/
│   │   ├── DepoViewModel.php
│   │   ├── DetailRangkaianViewModel.php
│   │   ├── GerbongViewModel.php
│   │   ├── LokomotifViewModel.php
│   │   └── RangkaianViewModel.php
│   └── views/
│       ├── depo_form.php
│       ├── depo_list.php
│       ├── detailrangkaian_list.php
│       ├── gerbong_form.php
│       ├── gerbong_list.php
│       ├── lokomotif_form.php
│       ├── lokomotif_list.php
│       ├── rangkaian_form.php
│       ├── rangkaian_list.php
│       └── template/
│           ├── footer.php
│           └── header.php
└── README.md
```

## Alur Program

### 1. Akses Awal

Pengguna mengakses ``index.php`` tanpa parameter, yang biasanya akan menampilkan halaman daftar default (misalnya ``lokomotif_list.php``).

### 2. Permintaan Data (READ)

- _Controller_ (``index.php``) mengidentifikasi permintaan untuk menampilkan daftar.
- Ia menginstansiasi ``ViewModel``.
- ``ViewModel`` memanggil metode ``getAllData()`` dari *_Model_.
- *_Model_ berinteraksi dengan ``db_kereta`` (melalui ``Database.php``) dan mengambil data.
- *_Model_ mengembalikan data ke _ViewModel_, yang kemudian disiapkan dan dikirim ke _View_.
- _Controller_ memuat ``*_list.php`` untuk menampilkan data kepada pengguna.

### 3. Permintaan Modifikasi (CREATE/UPDATE)

- Pengguna mengklik tombol "Tambah" atau "Edit".
- _Controller_ memuat _View_ ``*_form.php``.
- Pengguna mengisi formulir dan menekan "Simpan".
- _Controller_ menerima input formulir dan memanggil ``*ViewModel`` dengan data input.
- ``*ViewModel`` memvalidasi data dan memanggil metode ``insertData()`` atau ``updateData()`` dari *_Model_.
- _Model_ menjalankan query INSERT/UPDATE ke database.
- Setelah operasi berhasil, _Controller_ akan mengarahkan (redirect) pengguna kembali ke halaman daftar.

## Dokumentasi

https://github.com/user-attachments/assets/38da8d9c-bb83-4c19-887f-5104d7132f2c

