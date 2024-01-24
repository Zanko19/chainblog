<div class="hidden md:block md:w-[15%] bg-[#2ECC71] rounded-xl fixed inset-y-0 right-0" id="sidebar">
    <?php include ('search_form.php') ?>
    <div id="accordion">
    <div class="p-4 flex items-center justify-between bg-slate-500">
    <p class="text-lg font-semibold">NFT Trends</p>
    <button class="accordion-button text-white font-bold py-2 px-4 rounded" onclick="toggleAccordion()">
        <svg class="accordion-icon transform transition-transform duration-500" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 -960 960 960" width="2em">
            <path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z"/>
        </svg>
    </button>
</div>
<div class="accordion-content hidden bg-slate-600">
    <?php include('nft_trends.php'); ?>
</div>
<div>
    <?php include 'posts_trends.php'; ?>
</div>

<script>
    function toggleAccordion() {
        var content = document.querySelector('.accordion-content');
        var icon = document.querySelector('.accordion-icon');
        content.classList.toggle('hidden');

        if (content.classList.contains('hidden')) {
            icon.setAttribute('d', 'M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z');
            icon.style.transform = 'rotate(0deg)';
        } else {
            icon.setAttribute('d', 'm256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z');
            icon.style.transform = 'rotate(180deg)';
        }
    }
</script>

