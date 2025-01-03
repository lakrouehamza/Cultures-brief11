<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste article </title>
</head>
<body>
<?php  require_once("header.php");  ?>

<div class="bg-white p-8 overflow-auto mt-16 h-screen">
  <h2 class="text-2xl mb-4">Classes List</h2>

  <!-- Classes Table -->
  <div class="relative overflow-auto">
    <div class="overflow-x-auto rounded-lg">
      <table class="min-w-full bg-white border mb-20">
        <thead>
          <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white">
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">ID</span>
            </th>
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Class Name</span>
            </th>
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Level</span>
            </th>
            <th class="p-4 text-xs md:text-sm">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b text-xs md:text-sm text-center text-gray-800">
            <td class="p-2 md:p-4">01</td>
            <td class="p-2 md:p-4">Class 1</td>
            <td class="p-2 md:p-4">Beginner</td>
            <td class="relative p-2 md:p-4 flex justify-center space-x-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Delete</button>
            </td>
          </tr>
          <tr class="border-b text-xs md:text-sm text-center text-gray-800">
            <td class="p-2 md:p-4">02</td>
            <td class="p-2 md:p-4">Class 2</td>
            <td class="p-2 md:p-4">Intermediate</td>
            <td class="relative p-2 md:p-4 flex justify-center space-x-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Delete</button>
            </td>
          </tr>
          <tr class="border-b text-xs md:text-sm text-center text-gray-800">
            <td class="p-2 md:p-4">03</td>
            <td class="p-2 md:p-4">Class 3</td>
            <td class="p-2 md:p-4">Advanced</td>
            <td class="relative p-2 md:p-4 flex justify-center space-x-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>