document.querySelectorAll('.buy-button').forEach(button => {
    button.addEventListener('click', () => {
        const animalId = button.dataset.id;
        alert(`You are about to purchase animal ID ${animalId}.`);
        window.location.href = `purchase.php?id=${animalId}`;
    });
});
