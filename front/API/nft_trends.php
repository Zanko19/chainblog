<!-- Create a container div to hold the results -->
<div id="popularCollections" class="divide-y divide-gray-300">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchPopularCollections();

        function fetchPopularCollections() {
            fetch('https://api-mainnet.magiceden.dev/v2/marketplace/popular_collections', {
                headers: {
                    'accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                displayPopularCollections(data);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }

        // Function to convert a large number to Sol with two decimal places
        function convertToSol(number) {
            // Convert the number to Sol with two decimal places
            return (number / 1000000000).toFixed(2) + ' Sol';
        }

        function displayPopularCollections(data) {
            const container = document.getElementById('popularCollections');
            container.innerHTML = ''; // Clear any existing content

            if (data && Array.isArray(data)) {
                const limitedData = data.slice(0, 5); // Get the first 5 results

                limitedData.forEach(collection => {
                    const collectionItem = document.createElement('div');
                    collectionItem.className = 'py-4 flex items-center space-x-4 p-2';
                    
                    // Create a round image container
                    const imageContainer = document.createElement('div');
                    imageContainer.className = 'w-16 h-16 rounded-full overflow-hidden';
                    const image = document.createElement('img');
                    image.src = collection.image;
                    image.alt = collection.name;
                    image.className = 'w-full h-full object-cover';
                    imageContainer.appendChild(image);

                    // Convert the floorPrice to Sol
                    const floorPriceSol = convertToSol(collection.floorPrice);

                    // Create collection details container
                    const detailsContainer = document.createElement('div');
                    detailsContainer.className = 'flex-grow';
                    detailsContainer.innerHTML = `
                        <h2 class="text-xl font-semibold">${collection.description} - <span class="text-white">${collection.name}</span></h2>
                        <p class="text-white font-semibold mt-2">Floor Price: ${floorPriceSol}</p>
                    `;

                    // Append image container and details container to collectionItem
                    collectionItem.appendChild(imageContainer);
                    collectionItem.appendChild(detailsContainer);

                    container.appendChild(collectionItem);
                });
            } else {
                container.innerHTML = '<p>No data available.</p>';
            }
        }
    });
</script>
