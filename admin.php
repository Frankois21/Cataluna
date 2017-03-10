<?php
    include 'header.php';
    include 'connect.php';
    $bdd = mysqli_connect(SERVER, USER, PASS, DB);

mysqli_set_charset($bdd,"utf8");

$nom = $ingredients = $base = $petit_prix = $grand_prix = $id=''; $cache =0;


    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $req = "SELECT * FROM pizza WHERE id=$id";
        $res = mysqli_query($bdd, $req);
        while ($data = mysqli_fetch_assoc($res)) {
            $nom = $data['nom'];
            $ingredients = $data['ingredients'];
            $base = $data['base'];
            $petit_prix = $data['petit_prix'];
            $grand_prix = $data['grand_prix'];

        }
    }

if (!empty($_POST)) {
    foreach ($_POST as $key => $data) {
        $postClean[$key] = mysqli_real_escape_string($bdd, htmlentities(trim($data)));
    }

    //var_dump($postClean);
    if (isset($_POST['btnSubmit'])) {
        $nom = $postClean['nom'];
        $ingredients = $postClean['ingredients'];
        $base = $postClean['base'];
        $petit_prix = $postClean['petit_prix'];
        $grand_prix = $postClean['grand_prix'];
        $id = $postClean['id'];

        if (!empty($id)) {
            $req = "UPDATE pizza SET nom='$nom',
                                          ingredients='$ingredients',
                                          base='$base',
                                          petit_prix='$petit_prix',
                                          grand_prix='$grand_prix'        
                                      WHERE id='$id'";
            //echo $req;



        } else {
            $req = "INSERT INTO pizza (nom, ingredients, base, petit_prix, grand_prix)
                        VALUES ('$nom', '$ingredients', '$base', '$petit_prix', '$grand_prix')";
            //echo $req;
        }

        if (mysqli_query($bdd, $req)){
            echo mysqli_error($bdd);
        } else {
            header('Location: admin.php');
        }
    }
}


$tab_base = ['Tomate' => 'tomate',
              'Creme' => 'creme',
                'Dessert' => 'dessert'];






echo ' <!-- FORMULAIRE--> <h2 class="text-center titre_admin">Ajouter une pizza</h2>
<br>';

echo ' <form method="POST" action="admin.php" class="form-horizontal">

    <div class="form-group">
        <label for="Nom" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="nom" name ="nom" value="'.$nom.'" placeholder="Nom">
        </div>
    </div>

    <div class="form-group">
        <label for="ingredients" class="col-sm-2 control-label">Liste des ingrédients</label>
        <div class="col-sm-7">
    <textarea class="form-control" rows="3" name="ingredients" placeholder="Liste des ingrédients"> '.$ingredients.'</textarea>
        </div>
    </div>
';

echo '    <div class="form-group">
        <label for="ingredients" class="col-sm-2 control-label">Type</label>    
        <div class="col-sm-10">';

            foreach ($tab_base as $label => $value)
            {
                $checked = '';
               if ($base == $value) {
                   $checked = 'checked="checked"';
              }

                echo '
            
            <div class="radio">
                <label for="'.$value.'">'.$label.'</label>
                    <input class="form-control" required type="radio" name="base"  value="'.$value.'" id="'.$value.'" '.$checked.'/>
                
            </div>';

            };

        echo '</div>    
';

echo '    <div class="form-group">
        <label class="col-sm-2 control-label" for="petit_prix">Prix 28cm</label>
        <div class="input-group col-sm-2">
            <div class="input-group-addon">€</div>
            <input type="text" class="form-control" name="petit_prix" value="'.$petit_prix.'" id="petit_prix" placeholder="7.00">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="grand_prix">Prix 33cm</label>
        <div class="input-group col-sm-2">
            <div class="input-group-addon">€</div>
            <input type="text" class="form-control" name="grand_prix" value="'.$grand_prix.'" id="grand_prix" placeholder="10.00">
        </div>
    </div>


    <input type="hidden" name="id" value="'.$id.'"/>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="btnSubmit">Envoyer</button>
        </div>
    </div>
</form>';

echo '  <div class="row" >
      <div class="trait_jaune">
      <div class="fond_gris">
        <div class="trait"></div>
      </div>
    </div>';

echo ' <!-- LISTE DES PIZZAS--> <h2 class="text-center titre_admin">Modifier une pizza</h2>
<br>';

$req = "SELECT id, nom, ingredients, base, petit_prix, grand_prix 
            FROM pizza ORDER BY base";
$res = mysqli_query($bdd, $req);


echo '<div class="row">';
while($data = mysqli_fetch_assoc($res))
{
    echo '<div class="col-sm-6 col-md-4 col-lg-4 pizza">
      <div class="text-center">
          <h3>'.$data['nom'].'</h3>
          <p>'.$data['ingredients'].'</p>
          <p class="prix">'.$data['petit_prix'].'€  - '.$data['grand_prix'].'€</p>
          
         <form  class="col-sm-2 col-sm-offset-3" method="POST" action="deletepizza.php">
            <input type="hidden" name="id" value="'.$data['id'].'"/>
            <input  class="btn btn-danger" type="submit" value="Delete" name="delete"/>
          </form>
                      
          <form class="col-sm-2 col-sm-offset-1" method="POST" action="admin.php">
            <input type="hidden" name="id" value="'.$data['id'].'"/>
            <a href="admin.php?id='.$data['id'].'" class="btn btn-primary">Modifier</a>
          </form>
      </div>  
    </div>';
}



echo '</div>';
?>
