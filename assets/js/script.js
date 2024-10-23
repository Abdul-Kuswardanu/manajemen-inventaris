function openTambahForm() {
    document.getElementById('tambahModal').style.display = 'block';
}

function closeTambahForm() {
    document.getElementById('tambahModal').style.display = 'none';
}

function openEditForm(id, nama, kategori, deskripsi, stok, harga) {
    console.log('ID:', id);
    console.log('Nama:', nama);
    console.log('Kategori:', kategori);
    console.log('Deskripsi:', deskripsi);
    console.log('Stok:', stok);
    console.log('Harga:', harga);

    document.getElementById('editId').value = id;
    document.getElementById('editNama').value = nama !== undefined ? nama : '';
    document.getElementById('editKategoriInput').value = kategori !== undefined ? kategori : '';
    document.getElementById('editDeskripsi').value = deskripsi !== undefined ? deskripsi : '';
    document.getElementById('editStok').value = stok !== undefined ? stok : '';
    document.getElementById('editHarga').value = harga !== undefined ? harga : '';

    document.getElementById('editModal').style.display = 'block';
}

function closeEditForm() {
    document.getElementById('editModal').style.display = 'none';
}

function openHapusForm(id) {
    if (confirm('Yakin ingin menghapus barang ini?')) {
        window.location.href = 'hapus.php?id=' + id;
    }
}

function kategoriChange() {
    const kategoriSelect = document.getElementById('kategoriSelect');
    const kategoriInput = document.getElementById('kategoriInput');
    
    if (kategoriSelect.value) {
        kategoriInput.value = kategoriSelect.value;
    }
}

function editKategoriChange() {
    const kategoriSelect = document.getElementById('editKategoriSelect');
    const kategoriInput = document.getElementById('editKategoriInput');
    
    if (kategoriSelect.value) {
        kategoriInput.value = kategoriSelect.value;
    }
}
