<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<?php 
require_once("../../classes/Member.php");
$member = new  Member();
require_once('header.php');
if(isset($_POST['logout'])){
    $member->logout();
}
?>
<body>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
            class="relative isolate overflow-hidden bg-white px-6 py-20 text-center sm:px-16 sm:shadow-sm">
            <p class="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Didn't find component you were looking for?
            </p>


            <form action="/search">
                <label
                    class="mx-auto mt-8 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
                    for="search-bar">

                    <input id="search-bar" placeholder="your keyword here" name="q"
                        class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white" required="">
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all">
                        <div class="flex items-center transition-all opacity-1">
                            <span class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                                Search
                            </span>
                        </div>
                    </button>
                </label>
            </form>

            <svg viewBox="0 0 1024 1024"
                class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]"
                aria-hidden="true">
                <circle cx="512" cy="512" r="512" fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)" fill-opacity="0.7">
                </circle>
                <defs>
                    <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217">
                        <stop stop-color="#3b82f6"></stop>
                        <stop offset="1" stop-color="#1d4ed8"></stop>
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div> 

    <div class="container mx-auto px-4">
        <nav class="flex flex-row flex-nowrap justify-between md:justify-center items-center" aria-label="Pagination">
        <!-- Previous Page Button -->
            <a class="flex w-10 h-10 mr-1 justify-center items-center rounded-full border border-gray-200 bg-white dark:bg-gray-800 text-black dark:text-white hover:border-gray-300 dark:hover:border-gray-600"
                href="#" title="Previous Page">
                <span class="sr-only">Previous Page</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="block w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
        <!-- Page Buttons (1 to 5) -->
            <a class="hidden md:flex w-10 h-10 mx-1 justify-center items-center rounded-full border border-gray-200 bg-white dark:bg-gray-700 text-black dark:text-white hover:border-gray-300 dark:hover:border-gray-600"
                href="#" title="Page 1">
                1
            </a>
            <a class="hidden md:flex w-10 h-10 mx-1 justify-center items-center rounded-full border border-gray-200 bg-white dark:bg-gray-700 text-black dark:text-white hover:border-gray-300 dark:hover:border-gray-600"
                href="#" title="Page 2">
                2
            </a>
            <a class="hidden md:flex w-10 h-10 mx-1 justify-center items-center rounded-full border border-black dark:border-white dark:bg-black dark:text-white pointer-events-none"
                href="#" aria-current="page" title="Page 3">
                3
            </a>
            <a class="hidden md:flex w-10 h-10 mx-1 justify-center items-center rounded-full border border-gray-200 bg-white dark:bg-gray-700 text-black dark:text-white hover:border-gray-300 dark:hover:border-gray-600"
                href="#" title="Page 4">
                4
            </a>
            <a class="hidden md:flex w-10 h-10 mx-1 justify-center items-center rounded-full border border-gray-200 bg-white dark:bg-gray-700 text-black dark:text-white hover:border-gray-300 dark:hover:border-gray-600"
                href="#" title="Page 5">
                5
            </a>
            <!-- Next Page Button -->
            <a class="flex w-10 h-10 ml-1 justify-center items-center rounded-full border border-gray-200 bg-white dark:bg-gray-800 text-black dark:text-white hover:border-gray-300 dark:hover:border-gray-600"
                href="#" title="Next Page">
                <span class="sr-only">Next Page</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="block w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </nav>
    </div>   

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-[30px] gap-10">
        <!-- CARD 1 -->
        <div class="rounded overflow-hidden shadow-lg flex flex-col  containerCard">
            <div class="relative">
                <div>
            
                    <button class="likes absolute top-3 right-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>
                </div>
                <div class="px-6 py-4 mb-auto">
                    <div class="max-w-md mx-auto mt-0  contianerbtn">
                        <h1 class="py-2 font-bold text-xl">Article Heading</h1>
                        <p class="leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non ipsum vel nunc commodo hendrerit sit amet vel
                            nisi. Donec sodales maximus justo, nec dictum lectus malesuada non. Sed auctor ultrices tellus non varius.
                            <span class="hidden  btn" id="more-text">
                                Sed eu enim malesuada, fermentum mi eu, finibus velit. Nam quis blandit velit, vel vehicula neque. Etiam eu lorem suscipit, sollicitudin ante at, pharetra quam.
                            </span>
                        </p>
                        <button  class="mt-4 text-blue-500 focus:outline-none  toggle-btn "   >Read More</button>
                        <button  class="hidden mt-4 text-blue-500 focus:outline-none  hide-btn" >Hide</button>
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
                    <button    type="button"  class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center border-2  hover:border-4 commit"    >
                        <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                        <span class="ml-1">39 Comments</span>
                    </button>
                </div>
                            <!--   comintire -->
                <div class="flex flex-col hidden py-[10px] px-[10px] listeCommit">
                    <button class="w-full bg-blue-500 h-[50px] " id="addcommit" onclick="addCommit()">  add commit</button>
                    <div id="writercommit" class="hidden">
                        <textarea class="w-full border-2 h-[40px]"  name="" id=""></textarea>
                        <div class=" mt-6 flex flex-row justify-between">
                            <button type="submit" class="bg-blue-500 w-[90px] h-[40px]  rounded-[10px] "  onclick="addCommit()">add</button>
                            <button type="submit" class="bg-white-500 border-2 rounded-[10px] w-[90px] h-[40px] "  onclick="addCommit()">anull</button>
                        </div>
                    </div>
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
                            </div>
                        </div>
                    </div>
                    <!-- End Post 1 -->


                </div>        
            </div>
        </div>
        <!-- end card 1 -->
        <!-- CARD 2 -->
        <div class="rounded overflow-hidden shadow-lg flex flex-col">
            <div class="relative">
                <div>
            
                    <button class="likes absolute top-3 right-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>
                </div>
                <div class="px-6 py-4 mb-auto">
                    <div class="max-w-md mx-auto mt-0 contianerbtn">
                        <h1 class="py-2 font-bold text-xl">Article Heading</h1>
                        <p class="leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non ipsum vel nunc commodo hendrerit sit amet vel
                            nisi. Donec sodales maximus justo, nec dictum lectus malesuada non. Sed auctor ultrices tellus non varius.
                            <span class="hidden  btn" id="more-text">
                                Sed eu enim malesuada, fermentum mi eu, finibus velit. Nam quis blandit velit, vel vehicula neque. Etiam eu lorem suscipit, sollicitudin ante at, pharetra quam.
                            </span>
                        </p>
                        <button  class="mt-4 text-blue-500 focus:outline-none toggle-btn "  >Read More</button>
                        <button  class="hidden mt-4 text-blue-500 focus:outline-none hide-btn"  >Hide</button>
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
                    <button    type="button"  class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center border-2  hover:border-4 commit"  onclick="listeCommit('listeCommit2')">
                        <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                        <span class="ml-1">39 Comments</span>
                    </button>
                </div>
                            <!--   comintire -->
                <div class="flex flex-col hidden py-[10px] px-[10px]" id="listeCommit2">
                    <button class="w-full bg-blue-500 h-[50px] " id="addcommit" onclick="addCommit()">  add commit</button>
                    <div id="writercommit" class="hidden">
                        <textarea class="w-full border-2 h-[40px]"  name="" id=""></textarea>
                        <div class=" mt-6 flex flex-row justify-between">
                            <button type="submit" class="bg-blue-500 w-[90px] h-[40px]  rounded-[10px] "  onclick="addCommit()">add</button>
                            <button type="submit" class="bg-white-500 border-2 rounded-[10px] w-[90px] h-[40px] "  onclick="addCommit()">anull</button>
                        </div>
                    </div>
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
                            </div>
                        </div>
                    </div>
                    <!-- End Post 1 -->


                </div>        
            </div>
        </div>
        <!-- end card 2 -->

        
    </div>


</body>
<?php
require_once("../generalPages/footer.php");
?>
</html>