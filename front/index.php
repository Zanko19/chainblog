<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 'default';  
?>


    <?php include ('header.php') ?> 
    <!-- CONTENT !-->
    <br class="mt-12">
    <div class="">

    <?php switch($page) {
        case 'welcome':
            include ('main.php');
            break;
        case 'messages':
            include ('message_list.php');
            break;
        case 'message-details':
            include ('messages.php');
            break;
        case 'messageSend':
            include ('message_form.php');
            break;
        case 'notifs':
            include ('notifs.php');
            break;
        case 'post':
            include ('post_form.php');
            break;
        case 'profile':
            include ('profile_page.php');
            break;
        case 'other':
            include ('other_page.php');
            break;
        case 'profileModify':
            include ('profile_form.php');
            break;
        case 'search':
            include ('search_form.php');
            break;
        case 'search_results': 
            include ('search_results.php');
            break;
        case 'singlePost':
            include ('single_post.php');
            break;
        case 'login':
            include ('login_form.php');
            break;
        default:
            include ('main.php');
            break;
    } ?>
    </div>
</div>
    <!-- END CONTENT !-->
    <?php include ('navbar.php') ?>
    <?php include ('searchbar.php') ?>

    <?php

    if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
        echo '<script>alert("Connexion réussie ! Bienvenue, ' . htmlspecialchars($_SESSION['username']) . '");</script>';
        unset($_SESSION['login_success']);
    }
    ?>
