<?php

    include 'header.php';
    include 'connect.php';


$bdd = mysqli_connect(SERVER, USER, PASS, DB);

mysqli_set_charset($bdd,"utf8");
?>


  <!-- Qui sommes nous-->
	<div class="container-fluid hidden-xs" >
		<div class="row"> 
    <div><img src="Images/toro.jpg" class=" col-sm-3 col-sm-offset-2 img-circle img-bio"></div>
		<section class = "col-sm-5 col-lg-5" id="biographie"> <p>Ouvert depuis Juillet 2015, nous confectionnons nos pizzas à partir des meilleurs ingrédients. Nous proposons aussi des boissons pour accompagner vos déjeuner et dîners.</p> </section>
		</div>
	</div>
<br>


<?php

include 'planning.php';

?>



      <!-- Grosse image et suggestions, slurp :oP -->
  <div class="blocsuggest">
  <img src="Imagesbis/pizzabis.jpg" class="img-responsive grosse_img" alt="Responsive image">
        <div class="description">
          <div id="banniere_image">
           <div id="description" id="tomate">
             <p>Découvrez notre nouvelle recette de carbonara !</p>
            <p>Base tomate, champignons, poivrons, olives et b&#156;uf </p>
            </div>
          </div>
         </div>
  </div>

  <div class="container-fluid">
    <div class="row hidden-xs" >
     
      <div class="col-xs-4">
        <div class="blocsuggest">
          <img src="Imagesbis/pizzatomate.jpg" class="img-responsive" alt="Responsive image">
          <div class="comment"><a href="#tomate"><p>Nos bases tomate</p></a></div>
        </div>
      </div>

      <div class="col-xs-4">
        <div class="blocsuggest">
          <img src="Imagesbis/pizzacreme.jpg" class="img-responsive" alt="Responsive image">
          <div class="comment"><a href="#creme"><p>Nos bases cr&#232;me</p></a></div>
        </div>
      </div>

      <div class="col-xs-4">
        <div class="blocsuggest">
           <img src="Imagesbis/pizzasucre.jpeg" class="img-responsive" alt="Responsive image">
          <div class="comment"><a href="#dessert"><p>Nos desserts</p></a></div>
        </div>
      </div>

    </div>
      
  </div>

      <!-- Fin grosse image et suggestions-->

<?PHP
$req = "SELECT id, nom, ingredients, base, petit_prix, grand_prix
FROM pizza ORDER BY petit_prix";
$res = mysqli_query($bdd, $req);


$reqtomate = "SELECT COUNT(base) FROM cataluna.pizza WHERE base = 'tomate'";
$restomate = mysqli_query($bdd, $reqtomate);
$rowtomate = mysqli_fetch_row($restomate);

$reqcreme = "SELECT COUNT(base) FROM cataluna.pizza WHERE base = 'creme'";
$rescreme = mysqli_query($bdd, $reqcreme);
$rowcreme = mysqli_fetch_row($rescreme);

$reqdessert = "SELECT COUNT(base) FROM cataluna.pizza WHERE base = 'dessert'";
$resdessert = mysqli_query($bdd, $reqdessert);
$rowdessert = mysqli_fetch_row($resdessert);

echo '<div class="ancre hidden-xs" id="tomate"></div>
<div class="titre_menu">
    <h2>Nos bases tomate</h2>
    <p>Disponibles en 28cm et 33cm</p>
</div>';



echo '<div class="row">';
while($data = mysqli_fetch_assoc($res)) {
    if ($data['base'] == 'tomate') {
        if ($rowtomate[0] < 5){
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
        if ($rowcreme[0] < 5){
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
        if ($rowdessert[0] < 5){
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
?>






<!-- INFOS SUP PIZZAS-->
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3" id="infos_pizz">
    <p>100% FROMAGE (emmental, mozzarella) <br/>
       Toutes nos pizzas peuvent être adaptées en fonction de vos goûts: <br/>
       base tomate, crème fraîche ou aillée</p>

    <p>supplément viande ou fromage : 1.20 € <br/>
       autre supplément : 0.50 €</p>
    </div>
  </div>
</div>


<!-- EVENEMENTS-->
<div class="container-fluid" id="evenement">
  <div class="row" >
      <div class="trait_jaune">
      <div class="fond_gris">
        <div class="trait"></div>
      </div>
    </div>
        <div class="des_evenement">
        <h3>Disponible pour vos évènementiels :  </h3>
        <p>Lendemain de mariage, enterrement de vie de garçon/jeune fille, anniversaire, départ retraite, repas entreprise ...</p>
       </div>
    </div>
    </div>
  </div> 
</div>


<?php
 include 'footer.php';
?>
