<?php
require_once('../back/get_nftData.php');

// Fonction pour convertir un grand nombre en Sol avec deux décimales
function convertToSol($number) {
    return number_format($number / 1000000000, 2, '.', '') . ' Sol';
}

$data = fetchPopularCollections();
?>

<!-- Create a container div to hold the results -->
<div id="popularCollections" class="divide-y divide-gray-300">
    <?php if (is_array($data)): ?>
        <?php foreach (array_slice($data, 0, 5) as $collection): ?>
            <?php
                $image = htmlspecialchars($collection['image']);
                $name = htmlspecialchars($collection['name']);
                $description = htmlspecialchars($collection['description']);
                $floorPriceSol = convertToSol($collection['floorPrice']);
            ?>
            <div class="py-4 flex items-center space-x-4 p-2">
                <div class="w-12 h-12 rounded-full overflow-hidden">
                    <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow">
                    <h2 class="font-semibold"><?php echo $description; ?> - <span class="text-white"><?php echo $name; ?></span></h2>
                    <p class="text-white text-sm font-semibold mt-2">Floor Price: <?php echo $floorPriceSol; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p><?php echo $data; // Affiche le message d'erreur ?></p>
    <?php endif; ?>
</div>
