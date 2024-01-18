<?php 
include ('start.php');
$page = isset($_GET['page']) ? $_GET['page'] : 'default';  
?>

<body class="bg-white">

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
    <!-- END CONTENT !-->
    <?php include ('navbar.php') ?>
