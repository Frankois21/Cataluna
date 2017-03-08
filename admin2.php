<?php
    include 'header.php';
    include 'connect.php';
    $bdd = mysqli_connect(SERVER, USER, PASS, DB);

$nom = $ingredients = $base = $petit_prix = $grand_prix = $cache = $id='';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $req = "SELECT * FROM pizza WHERE id=$id";
    $res = mysqli_query($bdd, $req);
    while($data = mysqli_fetch_assoc($res)) {
        $ingredients = $data['ingredients'];
        $base = $data['base'];
        $nom = $data['nom'];
        $petit_prix = $data['petit_prix'];
        $grand_prix = $data['grand_prix'];
        $cache = $data['cache'];
    }
    $textButton = 'Modifier';
}
if (!empty($_POST)){
        foreach ($_POST as $key=>$data){
            $postClean[$key] = mysqli_real_escape_string($bdd, htmlentities(trim($data)));
        }

        var_dump($postClean);
        if (isset($_POST['btnSubmit'])) {
            $nom = $postClean['nom'];
            $ingredients = $postClean['ingredients'];
            $base = $postClean['base'];
            $petit_prix = $postClean['petit_prix'];
            $grand_prix = $postClean['grand_prix'];
            $cache = $postClean['cache'];
            $id = $postClean['id'];

            if ($id) {
                $req = "UPDATE pizza SET nom='$nom',
                                          ingredients='$ingredients',
                                          base='$base',
                                          petit_prix='$petit_prix',
                                          grand_prix='$grand_prix',
                                          cache='$cache'
                                      WHERE id=$id";
                echo $req;
            } else {
                $req = "INSERT INTO pizza (nom, ingredients, base, petit_prix, grand_prix, cache)
                        VALUES ('$nom', '$ingredients', '$base', '$petit_prix', '$grand_prix', '$cache')";
            }

            if (mysqli_query($bdd, $req)) {
                header('Location: admin.php');
            }
    }
}


?>

<!-- FORMULAIRE-->


<h2 class="text-center">Ajouter une pizza</h2>
<br>

<form method="POST" action="admin.php" class="form-horizontal">

    <div class="form-group">
        <label for="Nom" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="nom" name ='nom'  placeholder="Nom">
        </div>
    </div>

    <div class="form-group">
        <label for="ingredients" class="col-sm-2 control-label">Liste des ingrédients</label>
        <div class="col-sm-7">
    <textarea class="form-control" rows="3" name="ingredients" placeholder="Liste des ingrédients"></textarea>
        </div>
    </div>


    <div class="form-group">
        <label for="ingredients" class="col-sm-2 control-label">Type</label>
        <div class="col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="base" id="tomate" value="tomate" checked> Base Tomate
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="base" id="creme" value="creme"> Base Crème
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="base" id="dessert" value="dessert"> Dessert
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="petit_prix">Prix 28cm</label>
        <div class="input-group col-sm-2">
            <div class="input-group-addon">€</div>
            <input type="text" class="form-control" name="petit_prix" id="petit_prix" placeholder="7.00">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="grand_prix">Prix 33cm</label>
        <div class="input-group col-sm-2">
            <div class="input-group-addon">€</div>
            <input type="text" class="form-control" name="grand_prix" id="grand_prix" placeholder="10.00">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cache" value="1"> Cacher :)
                </label>
            </div>
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="btnSubmit">Envoyer</button>
        </div>
    </div>
</form>



<!-- LISTE DES PIZZAS-->

<h2 class="text-center">Modifier une pizza</h2>
<br>


