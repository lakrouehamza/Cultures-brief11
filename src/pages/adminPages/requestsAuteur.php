<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    require_once("../../classes/Admin.php");

    require_once('header.php');
    
    $admin = new Admin();
    $admin->setEmail($_SESSION['email']);
    $admin->remplir();
    $stmt = $admin->listArticle();
    
if(isset($_POST['confireme'])){
    $admin->confirmeArticle($_POST['confireme'],'confirme');
    // echo $_POST['confireme'];
}
if(isset($_POST['annule']))
    $admin->confirmeArticle($_POST['annule'],'annule');
    ?>




    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Categorie
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <?php echo $row['nom'] . '  ' . $row['prenom']; ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $row['titreArticle']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <?php echo $row['statut']; ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo $row['titreCategorie']; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo $row['email']; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                        <form method="POST">
                            <div class="flex space-x-2">
                                <button class="text-indigo-600 hover:text-indigo-900"  name="confireme" value="<?php echo $row['articleID']; ?>" type="submit">confirme<button>
                                <button class="ml-2 text-red-600 hover:text-red-900"  name="annule" value="<?php echo $row['articleID']; ?>" type="submit">annule</button>
                            </div>
                        </form>
                    </td>
                </tr>

            <?php
            }
            ?>


            <!-- More rows... -->

        </tbody>
    </table>

    <?php
    require_once("./../generalPages/footer.php");

    ?>
</body>

</html>