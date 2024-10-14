<?php require 'db.php';

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Menghapus log dari database
$stmt = $db->prepare("DELETE FROM logs WHERE id = ?");
$stmt->execute([$id]);

echo "<p>Log berhasil dihapus!</p>";
echo "<a href='view.php'>Lihat Catatan Latihan</a>";
