
<?php

include 'header.php';
include 'connect.php';

$bdd = mysqli_connect(SERVER, USER, PASS, DB);

mysqli_set_charset($bdd,"utf8");


$req = "SELECT id, nom, ingredients, base, petit_prix, grand_prix 
            FROM pizza";
$res = mysqli_query($bdd, $req);


echo '<div class="ancre hidden-xs" id="tomate"></div>
<div class="titre_menu">
    <h2>Nos bases tomate</h2>
    <p>Disponibles en 28cm et 33cm</p>
</div>';


echo '<div class="row">';
    while($data = mysqli_fetch_assoc($res)) {
        if ($data['base'] == 'tomate') {
            echo '

    <div class="col-sm-6 col-md-4 col-lg-2 pizza">
        <div class="text-center">
            <h3>' . $data['nom'] . '</h3>
            <p>' . $data['ingredients'] . '</p>
            <p class="prix">' . $data['petit_prix'] . ' €  - ' . $data['grand_prix'] . ' €</p>
        </div>
    </div>';
        }
    }
    mysqli_data_seek($res, 0);
echo '
</div>
</div>';


echo '<div class="ancre hidden-xs" id="creme"></div>
<div class="titre_menu">
    <h2>Nos bases creme</h2>
    <p>Disponibles en 28cm et 33cm</p>
</div>';


echo '<div class="row">';
while($data = mysqli_fetch_assoc($res)) {
    if ($data['base'] == 'creme') {
        echo '

    <div class="col-sm-6 col-md-4 col-lg-4 pizza">
        <div class="text-center">
            <h3>' . $data['nom'] . '</h3>
            <p>' . $data['ingredients'] . '</p>
            <p class="prix">' . $data['petit_prix'] . ' €  - ' . $data['grand_prix'] . ' €</p>
        </div>
    </div>';
    }
}
mysqli_data_seek($res, 0);
echo '
</div>
</div>';

echo '<div class="ancre hidden-xs" id="dessert"></div>
<div class="titre_menu">
    <h2>Nos desserts</h2>
    <p>Disponibles en 28cm et 33cm</p>
</div>';


echo '<div class="row">';
while($data = mysqli_fetch_assoc($res)) {
    if ($data['base'] == 'dessert') {
        echo '

    <div class="col-sm-6 col-md-4 col-lg-4 pizza">
        <div class="text-center">
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


    include 'footer.php';
?>