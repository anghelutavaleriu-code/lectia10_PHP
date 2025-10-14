<?php
    require_once 'connection_procedural.php';

    $emailPattern = "%@%";

    $sql = "SELECT * FROM users WHERE email LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $emailPattern);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nume</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['id']}</td> <td>{$row['name']}</td> <td>{$row['email']}</td></tr>";
    }
    echo "</table>";

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>