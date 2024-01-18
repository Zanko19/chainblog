   <?php 
    include ('tabs.php');
    $subPage = isset($_GET['subPage']) ? $_GET['subPage'] : 'default'; 
    switch($subPage) {
        case 'personal':
            include ('personal_content.php');
            break;
        case 'groups':
            include ('groups_content.php');
            break;
        default:
            include ('personal_content.php');
            break;
    } ?>