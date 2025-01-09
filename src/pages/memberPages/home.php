<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<?php 
require_once("../../classes/Member.php");
require_once("../../classes/Article.php");
require_once("../../classes/commit.php");
require_once('header.php');
$membre = new  Member();
$membre->setEmail($_SESSION['email']);
$membre->remplir();  
$article = new Article();
$articleLike = new Article();
 
if(isset($_POST['logout'])){
    $membre->logout();
}

$stmtC = $membre->selectCategorie();
if(isset($_POST['typeCategorie'])){
    $id = $_POST['id'];
    $stmtA = $membre->listArticle($id);
}else{
    $stmtA = $membre->listArticle(0);
}
if(isset($_POST['likes'])){
    $article->setId($_POST['likes']);
    $article->remplir();
    $membre->lesLike($article )  ;
}
if(isset($_POST['LireSuite'])){
    $article->setId($_POST['LireSuite']);
    $article->remplir();
    $membre->wiews($article)  ;
}
if(isset($_POST['ajouteCommite'])  &&  isset($_POST['containerCommit'])  && !empty(trim($_POST['containerCommit']))){
    $article =  new Article();
    $commit = new Commit();
    $id = $_POST['ajouteCommite'];
    $article->setId($id);
    $commit->setContraire($_POST['containerCommit']);
    $commit->setReply(0);
    $membre->commit($article,$commit);
    // $article->setId();
}
if(isset($_POST['input_search']) && isset($_POST['search'])){
    $value = $_POST['input_search'];
    $stmtA = $membre->search($value);
  
}
?>
<body>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative isolate overflow-hidden bg-white px-6 py-20 text-center sm:px-16 sm:shadow-sm">
            <p class="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Vous n'avez pas trouvé le composant que vous cherchiez ?
            </p>

            <form action="" method="POST">
                <label class="mx-auto mt-8 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300" for="search-bar">
                    <input id="search-bar" placeholder="votre mot-clé ici" name="input_search" class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white" required="">
                    <button type="submit" name="search" class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all">
                        <div class="flex items-center transition-all opacity-1">
                            <span class="text-sm font-semibold whitespace-nowrap truncate mx-auto">Rechercher</span>
                        </div>
                    </button>
                </label>
            </form>

            <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]" aria-hidden="true">
                <circle cx="512" cy="512" r="512" fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)" fill-opacity="0.7"></circle>
                <defs>
                    <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217">
                        <stop stop-color="#3b82f6"></stop>
                        <stop offset="1" stop-color="#1d4ed8"></stop>
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div> 

    <div class="container mx-auto px-4">
        <nav class="flex flex-row flex-nowrap justify-between md:justify-center items-center" aria-label="Pagination">
            
            <?php  
                while($rowc =  $stmtC->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form method="POST" action="">
                <input class="hidden" value="<?php echo $rowc['id']; ?>" name="id" />
                <input type="submit" class="hidden md:flex h-10 mx-1 justify-center items-center rounded-full border border-gray-200 bg-white dark:bg-gray-700 text-black dark:text-white hover:border-gray-300 dark:hover:border-gray-600" name="typeCategorie" value="<?php echo $rowc['titre']; ?>" />
            </form>
            <?php  
            }
            ?> 
            
        </nav>
    </div>   

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-[30px] gap-10">
    <?php 
    while ($row = $stmtA->fetch(PDO::FETCH_ASSOC)) {
        $articleLike->setId($row['id']);
    ?> 
        <div class="rounded overflow-hidden shadow-lg flex flex-col containerCard">

            <div class="relative">
                <a href="#">
                    <img class="w-full"
                         src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                         alt="Sunset in the mountains">
                </a>
                <div>
                    <form action="" method="post">
                        <button type="submit" name="likes" value="<?php echo $row['id']; ?>" 
                                class="likes <?php echo $membre->SelectLikes($articleLike) ? 'bg-red-500' : ''; ?> absolute top-3 right-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="px-6 py-4 mb-auto">
                    <div class="max-w-md mx-auto mt-0 contianerbtn">
                        <h1 class="py-2 font-bold text-xl"><?php echo strtoupper($row['titre']); ?></h1>
                        <p class="leading-relaxed">
                            <?php echo substr($row['contraire'], 0, 100); ?>
                            <span class="hidden btn" id="more-text">
                                <?php echo substr($row['contraire'], 100); ?>
                            </span>
                        </p>
                        <form action="" method="post">
                            <button name="LireSuite" value="<?php echo $row['id']; ?>" 
                                    class="mt-4 text-blue-500 focus:outline-none toggle-btn">Lire la suite</button>
                        </form>
                        <button class="hidden mt-4 text-blue-500 focus:outline-none hide-btn">Masquer</button>
                    </div>
                </div>

                <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                    <button id="views" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-1"><?php echo $row['nombre']; ?></span>
                        <span class="hidden md:inline-block">Vues</span>
                    </button>
                    <button type="button" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center border-2 hover:border-4 commit">
                        <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        <span class="ml-1">39 Commentaires</span>
                    </button>
                </div>

                <div class="flex flex-col py-[10px] px-[10px] listeCommit">
                    <button class="w-full bg-blue-500 h-[50px]" id="addcommit" onclick="addCommit()">Ajouter un commentaire</button>
                    <form action="" method="post">
                        <div id="writercommit">
                            <?php
                            $commit =  new Commit();
                            if($stmtcommit = $commit->selectCommit($row['id']))
                            while ($romcommit = $stmtcommit->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="flex items-center">
                                <div class="relative">
                                    <img class="h-16 w-16 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/87.jpg" alt="Avatar">
                                    <div class="absolute inset-0 rounded-full shadow-inner"></div>
                                </div>
                                <div class="ml-4">
                                    <h2 class="font-bold text-gray-800 text-lg">
                                        <?php echo htmlspecialchars($romcommit['nom'] . ' ' . $romcommit['prenom'], ENT_QUOTES, 'UTF-8'); ?>
                                    </h2>
                                    <p class="text-gray-600">
                                        <?php echo htmlspecialchars($romcommit['dataCommit'], ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                    <p class="text-gray-600">
                                        <?php echo htmlspecialchars($romcommit['contraire'], ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                </div>

                            </div>
                            <?php } ?>
                            <textarea class="w-full border-2 h-[40px]" name="containerCommit"></textarea>
                            <div class="mt-6 flex flex-row justify-between">
                                <button type="submit" name="ajouteCommite" value="<?php echo $row['id']; ?>" class="bg-blue-500 w-[90px] h-[40px] rounded-[10px]">Ajouter</button>
                                <button type="submit" name="annullAjoute" class="bg-white border-2 rounded-[10px] w-[90px] h-[40px]">Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    <?php } ?>
</div>

    <!-- <script src="../../../src/assets/js/scripte.js"></script> -->
</body>
<?php
require_once("../generalPages/footer.php");
?>
</html>
