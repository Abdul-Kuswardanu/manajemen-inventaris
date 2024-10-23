<?php
require_once 'function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapusBarang($id)) {
        // Lakukan reorder setelah barang dihapus
        $db->query("SET @num := 0;");
        $db->query("UPDATE barang SET id = @num := (@num+1);");
        $db->query("ALTER TABLE barang AUTO_INCREMENT = 1;");
        
        header("Location: index.php");
    } else {
        echo "Error menghapus barang.";
    }
}
?>
