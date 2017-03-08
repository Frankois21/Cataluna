<?php


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

                value="'.$nom.'"

            if (mysqli_query($bdd, $req)) {
                header('Location: admin.php');
            }






                               $cache = $postClean['cache'];
                cache='$cache'

                    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cache" value="1"> Cacher :)
                </label>
            </div>
        </div>
    </div>


                          <form method="POST" action="deleteEleve.php">
            <input type="hidden" name="id" value="'.$data['id'].'"/>
            <input  class="btn btn-danger" type="submit" value="Delete" name="delete"/>
          </form>