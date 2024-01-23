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
    <div class="flex items-center w-full justify-center fixed bg-white" id="header">
      <div class="basis-1/3 flex justify-center font-semibold">
        <button onclick="history.back()"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></button>
        <?php echo $title; ?>
      </div>
      <div class="basis-1/3 flex justify-center">
        <img src="./img/logo.png" class="w-14 h-14" />
      </div>
      <div class="basis-1/3 flex justify-end mr-2">
        <button>
          <img src="./img/menu_FILL0_wght400_GRAD0_opsz24.png" class="md:hidden" />
        </button>
      </div>
    </div>