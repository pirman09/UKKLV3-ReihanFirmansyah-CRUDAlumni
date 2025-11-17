<?php
include 'koneksi.php';

// Pastikan ada parameter id_alumni
if (isset($_GET['id'])) {
    $id_alumni = intval($_GET['id']);

    // Hapus data berdasarkan id_alumni
    mysqli_query($conn, "DELETE FROM alumni WHERE id_alumni = $id_alumni");

    // Menyusun ulang id_alumni agar urut lagi dari 1
    mysqli_query($conn, "SET @num := 0");
    mysqli_query($conn, "UPDATE alumni SET id_alumni = @num := @num + 1 ORDER BY id_alumni");

    // Reset auto increment agar lanjut dari ID terakhir
    mysqli_query($conn, "ALTER TABLE alumni AUTO_INCREMENT = 1");
}

// Kembali ke halaman utama
header("Location: index.php");
exit;