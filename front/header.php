    <?php 
    if ($page == 'messages') {
        $title = 'Messages';
    } elseif ($page == 'welcome') {
        $title = 'Home';
    } elseif ($page == 'notifs') { 
        $title = 'Notifications';
    } else {
        $title = 'Home';
    };
    ?>

    <div class="flex items-center w-full" id="header">
      <div class="basis-1/3 flex justify-center font-semibold">
        <?php echo $title; ?>
      </div>
      <div class="basis-1/3 flex justify-center">
        <img src="./img/logo.png" class="w-14 h-14" />
      </div>
      <div class="md:hidden basis-1/3 flex justify-end mr-2">
        <button>
          <img src="./img/menu_FILL0_wght400_GRAD0_opsz24.png" class="" />
        </button>
      </div>
    </div>