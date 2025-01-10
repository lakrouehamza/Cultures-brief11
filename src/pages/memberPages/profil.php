<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Abdeslami achraf  Portfolio</title>
  <!-- Tailwind CSS CDN with Dark Mode Configuration -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Configure Tailwind to use class-based dark mode
    tailwind.config = {
      darkMode: 'class', // Enable class-based dark mode
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
        },
      },
    }
  </script>
  <!-- Optional: Include Font Awesome for Icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class=" bg-white text-white font-poppins transition-colors duration-300">
  <div class="min-h-screen flex flex-col">
    <!-- Header Section -->
    <header class="bg-white dark:bg-gray-800 shadow-md">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-indigo-500 text-2xl font-semibold">Achraf abdeslami</div>
        
        <!-- Navigation -->
        <nav>
          <div class="hidden md:flex space-x-6  ">
            <a href="#home" class="text-indigo-500 hover:text-white transition text-black dark:text-indigo-500">Home</a>
            <a href="#about" class="hover:text-indigo-500 transition text-black dark:text-indigo-500">About Me</a>
            <a href="#services" class="hover:text-indigo-500 transition text-black dark:text-indigo-500">Services</a>
            <a href="#projects" class="hover:text-indigo-500 transition text-black dark:text-indigo-500">Projects</a>
            <a href="#contact" class="hover:text-indigo-500 transition text-black dark:text-indigo-500">Contact</a>
          </div>
          
          <!-- Mobile Menu Toggle -->
         
        </nav>

        <!-- Dark Mode Toggle -->
        <div class="ml-4">
          <button id="theme-toggle" class="text-indigo-500 focus:outline-none">
            <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 3a1 1 0 011 1v1a1 1 0 11-2 0V4a1 1 0 011-1zm4.22 1.22a1 1 0 011.415 1.415l-.707.707a1 1 0 11-1.414-1.414l.707-.708zM17 10a1 1 0 100 2h1a1 1 0 100-2h-1zm-1.22 4.78a1 1 0 011.415-1.415l.707.708a1 1 0 11-1.414 1.414l-.708-.707zM10 17a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.78-1.22a1 1 0 00-1.415 1.415l.707.708a1 1 0 001.414-1.414l-.707-.709zM3 10a1 1 0 100 2H2a1 1 0 100-2h1zm1.22-4.78a1 1 0 00-1.415-1.415l-.708.707a1 1 0 001.414 1.414l.709-.708zM10 7a3 3 0 100 6 3 3 0 000-6z"/>
            </svg>
          </button>
        </div>
         <div class="md:hidden">
            <button id="menu-button" class="text-indigo-500 focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
            </button>
          </div>
      </div>
      
      <!-- Mobile Navigation Menu -->
      <div id="mobile-menu" class="hidden md:hidden bg-gray-300 items-center mx-auto p-10 justify-center dark:bg-gray-900">
        <a href="#home" class="block px-4 py-2 text-indigo-500 hover:bg-gray-700 dark:hover:bg-gray-800">Home</a>
        <a href="#about" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-800">About Me</a>
        <a href="#services" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-800">Services</a>
        <a href="#projects" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-800">Projects</a>
        <a href="#contact" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-800">Contact</a>
      </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="flex-1 flex flex-col-reverse md:flex-row items-center justify-between px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <div class="md:w-1/2">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-semibold dark:text-white text-black mb-4">Hello, I’m Achraf abdeslami </h1>
        <p class="text-lg sm:text-xl md:text-2xl font-medium dark:text-gray-300 text-gray-600">
          Freelance UI Designer, Fullstack Developer, & Data Miner. I create seamless web experiences for end-users.
        </p>
      </div>
      <div class="md:w-1/2 flex justify-center mb-6 md:mb-0">
        <img src="https://c0.wallpaperflare.com/preview/692/415/725/business-portrait-glasses-style.jpg" alt="Profile Picture" class="w-64 h-64 sm:w-80 sm:h-80 rounded-full bg-indigo-500 object-cover">
      </div>
    </section>

    <!-- About Me Section -->
    <section id="about" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold mb-6 ">About Me</h2>
      <p class="text-lg sm:text-xl font-medium  dark:text-white text-black ">
        Hi, my name is Achraf abdeslami, a Fullstack Web Developer, UI Designer, and Mobile Developer. I have honed my skills in Web Development and advanced UI design principles, enabling me to create intuitive and visually appealing applications.
      </p>
    </section>

    <!-- Services Section -->
    <section id="services" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold mb-6">The Services I Offer</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Service 1 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-paint-brush text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">UI & UX Designing</h3>
          <p class="text-black dark:text-white text-base">I design beautiful web interfaces with Figma and Adobe XD.</p>
        </div>
        <!-- Service 2 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-code text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">Web Development</h3>
          <p class="text-black dark:text-white text-base">I create stunning interfaces using HTML, CSS, JavaScript, and frameworks like Angular and ReactJS.</p>
        </div>
        <!-- Service 3 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-mobile-alt text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">Mobile Development</h3>
          <p class="text-black dark:text-white text-base">Expert in Flutter and React Native to build cross-platform mobile applications.</p>
        </div>
        <!-- Service 4 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-database text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">Web Scraping with Python</h3>
          <p class="text-black dark:text-white text-base">I can collect and manipulate content from the web using Python.</p>
        </div>
      </div>
    </section>

    <!-- Featured Projects Section -->
    <section id="projects" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold mb-6">Featured Projects</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Project 1 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col">
          <img src="https://via.placeholder.com/311x173" alt="Twinder" class="rounded-lg mb-4 object-cover h-48">
          <h3 class="text-indigo-500 text-2xl font-semibold mb-2">Twinder</h3>
          <p class="text-black dark:text-white text-lg flex-grow">A live Geolocation app for finding tweets and Twitter users around you.</p>
          <a href="#" class="text-indigo-500 mt-4 font-semibold hover:underline">View Live</a>
        </div>
        <!-- Project 2 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col">
          <img src="https://via.placeholder.com/311x173" alt="LIVENTS" class="rounded-lg mb-4 object-cover h-48">
          <h3 class="text-indigo-500 text-2xl font-semibold mb-2">LIVENTS</h3>
          <p class="text-black dark:text-white text-lg flex-grow">A video streaming app with live Geolocation for streaming events.</p>
          <a href="#" class="text-indigo-500 mt-4 font-semibold hover:underline">View Live</a>
        </div>
        <!-- Project 3 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col">
          <img src="https://via.placeholder.com/311x173" alt="Moove" class="rounded-lg mb-4 object-cover h-48">
          <h3 class="text-indigo-500 text-2xl font-semibold mb-2">Moove</h3>
          <p class="text-black dark:text-white text-lg flex-grow">Mobile app for booking instant pickup & drop-off across major cities.</p>
          <a href="#" class="text-indigo-500 mt-4 font-semibold hover:underline">View Live</a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold text-center mb-6">Connect with Me</h2>
      <p class=" dark:text-white text-black  text-lg text-center mb-8">Contact me, let's make magic together</p>
      <form class="max-w-2xl mx-auto space-y-6">
        <input type="text" placeholder="Name" required class="w-full p-4 rounded-lg dark:bg-gray-700  bg-gray-300 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        <input type="email" placeholder="Email" required class="w-full p-4 rounded-lg dark:bg-gray-700  bg-gray-300 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        <textarea placeholder="Message" required class="w-full p-4 rounded-lg dark:bg-gray-700  bg-gray-300 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="5"></textarea>
        <button type="submit" class="w-full bg-blue-400 dark:bg-indigo-500 text-white py-3 rounded-lg font-semibold hover:bg-indigo-600 transition">Send</button>
      </form>
    </section>

    <!-- Footer -->
    <footer class="px-6 sm:px-10 md:px-16 py-6 bg-white dark:bg-gray-800 text-center">
      <p class=" dark:text-white text-black ">
        © 2022 Achraf abdeslami | Fullstack Developer | UI Designer | Data Analyst | Designed by @achrafabdeslami
      </p>
    </footer>
  </div>

  <!-- JavaScript for Mobile Menu and Theme Toggle -->
  <script>
    // Mobile Menu Toggle
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Theme Toggle
    const themeToggle = document.getElementById('theme-toggle');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    // Initial Setup
    if (localStorage.getItem('color-theme') === 'dark' || 
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
      darkIcon.classList.add('hidden');
      lightIcon.classList.remove('hidden');
    } else {
      document.documentElement.classList.remove('dark');
      darkIcon.classList.remove('hidden');
      lightIcon.classList.add('hidden');
    }

    themeToggle.addEventListener('click', () => {
      darkIcon.classList.toggle('hidden');
      lightIcon.classList.toggle('hidden');

      // If the page has the class dark, remove it, otherwise add it
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
      }
    });

    // Close mobile menu when clicking outside
    window.addEventListener('click', (e) => {
      if (!menuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
        mobileMenu.classList.add('hidden');
      }
    });
  </script>
</body>
</html>