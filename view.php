<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Log Latihan</title>
    <link rel="stylesheet" href="style.css">
    <style>
         body {
            background: url('bg1.jpg'), linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
            background-blend-mode: overlay; /* Mencampur gambar dengan warna */
            background-size: cover;
            background-position: none;
            font-size:20px;
        }

        .container {
            max-width:1200px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            align-items:center;
         
        }
       
        a {
            padding: 10px 20px;
            background-color: #1976D2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin:10px;
            font-size:12px;
            text-decoration:none;
        }
        a:hover {
            background-color: #1565C0;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Log Latihan</h1>

<table>
    <tr>
        <th>Tanggal</th>
        <th>Jenis Latihan</th>
        <th>Jumlah Set</th>
        <th>Jumlah Repetisi</th>
        <th>Durasi (menit)</th>
        <th>Aksi</th>
    </tr>

    <?php
    // Menampilkan semua log latihan
    $stmt = $db->query("SELECT * FROM logs");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . date('d-m-y', strtotime ($row['date'])) . "</td>";
        echo "<td>" . htmlspecialchars($row['workout_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sets']) . "</td>";
        echo "<td>" . htmlspecialchars($row['reps']) . "</td>";
        echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
        echo "<td>";
        echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
        echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus log ini?\");'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
<br>

<a href="index.php">Kembali</a>
    </div>
    
</body>
</html>
