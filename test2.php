while($data = mysqli_fetch_assoc($res))
{
if ($data['base'] == 'tomate'){
echo '

<div class="col-sm-6 col-md-4 col-lg-4 pizza">
    <div class="text-center">
        <h3>'.$data['nom'].'</h3>
        <p>'.$data['ingredients'].'</p>
        <p class="prix">'.$data['petit_prix'].'€  - '.$data['grand_prix'].'€</p>
    </div>
</div>';
}

if ($data['base'] == 'creme'){
echo '

<div class="col-sm-6 col-md-4 col-lg-4 pizza">
    <div class="text-center">
        <h3>'.$data['nom'].'</h3>
        <p>'.$data['ingredients'].'</p>
        <p class="prix">'.$data['petit_prix'].'€  - '.$data['grand_prix'].'€</p>
    </div>
</div>';
}

if ($data['base'] == 'dessert'){
echo '

<div class="col-sm-6 col-md-4 col-lg-4 pizza">
    <div class="text-center">
        <h3>'.$data['nom'].'</h3>
        <p>'.$data['ingredients'].'</p>
        <p class="prix">'.$data['petit_prix'].'€  - '.$data['grand_prix'].'€</p>
    </div>
</div>';
}
}

<?php
/**
 * Created by PhpStorm.
 * User: fanny
 * Date: 08/03/17
 * Time: 16:56
 */