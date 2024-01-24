<h1 class="text-3xl font-semibold mb-4">Vos Notifications</h1>
<div id="notificationArea" class="space-y-4 pt-[10%]"></div>

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
                        <img src="https://cdn.tuk.dev/assets/components/misc/doge-coin.png" alt="coin avatar" class="w-12 h-12 rounded-full">
                        <div class="pl-3 w-full">
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


