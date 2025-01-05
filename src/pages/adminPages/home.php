<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
<?php require_once('header.php');
require_once('./../../classes/Admin.php');
require_once('./../../classes/Article.php');
$admin  = new Admin();
if(isset($_POST['logout'])){
    $admin->logout();
}
$stmt = $admin->SeleteArticle();
if(isset($_POST['delete'])){
$article = new Article();
$article->setId($_POST['id']);
$admin->deleteArticle($article);
}
?>





<div class="grid grid-cols-1 mt-10 py-6 sm:grid-cols-2 md:grid-cols-3 gap-10"> 
    <?php 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
    ?>
        <div class="rounded overflow-hidden shadow-lg flex flex-col">
            <div class="relative"> 
                <form method="POST" action="">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
                    <button type="submit" name="delete"
                        class="text-xs absolute  right-0 bg-red-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                        Supprimer
                    </button>
                </form>
 
                <div class="px-6 py-4 mb-auto">
                    <div class="max-w-md mx-auto mt-0 contianerbtn"> 
                        <h1 class="py-2 font-bold text-xl">
                            <?php echo strtoupper($row['titre']); ?>
                        </h1>
                         
                        <p class="leading-relaxed">
                            <?php echo substr($row['contraire'], 0, 100); ?>
                            <span class="hidden btn" id="more-text">
                                <?php echo substr($row['contraire'], 101); ?>
                            </span>
                        </p> 
                        <button class="mt-4 text-blue-500 focus:outline-none toggle-btn">
                            Lire plus
                        </button>
                        <button class="hidden mt-4 text-blue-500 focus:outline-none hide-btn">
                            Cacher
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    } 
    ?>
</div>

<?php require_once('./../generalPages/footer.php'); ?>

<script src="./../../../src/assets/js/scriptPageAuteur.js"></script>
</body>
</html>