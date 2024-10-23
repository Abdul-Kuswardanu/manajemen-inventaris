<?php
require_once 'function.php';
$stockKeluar = menampilkanStockKeluar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <title>Stock Barang Keluar</title>
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
        <h2>Stock Barang Keluar</h2>
        <div class="buttons">
            <button onclick="window.location.href='index.php'" class="button-kembali">Kembali</button>
            <button onclick="openTambahForm()" class="button-tambah">Tambah Barang</button>
            <button onclick="window.location.href='stock_masuk.php'" class="button-stock">Stock Barang Masuk</button>
            <button onclick="window.location.href='stock_keluar.php'" class="button-stock">Stock Barang Keluar</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($stockKeluar as $stock) {
                    echo "<tr>
                            <td>{$stock['id_barang']}</td>
                            <td>{$stock['nama_barang']}</td>
                            <td>{$stock['jumlah']}</td>
                            <td>{$stock['tanggal']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <!-- Modal untuk Tambah Barang -->
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

    <footer class="footer">
        <div class="info">Tentang Aplikasi</div>
        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
            <a href="#">Youtube</a>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
