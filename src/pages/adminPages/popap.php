<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
require_once("header.php");
require_once("../../classes/Admin.php");
$admin =new Admin();
$admin->setEmail($_SESSION['email']);
$admin->remplir();
if(isset($_POST['titre']) && isset($_POST['save'])){
$catigorie =  new  Categorie();
$catigorie->setTitre($_POST['titre']);
$catigorie->setAdmin($admin->getId());
$admin->crretionCategorie($catigorie);
}
?>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

  body {
    font-family: "Poppins", sans-serif;
    font-weight: 300;
    font-style: normal;
  }
</style>
<div class="flex min-h-screen items-center justify-center bg-black/30 p-4 popap">
  <div class="w-full max-w-sm">
    <div class="relative rounded-2xl bg-white p-6 shadow">
      <div class="mb-4 flex items-center justify-between">
        <h2 class="text-xl font-semibold text-gray-900">Ajouter une catégorie</h2>
        <button class="absolute right-5 top-5 text-gray-400 hover:text-gray-600" onclick="toggelPopap()">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <p class="mb-4 text-center text-sm">Vous pouvez ajouter une nouvelle catégorie.</p>
      <form action="" method="POST">
        <textarea 
          name="titre" 
          class="mb-3 w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
          rows="4" 
          placeholder="Saisissez le titre de la catégorie"></textarea>
        
        <input 
          name="save" 
          value="Enregistrer" 
          class="w-full rounded-lg bg-gray-900 py-2.5 text-sm font-medium text-white transition duration-300 hover:bg-gray-800" 
          type="submit"/>
      </form>
    </div>
  </div>
</div>

<?php require_once("../generalPages/footer.php"); ?>
<script src="../../assets/js/scripteAdmin.js"></script>
</body>
</html>
