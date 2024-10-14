<?php require 'db.php'; 

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Mendapatkan data log berdasarkan ID
$stmt = $db->prepare("SELECT * FROM logs WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Log tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $workout_type = $_POST['workout_type'];
    $sets = $_POST['sets'];
    $reps = $_POST['reps'];
    $duration = $_POST['duration'];

    // Memperbarui data ke dalam database
    $stmt = $db->prepare("UPDATE logs SET date = ?, workout_type = ?, sets = ?, reps = ?, duration = ? WHERE id = ?");
    $stmt->execute([$date, $workout_type, $sets, $reps, $duration, $id]);

    echo "<p>Log berhasil diperbarui!</p>";
    echo "<a href='view.php'>Lihat Log Latihan</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Log Latihan</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
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

        form {
            margin-top: 20px;
        }

        label  {
            display: block;
            margin: 10px 0 5px;
        }

        input, textarea select{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #1976D2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin:10px;
        }

        button:hover {
            background-color: #1565C0;
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
    <h1>Edit Log Latihan</h1>
    <form action="edit.php?id=<?php echo $row['id']; ?>" method="POST">
        <label for="date">Tanggal:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required><br><br>

        <label for="workout_type">Jenis Latihan:</label>
        <input type="text" name="workout_type" value="<?php echo htmlspecialchars($row['workout_type']); ?>" required><br><br>

        <label for="sets">Jumlah Set:</label>
        <input type="number" name="sets" value="<?php echo htmlspecialchars($row['sets']); ?>" required><br><br>

        <label for="reps">Jumlah Repetisi:</label>
        <input type="number" name="reps" value="<?php echo htmlspecialchars($row['reps']); ?>" required><br><br>

        <label for="duration">Durasi (menit):</label>
        <input type="number" name="duration" value="<?php echo htmlspecialchars($row['duration']); ?>" required><br><br>

        <button type="submit">Perbarui Log</button>
    </form>
        <br>
    <a href="view.php">Kembali</a>
    </div>
   
</body>
</html>
