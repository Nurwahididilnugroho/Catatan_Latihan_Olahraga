<?php
$dsn = 'sqlite:' . __DIR__ . '/workoutlog.db'; // Membuat atau menghubungkan ke database SQLite
try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Membuat tabel jika belum ada
    $db->exec("CREATE TABLE IF NOT EXISTS logs (
        id INTEGER PRIMARY KEY,
        date TEXT,
        workout_type TEXT,
        sets INTEGER,
        reps INTEGER,
        duration INTEGER
    )");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
