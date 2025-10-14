<?php
    require_once 'connection_procedural.php';

    $name = "Iacob Andrei";
    $email = "iacob.andrei@elev.cihcahul.md";

    $sql = "INSERT INTO users (name, email) VALUE (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if($stmt){
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);

        if(mysqli_stmt_execute($stmt)){
            echo "Utilizator adaugat cu secces!";
        }else{
            if(mysqli_errno($conn) == 1062){// codul 1062 verifica duplicatul
                echo "Email-ul exista deja in baza de date";
            } else {
                echo "Erorare la inserarae:  " . mysqli_error($conn);
            }
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Nu s-a putut pregati interogare.";
    }

    mysqli_clone($conn);
?>