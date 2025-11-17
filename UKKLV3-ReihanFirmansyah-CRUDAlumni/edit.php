<?php
include 'koneksi.php';

// Pastikan ID valid dan aman
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data alumni berdasarkan id_alumni
$query = "SELECT * FROM alumni WHERE id_alumni = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($result);

// Variabel untuk menampung pesan
$pesan = "";

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $tahun_lulus = intval($_POST['tahun_lulus']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $pekerjaan_saat_ini = mysqli_real_escape_string($conn, $_POST['pekerjaan_saat_ini']);
    $nomor_telepon = mysqli_real_escape_string($conn, $_POST['nomor_telepon']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $sql = "UPDATE alumni SET
        nama_lengkap='$nama_lengkap',
        tahun_lulus='$tahun_lulus',
        jurusan='$jurusan',
        pekerjaan_saat_ini='$pekerjaan_saat_ini',
        nomor_telepon='$nomor_telepon',
        email='$email',
        alamat='$alamat'
        WHERE id_alumni = $id";

    if (mysqli_query($conn, $sql)) {
        $pesan = "✅ Data berhasil diupdate! <a href='index.php'>Kembali</a>";
    } else {
        $pesan = "❌ Gagal update: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Alumni</h2>
    <form method="POST" class="data11">
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" required>
        <input type="number" name="tahun_lulus" placeholder="Tahun Lulus" value="<?= htmlspecialchars($data['tahun_lulus']) ?>" required>
        <select name="jurusan" required>
            <option value="<?= htmlspecialchars($data['jurusan']) ?>"><?= htmlspecialchars($data['jurusan']) ?></option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
            <option value="Teknik Jaringan Akses Telekomunikasi">Teknik Jaringan Akses Telekomunikasi</option>
            <option value="Animasi">Animasi</option>
        </select>
        <input type="text" name="pekerjaan_saat_ini" placeholder="Pekerjaan Saat Ini" value="<?= htmlspecialchars($data['pekerjaan_saat_ini']) ?>" required>
        <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" value="<?= htmlspecialchars($data['nomor_telepon']) ?>" required>
        <input type="text" name="email" placeholder="Email" value="<?= htmlspecialchars($data['email']) ?>" required>
        <input type="text" name="alamat" placeholder="Alamat" value="<?= htmlspecialchars($data['alamat']) ?>" required>
        <button type="submit" name="update">Update</button>
    </form>

    <?php if ($pesan): ?>
        <p><?= $pesan ?></p>
    <?php endif; ?>
</body>
</html>