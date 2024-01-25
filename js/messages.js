    document.getElementById('sendMessageForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.currentTarget;
        const formData = new FormData(form);

        fetch(form.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log(data.message);
                    window.location.reload();
                } else {
                    console.log(data.message);
                }
            })
            .catch(error => {
                console.error('Erreur lors de la requête AJAX :', error);
                alert('Une erreur est survenue lors de l\'envoi du message.');
            });
    });

    window.onload = () => {
        const lastMessage = document.getElementById('lastMessage');
        if (lastMessage) {
            lastMessage.scrollIntoView({ behavior: 'smooth', block: 'end' });
        }
    };