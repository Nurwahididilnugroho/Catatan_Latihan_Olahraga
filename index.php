<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Workout Log</title>
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
    <h1>Catat Latihan Anda</h1>
    <form action="index.php" method="POST">
        <label for="date">Tanggal:</label><br>
        <input type="date" name="date" required><br><br>

        <label for="workout_type" >Jenis Latihan:</label>
        <input type="text" name="workout_type" required><br><br>
        <!-- <select id="workout_type">
            <option value="workout_type">--Pilih salah satu--</option>
            <optgroup label="Olahraga Berat">
                <option>Angkat Beban</option>
                <option>Nebang Hutan</option>
                <option>Hitung Pasir</option>
            </optgroup>
            <optgroup label="olahraga_sedang">
                <option>Healing</option>
                <option>Jalan Santai</option>
            </optgroup>
            <optgroup label="olahraga_ringan" >
                <option>Tidur</option>
                <option>Main PS</option>
                <option>Mobile Legends</option>
            </optgroup>
        </select> -->
        <label for="sets">Jumlah Set:</label><br>
        <input type="number" name="sets" required><br><br>

        <label for="reps">Jumlah Repetisi:</label><br>
        <input type="number" name="reps" required><br><br>

        <label for="duration">Durasi (menit):</label><br>
        <input type="number" name="duration" required><br><br>

        <button type="submit" name="submit">Simpan Log</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $workout_type = $_POST['workout_type'];
        $sets = $_POST['sets'];
        $reps = $_POST['reps'];
        $duration = $_POST['duration'];

        // Masukkan data ke dalam database
        $stmt = $db->prepare("INSERT INTO logs (date, workout_type, sets, reps, duration) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$date, $workout_type, $sets, $reps, $duration]);

        echo "<p>Log berhasil disimpan!</p>";
    }
    ?>

    <a href="view.php">Lihat Catatan Latihan</a>
    </div>
    
</body>
</html>
