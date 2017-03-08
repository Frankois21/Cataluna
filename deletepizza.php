<?php

include 'connect.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);

if (!empty($_POST['id'])) {

    $id=mysqli_real_escape_string($bdd, trim($_POST['id']));
    if ($id) {
        $req = "DELETE FROM pizza WHERE id=$id";
        if (mysqli_query($bdd, $req)) {
            header('Location: admin.php');
        } else {
            echo 'Problème';
        }
    }
} else {
    echo 'cet enregistrement n\'existe pas';
}
