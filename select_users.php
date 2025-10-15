<?php
require_once 'connection_procedural.php';

$emailPattern = "%@%";

$sql = "SELECT id, name, email, created_at FROM users WHERE email LIKE ? ORDER BY id DESC";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    die('Eroare la pregătirea interogării: ' . htmlspecialchars(mysqli_error($conn)));
}

mysqli_stmt_bind_param($stmt, "s", $emailPattern);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nume</th><th>Email</th><th>Creat la</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $id = htmlspecialchars($row['id']);
    $name = htmlspecialchars($row['name']);
    $email = htmlspecialchars($row['email']);
    $created = htmlspecialchars($row['created_at'] ?? '');
    echo "<tr><td>{$id}</td><td>{$name}</td><td>{$email}</td><td>{$created}</td></tr>";
}
echo "</table>";

echo '<style>
table{border-collapse:collapse; width:100%; max-width:900px; margin-top:12px}
th,td{border:1px solid #e5e7eb; padding:8px; text-align:left}
th{background:#f3f4f6; font-weight:600}
tbody tr:nth-child(odd){background:#fff}
tbody tr:nth-child(even){background:#fbfbfc}
</style>';

mysqli_free_result($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>