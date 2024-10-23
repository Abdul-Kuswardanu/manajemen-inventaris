# Sistem Manajemen Inventaris

Sistem ini adalah aplikasi manajemen inventaris yang memungkinkan pengguna untuk melakukan beberapa tindakan terkait pengelolaan barang, termasuk menambah barang, melihat stok barang masuk dan keluar, serta mengedit dan menghapus data barang.

## Fitur Utama

1. **Tambah Barang**:
   - Pengguna dapat menambahkan barang baru ke dalam sistem melalui form pop-up.
   - Form ini dapat diakses dari halaman utama, halaman stok barang masuk, dan stok barang keluar.

2. **Stock Barang Masuk**:
   - Menampilkan daftar barang yang baru masuk ke inventaris.
   - Menunjukkan informasi seperti **ID Barang**, **Nama Barang**, **Jumlah Stok** yang masuk, dan **Tanggal Masuk**.

3. **Stock Barang Keluar**:
   - Menampilkan daftar barang yang keluar dari inventaris.
   - Menunjukkan informasi seperti **ID Barang**, **Nama Barang**, **Jumlah Stok** yang keluar, dan **Tanggal Keluar**.

4. **Edit dan Hapus Barang**:
   - Pengguna dapat mengedit data barang yang ada melalui form yang ditampilkan dalam bentuk pop-up.
   - Barang juga dapat dihapus dari daftar.

## Struktur Direktori

manajemen-inventaris/ 
│ 
├── assets/ 
|      │ 
|      ├── css/ 
|             │ 
|             │ 
|             └── style.css # File CSS untuk styling halaman 
|      │ 
|      ├── js/ 
|           │ 
|           │ 
|           └── script.js # JavaScript untuk handling form pop-up 
│ 
└── image/ 
│ 
└── photo-profile.png # Gambar profil admin 
│ 
├── index.php # Halaman utama yang menampilkan daftar barang 
├── stock_masuk.php # Halaman untuk menampilkan stok barang masuk 
├── stock_keluar.php # Halaman untuk menampilkan stok barang keluar 
├── tambah.php # Logic untuk menambah barang baru 
├── edit.php # Logic untuk mengedit barang 
└── function.php # File yang berisi fungsi-fungsi PHP


## Panduan Penggunaan

1. **Menambahkan Barang**:
   - Di halaman utama atau halaman stok barang masuk/keluar, klik tombol **Tambah Barang**.
   - Isi form yang muncul di pop-up dengan **Nama Barang**, **Kategori**, **Deskripsi**, **Stok**, dan **Harga**.
   - Klik tombol **Tambah Barang** untuk menyimpan barang.

2. **Melihat Stock Barang Masuk/Keluar**:
   - Di halaman utama, terdapat tombol **Stock Barang Masuk** dan **Stock Barang Keluar** di sebelah tombol **Tambah Barang**.
   - Klik tombol tersebut untuk melihat daftar barang yang baru masuk atau keluar.
   - Informasi yang ditampilkan meliputi **ID Barang**, **Nama Barang**, **Jumlah Stok**, dan **Tanggal**.

3. **Edit Barang**:
   - Di halaman utama, di daftar barang, klik tombol **Edit** di baris barang yang ingin diedit.
   - Form pop-up akan muncul dengan data barang tersebut yang dapat Anda ubah.
   - Klik **Simpan** untuk memperbarui data barang.

4. **Hapus Barang**:
   - Klik tombol **Hapus** pada barang yang ingin dihapus.
   - Data barang akan dihapus dari daftar inventaris.

## Kustomisasi Tampilan

Untuk mengubah tampilan, Anda dapat mengedit file **style.css** yang berada di dalam folder `assets/css/`.

### Gaya untuk Tombol

Berikut adalah beberapa class CSS yang digunakan untuk styling tombol:

```css
.button-tambah, .button-stock, .button-kembali {
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
    margin-bottom: 20px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.button-tambah:hover, .button-stock:hover, .button-kembali:hover {
    background-color: #218838;
}
```

### JavaScript untuk Handling Form Pop-Up

Form pop-up diatur menggunakan JavaScript yang ada di dalam file script.js. Berikut adalah fungsi untuk membuka dan menutup form:

```Javascript
function openTambahForm() {
    document.getElementById('tambahModal').style.display = 'block';
}

function closeTambahForm() {
    document.getElementById('tambahModal').style.display = 'none';
}

function kategoriChange() {
    const select = document.getElementById('kategoriSelect');
    const input = document.getElementById('kategoriInput');
    input.value = select.value;
}
```

## Instalasi dan Konfigurasi

1. Clone repository ke local server Anda.

2. Buat database dan sesuaikan konfigurasi koneksi database di file db_invenmanage_db.php.

3. Pastikan folder assets/css dan assets/js tersedia di root project untuk styling dan interaksi.

4. Jalankan aplikasi melalui browser dan pastikan semua fitur berfungsi dengan baik.

### Kontributor

1. Abdullah Kuswardanu

2. Anda bisa langsung **copy-paste** isi di atas ke dalam file **README.md** untuk dokumentasi project. Beri tahu saya jika ada perubahan atau tambahan yang ingin dimasukkan!

## Terima Kasih 