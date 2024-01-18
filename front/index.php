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
        default:
            include ('messages.php');
            break;
    } ?>
</div>
    <!-- END CONTENT !-->
    <?php include ('navbar.php') ?>