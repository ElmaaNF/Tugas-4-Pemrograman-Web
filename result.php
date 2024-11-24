<?php
session_start();
if (!isset($_SESSION['data'])) {
    die("Tidak ada data yang tersedia.");
}
$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="result-style.css">
</head>
<body>
    <h2>Hasil Pendaftaran</h2>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?= str_repeat('*', strlen($data['password'])) ?></td>
        </tr>
        <tr>
            <td>Biografi</td>
            <td><?= nl2br(htmlspecialchars($data['bio'])) ?></td>
        </tr>
        <tr>
            <td>Browser</td>
            <td><?= htmlspecialchars($data['browser']) ?></td>
        </tr>
    </table>

    <h3>Isi File :</h3>
    <table>
        <tr>
            <th>teks</th>
        </tr>
        <?php foreach ($data['fileContent'] as $index => $line): ?>
        <tr>
            <td><?= htmlspecialchars($line) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
