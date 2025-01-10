<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home </title>
</head>
<body>
<?php 

require_once('header.php');

// echo $_SESSION['email'];


if(isset($_POST['containe']) && isset($_POST['title'])&& isset($_POST['categorie'])){
    $article->setTitre($_POST['title']);
    $article->setContainer($_POST['containe']);
    $article->setCategor($_POST['categorie']);
    $article->setImage($_POST['categorie']);
     $auteur->ecrireArticle($article);
    //  echo $_POST['title'];
}
if(isset($_POST['delete'])){
    $article->setId($_POST['id']);
    $article->remplir();
    $auteur->deleteArticle($article);
}
if(isset($_POST['edit'])){
    $article->setId($_POST['id']);
    $article->remplir();
    require('popapEdite.php');
}
if(isset($_POST['saveEdit'])   && isset($_POST['Editcontaine']) && isset($_POST['Edittitle'])&& isset($_POST['Editcategorie']) ){
    $newarticle = new Article();
    $newarticle->setTitre($_POST['Edittitle']);
    $newarticle->setContainer($_POST['Editcontaine']);
    $newarticle->setCategor($_POST['Editcategorie']);
    $article->setId($_POST['id']);
    $article->remplir();
    $auteur->editArticle($article,$newarticle);
}
$stmt =$auteur->listArticle();

?>
 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-[20px] gap-10">
    <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <!-- CARTE 1 -->
            <div class="rounded overflow-hidden shadow-lg flex flex-col">
                <div class="relative">
                    <div>
                        <form method="POST" action="">
                            <input type="text" value="<?php echo $row['id'] ;?>" name="id" class="hidden"/>
                            <button name="edit"
                                class="text-xs absolute top-0 w-[100px] right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Modifier
                            </button>
                        </form>
                        <form method="POST" action="">
                            <input type="text" value="<?php echo $row['id'] ;?>" name="id" class="hidden"/>
                            <button type="submit" name="delete"
                                class="text-xs absolute top-0 w-[100px] right-[30%] bg-red-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Supprimer
                            </button>
                        </form>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                    <div class="max-w-md mx-auto mt-0  contianerbtn">
                        <h1 class="py-2 font-bold text-xl"><?php echo strtoupper($row['titre']); ?></h1>
                        <p class="leading-relaxed"> <?php echo substr($row['contenu'],0,100); ?>
                            <span class="hidden  btn" id="more-text">
                            <?php echo substr($row['contenu'],101,strlen($row['contenu'])-100); ?>                            
                            </span>
                        </p>
                        <button  class="mt-4 text-blue-500 focus:outline-none  toggle-btn "   >Lire la suite</button>
                        <button  class="hidden mt-4 text-blue-500 focus:outline-none  hide-btn" >Masquer</button>
                    </div>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <button  id="views"
                                class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span><span class="ml-1">39 </span>
                            <span class="hidden md:inline-block">Vues</span>
                        </button>
                        <button type="button"  class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center border-2  hover:border-4" id="commit">
                            <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <span class="ml-1">39 Commentaires</span>
                        </button>
                    </div>
                    <div class="flex flex-col hidden py-[10px] px-[10px]" id="listeCommit">
                        <!-- Début 1 -->
                        <div class="flex gap-2">
                            <img class="w-[3.3rem] h-[3.3rem] object-cover rounded-full" src="https://images.unsplash.com/photo-1485218126466-34e6392ec754?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMHx8bGFkeXxlbnwwfDB8fHwxNzMyMDI1NDIxfDA&ixlib=rb-4.0.3&q=80&w=1080" alt="Profil" />
                            <div class="flex flex-col">
                                <div class="flex gap-2 items-center dark:text-white">
                                    <h4 class="text-lg font-semibold">Hewan D.</h4>
                                    <p class="text-sm">a créé un nouveau post</p>
                                </div>
                                <p class="text-sm text-gray-500 dark:text-gray-300">il y a environ 22 heures</p>
                            </div>
                        </div>

                        <!-- Contenu du Post 1 -->
                        <div class="flex flex-col gap-2 border border-gray-200 dark:border-gray-600 rounded-md ml-10">
                            <div class="flex flex-col p-4 hover:cursor-pointer">
                                <h4 class="text-lg font-semibold dark:text-white hover:text-blue-800 dark:hover:text-blue-400">Construire un site web statique avec du contenu Markdown, en utilisant Nuxt et Fusionable (approche API serveur)</h4>
                                <p class="text-sm text-gray-500 hover:text-blue-800 dark:hover:text-blue-400 dark:text-gray-300">#nuxt #vue #markdown #tutoriel</p>
                            </div>
                            <div id="replyrcommit" class="hidden">
                                <textarea class="w-full border-2 h-[40px]"  name="" id=""></textarea>
                                <div class=" mt-6 flex flex-row justify-between">
                                    <button type="submit" class="bg-blue-500 w-[90px] h-[40px]  rounded-[10px] "  onclick="replyCommit()">ajouter</button>
                                    <button type="submit" class="bg-white-500 border-2 rounded-[10px] w-[90px] h-[40px] "  onclick="replyCommit()">annuler</button>
                                </div>
                            </div>
                            <div class="flex justify-between items-center py-1 border-t-2 dark:border-gray-600 dark:text-white" id="replyLike">
                                <div class="flex gap-2 text-lg pl-1">
                                    <button class="flex items-center gap-1 px-4 py-1 rounded cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700" >
                                        <ion-icon class="text-xl" name="heart-outline"></ion-icon><span class="md:block hidden">Aimer</span>
                                    </button>
                                    <button class="flex items-center gap-1 px-4 py-1 rounded cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700" onclick="replyCommit()">
                                        <ion-icon class="text-xl" name="reply-outline"></ion-icon><span class="md:block hidden" >Répondre</span>
                                    </button>
                                    <button class="flex items-center gap-1 px-4 py-1 rounded cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <ion-icon class="text-xl" name="reply-outline"></ion-icon><span class="md:block hidden" >Supprimer</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Fin du Post 1 -->
                    </div>        
                </div>
            </div> 
    <?php }?>           
        </div>

<?php 
require_once("./../generalPages/footer.php")
?>
<script src="./../../../src/assets/js/scriptPageAuteur.js"></script>
</body>
</html>
