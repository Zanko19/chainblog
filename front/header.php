   <?php

    session_start();

    if (!isset($_SESSION['user_id'])) {
      header('Location: login_form.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
      exit();
    }
    switch ($page) {
      case 'welcome':
        $title = 'Home';
        break;
      case 'messages':
        $title = 'Messages';
        break;
      case 'message-details':
        $title = 'Message';
        break;
      case 'notifs':
        $title = 'Notifications';
        break;
      case 'post':
        $title = 'Post';
        break;
      case 'profile':
        $title = 'Profile';
        break;
      case 'other':
        $title = 'Profile';
        break;
      case 'profileModify':
        $title = 'Modify profile';
        break;
      case 'singlePost':
        $title = 'Post';
        break;
      default:
        $title = 'Home';
        break;
    }


    ?>

   <html lang="en">

   <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Chainblog | <?php echo $title; ?></title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="icon" type="image/png" href="./img/logo.png">

   </head>

   <body class="bg-white overflow-auto">
     <div class="md:w-[85%] lg:w-[70%] md:pl-[7%] lg:pl-0 lg:m-auto">

       <div class="flex items-center w-full justify-center fixed bg-white" id="header">
         <div class="basis-1/3 flex justify-center font-semibold md:pl-6 lg:justify-start lg:ml-4 md:justify-start md:ml-4">
           <button onclick="history.back()"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
               <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
             </svg></button>
           <?php echo $title; ?>
         </div>
         <div class="basis-1/3 flex justify-center lg:justify-start md:justify-start">
           <img src="./img/logo.png" class="w-14 h-14" />
         </div>
         <div class="basis-1/3 flex justify-end mr-2">
           <button id="menuButton">
             <span class="md:hidden">
               <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                 <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
               </svg>
             </span>
           </button>
           <div id="dropdownMenu" class="hidden flex flex-col bg-white shadow-md rounded mt-2 absolute top-8">
             <a href="index.php?page=profile" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
             <a href="index.php?page=profileModify" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
             <a href="../back/logout.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
           </div>
         </div>

       </div>
       <script>
         document.addEventListener('DOMContentLoaded', function() {
           const menuButton = document.getElementById('menuButton');
           const dropdownMenu = document.getElementById('dropdownMenu');

           menuButton.addEventListener('click', function() {
             dropdownMenu.classList.toggle('hidden');
           });
         });
       </script>