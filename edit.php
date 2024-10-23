<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];  // Ambil ID dari POST
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    if (editBarang($id, $nama, $kategori, $deskripsi, $stok, $harga)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error mengedit barang.";
    }
} else {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "ID barang tidak ditemukan atau tidak valid.";
        exit;
    }

    $id = $_GET['id'];
    $result = $db->query("SELECT * FROM barang WHERE id = $id");

    if ($result && $result->num_rows > 0) {
        $barang = $result->fetch_assoc();
    } else {
        echo "Barang dengan ID ini tidak ditemukan.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Edit Barang</title>
</head>
<body>
    <h2>Edit Barang</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <label for="nama">Nama Barang</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($barang['nama_barang']); ?>" required>

        <label for="kategori">Kategori Barang</label>
        <input type="text" id="kategoriInput" name="kategori" value="<?php echo htmlspecialchars($barang['kategori_barang']); ?>" required>
        <select id="kategoriSelect" onchange="kategoriChange()">
            <option value="">-- Pilih Kategori --</option>
            <option value="Elektronik" <?php if($barang['kategori_barang'] == 'Elektronik') echo 'selected'; ?>>Elektronik</option>
            <option value="Furniture" <?php if($barang['kategori_barang'] == 'Furniture') echo 'selected'; ?>>Furniture</option>
            <option value="Alat Tulis" <?php if($barang['kategori_barang'] == 'Alat Tulis') echo 'selected'; ?>>Alat Tulis</option>
        </select>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($barang['deskripsi']); ?></textarea>

        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" value="<?php echo htmlspecialchars($barang['stok']); ?>" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" value="<?php echo htmlspecialchars($barang['harga']); ?>" required>

        <button type="submit">Edit Barang</button>
    </form>

    <script>
        function kategoriChange() {
            const select = document.getElementById('kategoriSelect');
            const input = document.getElementById('kategoriInput');
            input.value = select.value;
        }
    </script>
</body>
</html>
