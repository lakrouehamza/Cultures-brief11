<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home </title>
</head>
<body>
<?php 
require_once("./../../classes/Auteur.php");
$auteur = new  Auteur();
require_once('header.php');
if(isset($_POST['logout'])){
    $auteur->logout();
}
?>
   

   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-[20px] gap-10">
            <!-- CARD 1 -->
            <div class="rounded overflow-hidden shadow-lg flex flex-col">
                <div class="relative">
                    <div>
                        <button
                            class="text-xs absolute top-0 w-[63px] right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            Edit
                        </button>
                        <button
                            class="text-xs absolute top-10 w-[63px] right-0 bg-red-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
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
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <button  id="views"
                                class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span><span class="ml-1">39 </span>
                            <span class="hidden md:inline-block">View</span>
                        </button>
                        <button type="button"  class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center border-2  hover:border-4" id="commit">
                            <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <span class="ml-1">39 Comments</span>
                        </button>
                    </div>
                     <!--    -->
                    <div class="flex flex-col hidden py-[10px] px-[10px]" id="listeCommit">
                            <!-- Start 1 -->
                        <div class="flex gap-2">
                            <img class="w-[3.3rem] h-[3.3rem] object-cover rounded-full" src="https://images.unsplash.com/photo-1485218126466-34e6392ec754?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMHx8bGFkeXxlbnwwfDB8fHwxNzMyMDI1NDIxfDA&ixlib=rb-4.0.3&q=80&w=1080" alt="Profile" />
                            <div class="flex flex-col">
                                <div class="flex gap-2 items-center dark:text-white">
                                    <h4 class="text-lg font-semibold">Hewan D.</h4>
                                    <p class="text-sm">made a new post</p>
                                </div>
                                <p class="text-sm text-gray-500 dark:text-gray-300">about 22 hours ago</p>
                            </div>
                        </div>

                        <!-- Post Content 1 -->
                        <div class="flex flex-col gap-2 border border-gray-200 dark:border-gray-600 rounded-md ml-10">
                            <div class="flex flex-col p-4 hover:cursor-pointer">
                                <h4 class="text-lg font-semibold dark:text-white hover:text-blue-800 dark:hover:text-blue-400">Build a static website with Markdown content, using Nuxt and Fusionable (server API approach)</h4>
                                <p class="text-sm text-gray-500 hover:text-blue-800 dark:hover:text-blue-400 dark:text-gray-300">#nuxt #vue #markdown #tutorial</p>
                            </div>
                            <div id="replyrcommit" class="hidden">
                            <textarea class="w-full border-2 h-[40px]"  name="" id=""></textarea>
                            <div class=" mt-6 flex flex-row justify-between">
                                <button type="submit" class="bg-blue-500 w-[90px] h-[40px]  rounded-[10px] "  onclick="replyCommit()">add</button>
                                <button type="submit" class="bg-white-500 border-2 rounded-[10px] w-[90px] h-[40px] "  onclick="replyCommit()">anull</button>
                            </div>
                        </div>
                            <div class="flex justify-between items-center py-1 border-t-2 dark:border-gray-600 dark:text-white" id="replyLike">
                                <div class="flex gap-2 text-lg pl-1">
                                    <button class="flex items-center gap-1 px-4 py-1 rounded cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700" >
                                        <ion-icon class="text-xl" name="heart-outline"></ion-icon><span class="md:block hidden">Like</span>
                                    </button>
                                    <button class="flex items-center gap-1 px-4 py-1 rounded cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700" onclick="replyCommit()">
                                        <ion-icon class="text-xl" name="reply-outline"></ion-icon><span class="md:block hidden" >Reply</span>
                                    </button>
                                    <button class="flex items-center gap-1 px-4 py-1 rounded cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <ion-icon class="text-xl" name="reply-outline"></ion-icon><span class="md:block hidden" >Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Post 1 -->


                    </div>        
                </div>
            </div>            
        </div>

<?php 
require_once("./../generalPages/footer.php")
?>
</body>
</html>