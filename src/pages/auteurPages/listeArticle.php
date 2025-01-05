<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste article </title>
</head>
<body>
<?php 
 require_once("header.php"); 
 
 $stmt = $auteur->listTouteArticle();

 if(isset($_POST['delete'])){
  $article->setId($_POST['delete']);
  $article->remplir();
  $auteur->deleteArticle($article);
}
if(isset($_POST['edit'])){
  $article->setId($_POST['edit']);
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
 ?>
<div class="bg-white p-8 overflow-auto mt-16 h-screen">

<!-- Table des classes -->
<div class="relative overflow-auto">
  <div class="overflow-x-auto rounded-lg">
    <table class="min-w-full bg-white border mb-20">
      <thead>
      <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white">
        <th class="p-0">
            <span class="block py-2 px-3 border-r border-gray-300">Nom</span>
        </th>
        <th class="p-0">
            <span class="block py-2 px-3 border-r border-gray-300">Statut</span>
        </th>
        <th class="p-0">
            <span class="block py-2 px-3 border-r border-gray-300">Catégorie</span>
        </th>
        <th class="p-4 text-xs md:text-sm">Actions</th>
      </tr>

      </thead>
      <tbody>
        <?php    
          while($row =  $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr class="border-b text-xs md:text-sm text-center text-gray-800">
          <td class="p-2 md:p-4"><?php echo  $row['titre']  ?></td>
          <td class="p-2 md:p-4"><?php echo  $row['statut']  ?></td>
          <td class="p-2 md:p-4"><?php echo  $row['titreCategorie']  ?></td>
          <td class="relative p-2 md:p-4 flex justify-center space-x-2">
            <form method="POST">
              <button type='submit' value="<?php echo $row['id']; ?>" name='edit' class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Modifier</button>
              <button type='submit' value="<?php echo $row['id']; ?>" name='delete' class="bg-red-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Supprimer</button>
            </form>
          </td>
        </tr>
            <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<script src="./../../../src/assets/js/scriptPageAuteur.js"></script>

</body>
</html>
