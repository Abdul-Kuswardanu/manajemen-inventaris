<?php
require_once 'db_invenmanage_db.php';

/** -------------------------------------------------------------------------------------- */

/** ------------------- Kumpulan fungsi untuk operasi ke halaman utama ----------------- */


// fungsi untuk menampilkan barang
function menampilkanBarang() {
    global $db;
    $result = $db->query("SELECT * FROM barang");
    $barangList = [];
    while ($row = $result->fetch_assoc()) {
        $barangList[] = $row;
    }
    return $barangList;
}

/** -------------------------------------------------------------------------------------- */

// fungsi untuk menambah barang
function tambahBarang($nama, $kategori, $deskripsi, $stok, $harga) {
    global $db;

    if ($stmt = $db->prepare("INSERT INTO barang (nama_barang, kategori_barang, deskripsi, stok, harga) VALUES (?, ?, ?, ?, ?)")) {
        $stmt->bind_param('sssii', $nama, $kategori, $deskripsi, $stok, $harga);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error executing query: " . $stmt->error;
            return false;
        }
    } else {
        echo "Error preparing statement: " . $db->error;
        return false;
    }
}

/** -------------------------------------------------------------------------------------- */

// fungsi untuk edit barang
function editBarang($id, $nama, $kategori, $deskripsi, $stok, $harga) {
    global $db;

    if ($stmt = $db->prepare("UPDATE barang SET nama_barang = ?, kategori_barang = ?, deskripsi = ?, stok = ?, harga = ? WHERE id = ?")) {
        $stmt->bind_param('sssiii', $nama, $kategori, $deskripsi, $stok, $harga, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error executing query: " . $stmt->error;
            return false;
        }
    } else {
        echo "Error preparing statement: " . $db->error;
        return false;
    }
}

/** -------------------------------------------------------------------------------------- */

// fungsi untuk hapus barang
function hapusBarang($id) {
    global $db;

    $barang = $db->query("SELECT * FROM barang WHERE id = $id")->fetch_assoc();
    $stmt = $db->prepare("INSERT INTO barang_hapus (id_barang, nama_barang, kategori_barang, deskripsi, stok, harga) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssii', $barang['id'], $barang['nama_barang'], $barang['kategori_barang'], $barang['deskripsi'], $barang['stok'], $barang['harga']);
    $stmt->execute();

    $stmt = $db->prepare("DELETE FROM barang WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}

/** -------------------------------------------------------------------------------------- */

// fungsi untuk tambah stok yang masuk
function menampilkanStockMasuk() {
    global $db;
    $result = $db->query("
        SELECT barang_masuk.id_barang, barang.nama_barang, barang_masuk.jumlah, barang_masuk.tanggal 
        FROM barang_masuk 
        JOIN barang ON barang_masuk.id_barang = barang.id
    ");
    $stockList = [];
    while ($row = $result->fetch_assoc()) {
        $stockList[] = $row;
    }
    return $stockList;
}

/** -------------------------------------------------------------------------------------- */

// fungsi untuk tambah stok yang keluar
function menampilkanStockKeluar() {
    global $db;
    $result = $db->query("
        SELECT barang_keluar.id_barang, barang.nama_barang, barang_keluar.jumlah, barang_keluar.tanggal 
        FROM barang_keluar 
        JOIN barang ON barang_keluar.id_barang = barang.id
    ");
    $stockList = [];
    while ($row = $result->fetch_assoc()) {
        $stockList[] = $row;
    }
    return $stockList;
}


/** -------------------------------------------------------------------------------------- */

// fungsi menampilkan barang pada tabel list
function menampilkanTabelBody($barangList) {
    foreach ($barangList as $barang) {
        echo "<tr>
                <td>{$barang['id']}</td>
                <td>{$barang['nama_barang']}</td>
                <td>{$barang['kategori_barang']}</td>
                <td>{$barang['stok']}</td>
                <td>{$barang['harga']}</td>
                <td>{$barang['tanggal_dibuat']}</td>
                <td>{$barang['tanggal_diupdate']}</td>
                <td>
                    <button onclick=\"openEditForm({$barang['id']})\">Edit</button>
                    <button onclick=\"openHapusForm({$barang['id']})\">Hapus</button>
                </td>
              </tr>";
    }
}

/** -------------------------------------------------------------------------------------- */