<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $bio = trim($_POST['bio']);
    $file = $_FILES['file'];

    if (strlen($name) < 3) {
        die("Nama harus minimal 3 karakter.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email tidak valid.");
    }
    if (strlen($password) < 6) {
        die("Password harus minimal 6 karakter.");
    }
    if (empty($bio)) {
        die("Biografi tidak boleh kosong.");
    }
    if ($file['size'] > 1024 * 1024) {
        die("Ukuran file maksimal 1MB.");
    }
    if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'txt') {
        die("Hanya file teks (.txt) yang diperbolehkan.");
    }

    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode(PHP_EOL, $fileContent);

    $browser = $_SERVER['HTTP_USER_AGENT'];

    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'bio' => $bio,
        'fileContent' => $fileLines,
        'browser' => $browser
    ];

    header("Location: result.php");
    exit;
}
?>
