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
$stmt =$admin->selectCategorie();
$categorie =  new Categorie();
if(isset($_POST['delete'])){
$categorie->setId($_POST['id']);
$categorie->remplir();
$admin->deleteCategorie($categorie);
}

$hiddenF ="hidden";
$hiddenT = "";
if(isset($_POST['id'])){
   $id =$_POST['id']; 

}else{$id =0; }

if(isset($_POST['edit'])){
    $hiddenF ="";
    $hiddenT = "hidden";
    $id=$_POST['id'];
    echo $id;
}
if(isset($_POST['titre']) && isset($_POST['save'])){
    $categorie =  new Categorie();
    $newcategorie =  new Categorie();
    $newcategorie->setTitre($_POST['titre']);
    $categorie->setId($id);
    $categorie->remplir();
    echo  $categorie->getId();
    // $categorie->setId(3);
    // echo   $categorie->getId();
    // if($categorie->getrAdmin()===$admin->getId())
    $admin->updateCategorie($categorie,$newcategorie);
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
<div class="flex min-h-screen  <?php echo $hiddenF ?> items-center justify-center bg-black/30 p-4 popap">
  <div class="w-full max-w-sm">
    <div class="relative rounded-2xl bg-white p-6 shadow">
      <div class="mb-4 flex items-center justify-between">
      <form action="" method="POST">
        <h2 class="text-xl font-semibold text-gray-900">add category</h2>
            <button class="absolute right-5 top-5 text-gray-400 hover:text-gray-600" type="submit">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            </button>
            </div>
            <p class="mb-4 text-center text-sm"> You can add a new category.
            </p>
            <textarea name="titre" class="mb-3 w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Write title category"></textarea>
            <input  name="save" value="save" class="w-full rounded-lg bg-gray-900 py-2.5 text-sm font-medium text-white transition duration-300 hover:bg-gray-800" type="submit"/>
        </form>
    </div>
  </div>
</div>



<div class="bg-white p-8 overflow-auto mt-16 h-screen <?php echo $hiddenT ?>" >
  <h2 class="text-2xl mb-4"></h2>

  <!-- Classes Table -->
  <div class="relative overflow-auto">
    <div class="overflow-x-auto rounded-lg">
      <table class="min-w-full bg-white border mb-20">
        <thead>
          <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white">
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Titre</span>
            </th>
            <th class="p-4 text-xs md:text-sm">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php  
                while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
          <tr class="border-b text-xs md:text-sm text-center text-gray-800">
            <td class="p-2 md:p-4"><?php echo $row['titre']?></td>
            <td class="relative p-2 md:p-4 flex justify-center space-x-2">
             
              <form method="POST" >
                <input type="text"  class="hidden"  name="id" value="<?php echo $row['id']?>" id="">
                <input  type="submit" name="edit" value="Edit" class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">
            </form>
            <form method="POST" >
                <input type="text" class="hidden"  name="id" value="<?php echo $row['id']?>" id="">
                <input  type="submit" value="Delete" name="delete" class="bg-red-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">
            </form>
            </td>
          </tr>
            <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once("../generalPages/footer.php");?>
<script src="../../assets/js/scripteAdmin.js"></script>
</body>
</html>
