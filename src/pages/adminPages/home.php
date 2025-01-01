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
$admin  = new Admin();
if(isset($_POST['logout'])){
    $admin->logout();
}
?>


<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            <!-- CARD 1 -->
            <div class="rounded overflow-hidden shadow-lg flex flex-col">
                <div class="relative">
                    <div>
                        <button
                            class="text-xs absolute top-0 w-[63px] right-0 bg-red-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            Delete
                        </button>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <div class="max-w-md mx-auto mt-10">
                            <h1 class="py-2 font-bold text-xl">Article Heading</h1>
                            <p class="leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non ipsum vel nunc commodo hendrerit sit amet vel
                                nisi. Donec sodales maximus justo, nec dictum lectus malesuada non. Sed auctor ultrices tellus non varius.
                                <span class="hidden" id="more-text">
                                    Sed eu enim malesuada, fermentum mi eu, finibus velit. Nam quis blandit velit, vel vehicula neque. Etiam eu lorem suscipit, sollicitudin ante at, pharetra quam.
                                </span>
                            </p>
                            <button id="toggle-btn" class="mt-4 text-blue-500 focus:outline-none "   onclick="red_hideMore()">Read More</button>
                            <button id="hide-btn" class="hidden mt-4 text-blue-500 focus:outline-none" onclick="red_hideMore()">Hide</button>
                        </div>
                    </div>                       
                </div>
            </div>


            
        </div>
<?php require_once('./../generalPages/footer.php');?>
</body>
</html>