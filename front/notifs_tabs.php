<?php $subPage = isset($_GET['subPage']) ? $_GET['subPage'] : 'default'; ?>
<style>
    .bg-personal {
        background-color: #2ECC71;
        color: dark;
    }
</style>

<div class="flex items-center mr-2 ml-2 space-x-6">
    <div id="all" class="clickable-tab space-x-6 basis-1/2 flex justify-center rounded-full font-semibold <?php echo ($subPage == 'all' || $subPage == 'default' ? 'bg-personal' : ''); ?>">
        <a href="index.php?page=notifs&subPage=all">All</a>
    </div>
    <div id="mentions" class="clickable-tab flex space-x-6 w-1/2 basis-1/2 justify-center rounded-full font-semibold <?php echo ($subPage == 'mentions' ? 'bg-personal' : ''); ?>">
        <a href="index.php?page=notifs&subPage=mentions">Mentions</a>
    </div>
</div>
