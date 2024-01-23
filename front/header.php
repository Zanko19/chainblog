   
   <?php

  session_start();

  if (!isset($_SESSION['user_id'])) {
    header('Location: login_form.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
  }
    switch($page) {
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

</head>
<body class="bg-white">
<div class="md:w-[85%] lg:w-[70%] md:m-auto">

<div class="flex items-center w-full justify-center fixed bg-white" id="header">
      <div class="basis-1/3 flex justify-center font-semibold md:pl-6 lg:justify-start lg:ml-4 md:justify-start md:ml-4">
        <button onclick="history.back()"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></button>
        <?php echo $title; ?>
      </div>
      <div class="basis-1/3 flex justify-center lg:justify-start md:justify-start">
        <img src="./img/logo.png" class="w-14 h-14" />
      </div>
      <div class="basis-1/3 flex justify-end mr-2">
        <button>
          <img src="./img/menu_FILL0_wght400_GRAD0_opsz24.png" class="md:hidden" />
        </button>
      </div>
    </div>