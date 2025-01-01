<?php 
require_once("../../assets/functions/authentification.php");
authentification();
require_once("../../classes/Utilisateur.php");
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['verifyPassword']) && isset($_POST['role'])){
   $user = new Utilisateur();
   $user->setNom(htmlspecialchars($_POST['nom'],ENT_COMPAT)); 
   $user->setPrenom(htmlspecialchars($_POST['prenom'],ENT_COMPAT)); 
   $user->setRole(htmlspecialchars($_POST['role'],ENT_COMPAT)); 
   $user->setEmail(htmlspecialchars($_POST['email'],ENT_COMPAT)); 
   $user->setPassword(htmlspecialchars($_POST['password'],ENT_COMPAT)); 
   if($user->getPassword() == htmlspecialchars($_POST['verifyPassword'],ENT_COMPAT)){
    $user->signUp();
   
   }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body
    class="flex font-poppins items-center justify-center dark:bg-gray-900 min-w-screen min-h-screen"
  >
    <div class="grid gap-8">
      <div
        id="back-div"
        class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-[26px] m-4 "
      >
        <div
          class="border-[20px] border-transparent rounded-[20px] dark:bg-gray-900 bg-white shadow-lg xl:p-10 2xl:p-10 lg:p-10 md:p-10 sm:p-2 m-2"
        >
          <h1 class="pt-8 pb-6 font-bold text-5xl dark:text-gray-400 text-center cursor-default">
            SIGN UP
          </h1>
          <form action="" method="POST" class="space-y-4">
            <div>
              <label for="nom" class="mb-2 dark:text-gray-400 text-lg">nom</label>
              <input
                id="nom"
                name="nom"
                class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300"
                type="nom"
                placeholder="nom"
                required
              />
            </div>
            <div>
              <label for="prenom" class="mb-2 dark:text-gray-400 text-lg">prenom</label>
              <input
                id="prenom"
                name="prenom"
                class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 mb-2 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300"
                type="prenom"
                placeholder="prenom"
                required
              />
            </div>
            <div>
              <label for="email" class="mb-2 dark:text-gray-400 text-lg">email</label>
              <input
                id="email"
                name="email"
                class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 mb-2 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300"
                type="email"
                placeholder="email"
                required
              />
            </div>
            <div>
              <label for="password" class="mb-2 dark:text-gray-400 text-lg">Password</label>
              <input
                id="password"
                name="password"
                class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 mb-2 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300"
                type="password"
                placeholder="Password"
                required
              />
            </div>
            <div>
              <label for="verifyPassword" class="mb-2 dark:text-gray-400 text-lg">verify Password</label>
              <input
                id="verifyPassword"
                name="verifyPassword"
                class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 mb-2 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300"
                type="password"
                placeholder="verifyPassword"
                required
              />
            </div>
            <div>
              <label for="role" class="mb-2 dark:text-gray-400 text-lg">role</label>
              <select
                id="role"
                name="role"
                class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 mb-2 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300"
                type="role"
                placeholder="role"
                required >
                <option value="">Sélectionnez un rôle</option>
                <option value="auteur">Auteur</option>
                <option value="membre">Member</option>
              </select>
            </div>
            <input
            name="signup"
              class="bg-gradient-to-r from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out"
              type="submit"
              value="Sign Up"
            />
            
          </form>
          <div class="flex flex-col mt-4 items-center justify-center text-sm">
            <h3>
              <span class="cursor-default dark:text-gray-300">Have an account?</span>
              <a
                class="group text-blue-400 transition-all duration-100 ease-in-out"
                href=""
              >
                <a href="login.php"
                  class="bg-left-bottom ml-1 bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out"
                >
                  login
                </a>
              </a>
            </h3>
          </div>

          <!-- Third Party Authentication Options -->
          <div
          id="third-party-auth"
          class="flex items-center justify-center mt-5 flex-wrap"
        >
          <button
            href="#"
            class="hover:scale-105 ease-in-out duration-300 shadow-lg p-2 rounded-lg m-1"
          >
            <img
              class="max-w-[25px]"
              src="https://ucarecdn.com/8f25a2ba-bdcf-4ff1-b596-088f330416ef/"
              alt="Google"
            />
          </button>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
