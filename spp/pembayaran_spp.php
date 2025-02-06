<?php
require_once '../config.php'; // File koneksi database

// Ambil data siswa
$query = "SELECT * FROM tbl_guru";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> <!-- Menambahkan font Google -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 199px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        form select, form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
        }
        form button {
            width: 100%;
            padding: 14px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #218838;
        }
        .back-button {
            margin-top: 15px;
            text-align: center;
        }
        .back-button a {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            display: inline-block;
            padding: 8px 15px;
            border-radius: 5px;
            border: 1px solid #007bff;
            transition: background-color 0.3s, color 0.3s;
        }
        .back-button a:hover {
            background-color: #007bff;  
            color: #fff;
        }
        small {
            display: block;
            margin-top: 5px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pembayaran SPP</h1>
        <form action="proses_pembayaran.php" method="POST" enctype="multipart/form-data">
            <label for="siswa">Pilih Siswa:</label>
            <select name="siswa_id" id="siswa" required>
                <option value="">-- Pilih Siswa --</option>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="jumlah_bayar">Jumlah Bayar:</label>
            <input type="text" name="jumlah_bayar" id="jumlah_bayar" value="350000" readonly>
            <small>"Jumlah yang harus dibayar oleh anda adalah Rp 350.000"</small>
            <br>

            <label for="image">Bukti Pembayaran:</label>
            <input type="file" name="image" id="image" required>
            <small>Format file: PNG, JPG, JPEG. Maksimal 1 MB.</small>

            <button type="submit">Bayar</button>
        </form>

        <div class="back-button">
            <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</body>
</html>
