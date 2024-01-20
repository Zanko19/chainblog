<?php 
include ('start.php');
$page = isset($_GET['page']) ? $_GET['page'] : 'default';  
?>

<body class="bg-white">
<div class="md:w-[85%] lg:w-[70%] md:m-auto">
    <?php include ('header.php') ?> 
    <!-- CONTENT !-->
    <?php switch($page) {
        case 'welcome':
            include ('main.php');
            break;
        case 'messages':
            include ('messages.php');
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
        default:
            include ('main.php');
            break;
    } ?>
</div>
    <!-- END CONTENT !-->
    <?php include ('navbar.php') ?>
