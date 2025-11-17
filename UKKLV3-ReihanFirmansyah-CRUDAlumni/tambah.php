<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Tambah Data Alumni</h2>
    <form method="POST" class="data11">
        <input type="text" name="nama_lengkap" placeholder="Nama" required>
        <input type="text" name="tahun_lulus" placeholder="Tahun Lulus" required>
        <select name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
            <option value="Teknik Jaringan Akses Telekomunikasi">Teknik Jaringan Akses Telekomunikasi</option>
            <option value="Animasi">Animasi</option>
        </select>
        <input type="text" name="pekerjaan_saat_ini" placeholder="Pekerjaan Saat Ini" required>
        <input type="text" name="nomor_telepon" placeholder="Nomor Telpon" required>
        <input type="text" name="email" placeholder="Email" required>
        <textarea name="alamat" placeholder="Alamat" required></textarea>
        <button type="submit" name="submit">Simpan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO alumni (nama_lengkap, tahun_lulus, jurusan, pekerjaan_saat_ini, nomor_telepon, email, alamat)
            VALUES ('{$_POST['nama_lengkap']}', '{$_POST['tahun_lulus']}', '{$_POST['jurusan']}', '{$_POST['pekerjaan_saat_ini']}', '{$_POST['nomor_telepon']}', '{$_POST['email']}', '{$_POST['alamat']}')";
        mysqli_query($conn, $sql);
        echo "<p>Data berhasil disimpan! <a href='index.php'>Kembali</a></p>";
    }
    ?>
</body>

</html>