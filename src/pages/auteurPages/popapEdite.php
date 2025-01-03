<?php
require_once("../../classes/Auteur.php");
require_once("../../classes/Categorie.php");
$stmt = $auteur->selectCategorie();
$cat = new Categorie();
$cat->setId($article->getCategor());
$cat->remplir();

?>

<div id="activite-popap" tabindex="-1"
    class="bg-black/50  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow">
            

            <div class="p-5">
                <h3 class="text-2xl mb-0.5 font-medium"></h3>
                <p class="mb-4 text-sm font-normal text-gray-800"></p>

                <div class="text-center">
                    <p class="mb-3 text-2xl font-semibold leading-5 text-slate-900">
                        Login to your account
                    </p>
                </div>
                <form method="POST" class="max-w-md mx-auto mt-20 p-6 bg-white border rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-6">Feedback Form</h2>
                    <input type="text" value="<?php echo  $article->getId();?>" name="id" class="hidden"/>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="title">
                            title:
                        </label>
                        <input  value="<?php echo $article->getTitre() ;?>" name="Edittitle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Enter your title">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="Categorie">
                        Categorie:
                        </label>
                        <select  name="Editcategorie" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Categorie"  >
                            <option value="<?php echo $article->getCategor() ;?>"><?php echo $cat->getTitre() ;?></option>
                            <?php 
                            while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                             <option value="<?php echo $row['id'] ;?>"><?php echo $row['titre'] ;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="container">
                            container:
                        </label>
                        <textarea name="Editcontaine"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="containe" rows="5" placeholder="Enter your containe"><?php echo $article->getContainer() ;?></textarea>
                    </div>
                    <div class="flex flex-row justify-between" >
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="saveEdit" type="submit">
                            save
                        </button>
                        <button class="bg-white-500 hover:bg-gray-700 text-black border-2 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="toggelPopap()">
                            anull
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
