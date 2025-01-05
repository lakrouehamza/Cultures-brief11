<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php require_once("header.php");
require_once('./../../classes/Admin.php');
$admin  = new Admin();
$stmt =  $admin->listUtilisateur();
if (isset($_POST['deleteUser'])){
    $admin->deleteUser($_POST['deleteUser']);
}
?>
<table class="min-w-full border-collapse border border-gray-300 rounded-lg shadow-md overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-300">Nom</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-300">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-300">Rôle</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-300">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <?php   

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php   echo $row['nom'] .' '.$row['prenom']  ;?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php   echo $row['email'] ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php   echo $row['role'] ?></td>
            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2">
                 <form method="POST">
                <button  name="deleteUser"  value="<?php echo $row['id'] ; ?>" class="px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-150 ease-in-out">
                    Supprimer
                </button>
                 </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php  
require_once("./../generalPages/footer.php");
?>
</body>
</html>