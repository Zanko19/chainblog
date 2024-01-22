    <?php
    switch($page) {
      case 'welcome':
        $title = 'Home';
        break;
      case 'messages':
        $title = 'Messages';
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
      default:
        $title = 'Home';
        break;
    } 

    session_start();

    if (!isset($_SESSION['user_id'])) {
      header('Location: login_form.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
      exit();
    }
    ?>
    <div class="flex items-center w-full" id="header">
      <div class="basis-1/3 flex justify-center font-semibold">
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