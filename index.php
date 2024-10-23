<?php
require_once 'function.php';
$barangList = menampilkanBarang();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <title>Manajemen Inventaris</title>
</head>
<body>
    <header class="header">
        <div class="logo"><a href="index.php">Inventaris</a></div>
        <div class="profile">
            <span>Administrator</span>
            <img src="assets/image/photo-profile.png" class="profile-img">
        </div>
    </header>
    <main class="main">
        <h2>Daftar Barang</h2>
        <div class="buttons">
            <button onclick="openTambahForm()" class="button-tambah">Tambah Barang</button>
            <button onclick="window.location.href='stock_masuk.php'" class="button-stock">Stock Barang Masuk</button>
            <button onclick="window.location.href='stock_keluar.php'" class="button-stock">Stock Barang Keluar</button>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diupdate</th>
                <th>Aksi</th>
            </tr>
            <?php menampilkanTabelBody($barangList); ?>
        </table>
    </main>

    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTambahForm()">&times;</span>
            <h2>Tambah Barang</h2>
            <form id="tambahForm" method="POST" action="tambah.php">
                <label for="nama">Nama Barang</label>
                <input type="text" id="nama" name="nama" required>
                <label for="kategori">Kategori Barang</label>
                <div style="display: flex; gap: 10px;">
                    <input type="text" id="kategoriInput" name="kategori" required>
                    <select id="kategoriSelect" onchange="kategoriChange()">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Alat Tulis">Alat Tulis</option>
                    </select>
                </div>
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" required>
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" required>
                <button type="submit">Tambah Barang</button>
            </form>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditForm()">&times;</span>
            <h2>Edit Barang</h2>
            <form id="editForm" method="POST" action="edit.php">
                <input type="hidden" id="editId" name="id">
                <label for="editNama">Nama Barang</label>
                <input type="text" id="editNama" name="nama" required>
                <label for="editKategori">Kategori Barang</label>
                <div style="display: flex; gap: 10px;">
                    <input type="text" id="editKategoriInput" name="kategori" required>
                    <select id="editKategoriSelect" onchange="editKategoriChange()">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Alat Tulis">Alat Tulis</option>
                    </select>
                </div>
                <label for="editDeskripsi">Deskripsi</label>
                <textarea id="editDeskripsi" name="deskripsi" required></textarea>
                <label for="editStok">Stok</label>
                <input type="number" id="editStok" name="stok" required>
                <label for="editHarga">Harga</label>
                <input type="number" id="editHarga" name="harga" required>
                <button type="submit">Edit Barang</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="info">Tentang Aplikasi</div>
        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
            <a href="#">Youtube</a>
        </div>
    </footer>
</body>
</html>
