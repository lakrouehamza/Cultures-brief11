<?php
require_once("../../classes/Auteur.php");
$stmt = $auteur->selectCategorie();
?>
<div id="activite-popap" tabindex="-1"
    class="bg-black/50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow">
            <button type="button" onclick="toggelPopap()"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"><svg
                    aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        cliprule="evenodd"></path>
                </svg>
                <span class="sr-only">Fermer le popup</span>
            </button>

            <div class="p-5">
                <h3 class="text-2xl mb-0.5 font-medium"></h3>
                <p class="mb-4 text-sm font-normal text-gray-800"></p>

                <div class="text-center">
                    <p class="mb-3 text-2xl font-semibold leading-5 text-slate-900">
                        Connectez-vous à votre compte
                    </p>
                </div>
                <form method="POST" class="max-w-md mx-auto mt-20 p-6 bg-white border rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-6">Formulaire de feedback</h2>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="title">
                            Titre :
                        </label>
                        <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Entrez votre titre">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="image">
                            Titre :
                        </label>
                        <input name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" placeholder="Entrez votre image">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="Categorie">
                        Catégorie :
                        </label>
                        <select name="categorie" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Categorie">
                            <option value="">Sélectionner une catégorie</option>
                            <?php 
                            while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                             <option value="<?php echo $row['id']; ?>"><?php echo $row['titre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="container">
                            Contenu :
                        </label>
                        <textarea name="containe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="containe" rows="5" placeholder="Entrez votre contenu"></textarea>
                    </div>
                    <div class="flex flex-row justify-between" >
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Enregistrer
                        </button>
                        <button class="bg-white-500 hover:bg-gray-700 text-black border-2 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="toggelPopap()">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
