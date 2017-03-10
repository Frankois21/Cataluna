<?php

include 'connect.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);

if (!empty($_POST['id'])) {
    $id = mysqli_real_escape_string($bdd, trim($_POST['id']));
    if ($id) {
        $reqcache = "SELECT cache FROM cataluna.pizza WHERE id=$id";
        $rescache = mysqli_query($bdd, $reqcache);
        $cache = mysqli_fetch_row($rescache);
        if ($cache[0] == 0) {
            $req = "UPDATE cataluna.pizza SET cache = 1 WHERE id = $id";
            $textbutton = 'Afficher';
        } else {
            $req = "UPDATE cataluna.pizza SET cache = 0 WHERE id = $id";
        }
        if (mysqli_query($bdd, $req)) {
            header('Location: test.php');
        }
    }
}



/*if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $reqcache = "SELECT cache FROM cataluna.pizza WHERE id=$id";
    $rescache = mysqli_query($bdd, $reqcache);
    while ($cache = mysqli_fetch_assoc($rescache)){
        if ($cache['cache'] == 0) {
            $req = "UPDATE cataluna.pizza SET cache = 1 WHERE id = $id";
            $textbutton = 'Afficher';
        }else {
            $req = "UPDATE cataluna.pizza SET cache = 0 WHERE id = $id";
        }
    }
        header('Location: test.php');
}

$reqligne = "SELECT COUNT(base) FROM cataluna.pizza WHERE base = 'tomate'";
$resligne = mysqli_query($bdd, $reqligne);
$row = mysqli_fetch_row($resligne);

*/