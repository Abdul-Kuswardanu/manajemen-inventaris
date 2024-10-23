<?php

/** -------------------------------------------------------------------------------------- */

/** ---- Konfigurasi buat database, koneksi database, dan buat table yang diperlukan ----- */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inventaris_management_sederhana';

$db = new mysqli($host, $username, $password);
$db->query("CREATE DATABASE IF NOT EXISTS $database");
$db->select_db($database);

/** -------------------------------------------------------------------------------------- */

// membuat tabel barang
$db->query("
    CREATE TABLE IF NOT EXISTS barang (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama_barang VARCHAR(100),
        kategori_barang VARCHAR(50),
        deskripsi TEXT,
        stok INT,
        harga FLOAT,
        tanggal_dibuat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        tanggal_diupdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
");

/** -------------------------------------------------------------------------------------- */

// membuat tabel pada barang masuk nya kapan
$db->query("
    CREATE TABLE IF NOT EXISTS barang_masuk (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_barang INT,
        jumlah INT,
        tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_barang) REFERENCES barang(id) ON DELETE CASCADE
    )
");

/** -------------------------------------------------------------------------------------- */

// membuat tabel pada barang keluar nya kapan
$db->query("
    CREATE TABLE IF NOT EXISTS barang_keluar (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_barang INT,
        jumlah INT,
        tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_barang) REFERENCES barang(id) ON DELETE CASCADE
    )
");

/** -------------------------------------------------------------------------------------- */

// membuat tabel untuk kapan barang dihapus
$db->query("
    CREATE TABLE IF NOT EXISTS barang_hapus (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_barang INT,
        nama_barang VARCHAR(100),
        kategori_barang VARCHAR(50),
        deskripsi TEXT,
        stok INT,
        harga FLOAT,
        tanggal_hapus TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

/** -------------------------------------------------------------------------------------- */