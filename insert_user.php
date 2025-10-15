<?php
require_once 'connection_procedural.php';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

if ($name === '' || $email === '') {
    echo "<p style='color:#a00'>Numele și email-ul sunt obligatorii. <a href='form_insert_user.html'>Înapoi</a></p>";
    mysqli_close($conn);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p style='color:#a00'>Email invalid. <a href='form_insert_user.html'>Înapoi</a></p>";
    mysqli_close($conn);
    exit;
}

$sql = "INSERT INTO users (name, email) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    echo "<p style='color:#a00'>Eroare pregătire interogare: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
    mysqli_close($conn);
    exit;
}

mysqli_stmt_bind_param($stmt, "ss", $name, $email);

if (mysqli_stmt_execute($stmt)) {
    echo "<p style='color:green'>Utilizator adăugat cu succes.</p>";
    $insertOk = true;
} else {
    if (mysqli_errno($conn) == 1062) {
        echo "<p style='color:#a00'>Email-ul există deja în baza de date.</p>";
    } else {
        echo "<p style='color:#a00'>Eroare la inserare: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
    }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
$delay = (!empty($insertOk) && $insertOk) ? 2000 : 4500; // ms
echo "<script>setTimeout(function(){ window.location.href = 'form_insert_user.html'; }, $delay);</script>";
?>