<div class="hidden md:block md:w-[15%] bg-[#2ECC71] opacity-75 rounded-xl fixed inset-y-0 right-0" id="sidebar2">
    <?php include('search_form.php'); ?>
    <div id="accordion">
        <!-- NFT Trends -->
        <div class="px-4 flex items-center justify-between bg-slate-500">
            <p class="text-lg font-semibold">NFT Trends</p>
            <button class="accordion-nft-button text-white font-bold px-4 rounded" onclick="toggleNftAccordion()">
                <svg class="accordion-nft-icon transform transition-transform duration-500" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 -960 960 960" width="2em">
                    <path class="path" d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z" />
                </svg>
            </button>
        </div>
        <div class="accordion-nft-content hidden bg-slate-600">
            <?php include('nft_trends.php'); ?>
        </div>
        <!-- Post Trends -->
        <div class="px-4 flex items-center justify-between bg-slate-500">
            <p class="text-lg font-semibold">Post Trends</p>
            <button class="accordion-post-button text-white font-bold px-4 rounded" onclick="togglePostAccordion()">
                <svg class="accordion-post-icon transform transition-transform duration-500" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 -960 960 960" width="2em">
                    <path class="path" d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z" />
                </svg>
            </button>
        </div>
        <div class="accordion-post-content hidden bg-slate-600">
            <?php include 'posts_trends.php'; ?>
        </div>
    </div>
</div>

<script>
    function toggleNftAccordion() {
        var content = document.querySelector('.accordion-nft-content');
        var icon = document.querySelector('.accordion-nft-icon .path');
        content.classList.toggle('hidden');

        if (content.classList.contains('hidden')) {
            icon.setAttribute('d', 'M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z');
            icon.style.transform = 'rotate(0deg)';
        } else {
            icon.setAttribute('d', 'm256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z');
            icon.style.transform = 'rotate(180deg)';
        }
    }

    function togglePostAccordion() {
        var content = document.querySelector('.accordion-post-content');
        var icon = document.querySelector('.accordion-post-icon .path');
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
