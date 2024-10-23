<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    if (tambahBarang($nama, $kategori, $deskripsi, $stok, $harga)) {
        header("Location: index.php");
    } else {
        echo "Error menambah barang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Tambah Barang</h2>
    <form method="POST">
        <label for="nama">Nama Barang</label>
        <input type="text" id="nama" name="nama" required>

        <label for="kategori">Kategori Barang</label>
        <input type="text" id="kategori" name="kategori" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" required></textarea>

        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" required>

        <button type="submit">Tambah Barang</button>
    </form>
</body>
</html>
