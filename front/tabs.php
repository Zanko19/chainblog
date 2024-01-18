<?php $subPage = isset($_GET['subPage']) ? $_GET['subPage'] : 'default'; ?>
<style>
    .bg-personal {
        background-color: #2ECC71;
        color: dark;
    }
</style>
<div class="flex items-center mr-2 ml-2 space-x-6 bg-[#b4edcc] p-2 rounded-3xl">
    <div id="personal" class="clickable-tab space-x-6 basis-1/2 flex justify-center rounded-full font-semibold <?php echo ($subPage == 'personal' || $subPage == 'default' ? 'bg-personal' : ''); ?>">
        <a href="index.php?mainPage=messages&subPage=personal">Personal</a>
    </div>
    <div id="groups" class="clickable-tab flex space-x-6 w-1/2 basis-1/2 justify-center rounded-full font-semibold <?php echo ($subPage == 'groups' ? 'bg-personal' : ''); ?>">
        <a href="index.php?mainPage=messages&subPage=groups">Groups</a>
    </div>
</div>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".clickable-tab");
    
            tabs.forEach(tab => {
                tab.addEventListener("click", function () {
                    tabs.forEach(t => t.classList.remove("bg-personal"));
    
                    this.classList.add("bg-personal");
                });
            });
        });
    </script> -->
    