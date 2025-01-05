<?php 
require_once('../../assets/functions/authentification.php');
authentificationAuteur();

require_once("./../../classes/Auteur.php");

$auteur = new  Auteur();
 
$article =new Article();
$auteur->setEmail($_SESSION['email']);
$auteur->remplir();
if(isset($_POST['logout'])){
    $auteur->logout();
}

require_once('popapAjouteArticle.php');
?>
<script src="https://cdn.tailwindcss.com"></script>
<nav class="bg-white border-b border-gray-200 py-2.5 dark:bg-gray-900">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4">
        
        <a href="#" class="flex items-center">
            <img src="./../../assets/images/culture-png-3.jpg" class="h-8 mr-3" alt="Logo Lakroune">
            <span class="text-xl font-semibold whitespace-nowrap dark:text-white">Lakroune</span>
        </a>

        <button 
            data-collapse-toggle="navbar-default" 
            type="button" 
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
            aria-controls="navbar-default" 
            aria-expanded="false">
            <span class="sr-only">Ouvrir le menu principal</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <div class="hidden w-full md:flex md:items-center md:space-x-6" id="navbar-default">
         
            <div class="flex items-center  ml-[10%] space-x-3">
                <button type="button" id="addArticle" onclick="toggelPopap()"
                        class="bg-purple-700 text-white hover:bg-purple-800 px-4 py-2 rounded-md">
                    Ajouter un Article
                </button>
                <a href="home.php" 
                   class="bg-purple-700 text-white hover:bg-purple-800 px-4 py-2 rounded-md">
                    Accueil
                </a>
                <a href="listeArticle.php" 
                   class="bg-purple-700 text-white hover:bg-purple-800 px-4 py-2 rounded-md">
                   Liste des Articles
                </a>
                <form method="POST">
                    <button type="submit" name="logout"
                            class="bg-purple-700 text-white hover:bg-purple-800 px-4 py-2 rounded-md">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
