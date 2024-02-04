
<div id="notificationArea" class="space-y-4"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchNotifications();

        function fetchNotifications() {
            fetch('../back/get_notif.php')
                .then(response => response.json())
                .then(data => {
                    displayNotifications(data.notifications);
                });
        }

        function displayNotifications(notifications) {
            const container = document.getElementById('notificationArea');
            container.innerHTML = '';
            notifications.forEach(notification => {
                const notifElement = document.createElement('div');
                notifElement.className = 'bg-[#f4edde] rounded-3xl p-6 shadow';
                notifElement.innerHTML = `
                    <div class="flex items-center justify-between border-b border-gray-400 pb-6">

                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>                        <div class="pl-3 w-full">
                            <p class="text-xl font-medium leading-5 text-gray-800">${notification.action_username}</p>
                            <p class="text-sm leading-normal pt-2 text-gray-500">${notification.created_at}</p>
                        </div>
                    </div>
                    <div class="px-2">
                        <p class="text-sm leading-5 py-4 text-gray-600">
                         Someone interacted with your profile !
                        </p>
                        <div class="flex gap-x-4">
                            <div class="py-2 px-4 text-xs leading-3 text-black rounded-full bg-[#2ECC71]">${notification.action_type}</div>
                            <span class="delete-btn cursor-pointer text-red-600" onclick="deleteNotification(${notification.notification_id})">Supprimer</span>
                        </div>
                    </div>
                    
                `;
                container.appendChild(notifElement);
            });
        }

        window.deleteNotification = function(notificationId) {
            fetch('../back/delete_notif.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ notificationId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    fetchNotifications(); 
                } else {
                    alert('Erreur lors de la suppression de la notification');
                }
            });
        }
    });
</script>


