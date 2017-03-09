

<?php

include 'header.php';
include 'connect.php';

$bdd = mysqli_connect(SERVER, USER, PASS, DB);

mysqli_set_charset($bdd,"utf8");

$req = "SELECT id, nom, ingredients, base, petit_prix, grand_prix, cache 
            FROM pizza";
$res = mysqli_query($bdd, $req);


$reqligne = "SELECT COUNT(base) FROM cataluna.pizza WHERE base = 'tomate'";
$resligne = mysqli_query($bdd, $reqligne);
$row = mysqli_fetch_row($resligne);




echo '<div class="ancre hidden-xs" id="dessert"></div>
<div class="titre_menu">
    <h2>Nos desserts</h2>
    <p>Disponibles en 28cm et 33cm</p>
</div>';


echo '<div class="row">';
while($data = mysqli_fetch_assoc($res)) {
    if ($data['base'] == 'tomate') {
            if ($row[0] < 5){
                echo '<div class="col-sm-6 col-md-4 col-lg-3 pizza">';
            } else echo '<div class="col-sm-6 col-md-4 col-lg-2 pizza">';

            echo '<div class="text-center">
                <h3>' . $data['nom'] . '</h3>
                <p>' . $data['ingredients'] . '</p>
                <p class="prix">' . $data['petit_prix'] . ' €  - ' . $data['grand_prix'] . ' €</p>
            </div>
                </div>';
            }
}

echo '
</div>
</div>';

