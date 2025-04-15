document.addEventListener('DOMContentLoaded', () => {
    // Smooth scrolling pour les liens d'ancrage
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Gestion des votes via AJAX (déjà présent dans votre projet)
    const voteButtons = document.querySelectorAll('.vote-btn');
    const voteMessage = document.getElementById('vote-message');

    if (voteButtons.length > 0 && voteMessage) {
        voteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const candidate = button.getAttribute('data-candidate');

                fetch('api/vote.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ candidate: candidate }),
                })
                    .then(response => response.json())
                    .then(data => {
                        voteMessage.classList.remove('d-none');
                        if (data.success) {
                            voteMessage.classList.remove('alert-danger');
                            voteMessage.classList.add('alert-success');
                            voteMessage.textContent = data.message || 'Vote enregistré avec succès !';
                            voteButtons.forEach(btn => btn.disabled = true);
                        } else {
                            voteMessage.classList.remove('alert-success');
                            voteMessage.classList.add('alert-danger');
                            voteMessage.textContent = data.error || 'Une erreur est survenue.';
                        }
                    })
                    .catch(error => {
                        voteMessage.classList.remove('d-none');
                        voteMessage.classList.remove('alert-success');
                        voteMessage.classList.add('alert-danger');
                        voteMessage.textContent = 'Erreur réseau : ' + error.message;
                    });
            });
        });
    }

    // Gestion du tableau de bord admin
    const missVotesElement = document.getElementById('miss-votes');
    const masterVotesElement = document.getElementById('master-votes');
    const totalVotesElement = document.getElementById('total-votes');
    const usersListElement = document.getElementById('users-list');
    const toggleVoteButton = document.getElementById('toggleVote');
    const toggleMessage = document.getElementById('toggle-message');

    // Fonction pour mettre à jour les statistiques
    function updateStats() {
        fetch('api/get_stats.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    missVotesElement.textContent = data.miss_votes;
                    masterVotesElement.textContent = data.master_votes;
                    totalVotesElement.textContent = data.total_votes;
                }
            })
            .catch(error => console.error('Erreur lors de la récupération des stats:', error));
    }

    // Fonction pour mettre à jour la liste des utilisateurs
    function updateUsers() {
        fetch('api/get_users.php')
            .then(response => response.json())
            .then(data => {
                if (data.success && usersListElement) {
                    usersListElement.innerHTML = '';
                    data.users.forEach(user => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${user.username}</td>
                            <td>${user.last_login ? new Date(user.last_login).toLocaleString() : 'Jamais'}</td>
                        `;
                        usersListElement.appendChild(row);
                    });
                }
            })
            .catch(error => console.error('Erreur lors de la récupération des utilisateurs:', error));
    }

    // Vérifier l'état initial du vote et mettre à jour le bouton
    function checkVotingState() {
        fetch('api/toggle_voting.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toggleVoteButton.textContent = data.voting_enabled ? 'Désactiver le vote' : 'Activer le vote';
                }
            })
            .catch(error => console.error('Erreur lors de la vérification de l\'état du vote:', error));
    }

    // Gestion du bouton toggle pour activer/désactiver le vote
    if (toggleVoteButton) {
        checkVotingState(); // Vérifier l'état initial
        toggleVoteButton.addEventListener('click', () => {
            fetch('api/toggle_voting.php', { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toggleMessage.classList.remove('d-none');
                        toggleMessage.classList.remove('alert-danger');
                        toggleMessage.classList.add('alert-success');
                        toggleMessage.textContent = data.message;
                        toggleVoteButton.textContent = data.voting_enabled ? 'Désactiver le vote' : 'Activer le vote';
                    } else {
                        toggleMessage.classList.remove('d-none');
                        toggleMessage.classList.remove('alert-success');
                        toggleMessage.classList.add('alert-danger');
                        toggleMessage.textContent = data.error || 'Une erreur est survenue.';
                    }
                })
                .catch(error => {
                    toggleMessage.classList.remove('d-none');
                    toggleMessage.classList.remove('alert-success');
                    toggleMessage.classList.add('alert-danger');
                    toggleMessage.textContent = 'Erreur réseau : ' + error.message;
                });
        });
    }

    // Mettre à jour les stats et les utilisateurs toutes les 5 secondes si l'admin est connecté
    if (missVotesElement && masterVotesElement && totalVotesElement) {
        updateStats();
        setInterval(updateStats, 5000);
    }
    if (usersListElement) {
        updateUsers();
        setInterval(updateUsers, 5000);
    }
});