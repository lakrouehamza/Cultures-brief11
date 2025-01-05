<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php require_once("header.php");
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
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Doe</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">jane@example.com</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Admin</td>
            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2">
                 <form method="POST">
                <button  name="user"  class="px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-150 ease-in-out">
                    Supprimer
                </button>
                 </form>
            </td>
        </tr>
    </tbody>
</table>

<?php  
require_once("./../generalPages/footer.php");
?>
</body>
</html>