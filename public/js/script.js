
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        let loadingScreen = document.getElementById("loadingScreen");
        if (loadingScreen) {
            loadingScreen.style.display = "none";
        }
    }, 1000);  // 5000ms équivaut à 5 secondes
});


document.addEventListener('DOMContentLoaded', function () {
    const deleteButton = document.getElementById('deleteButton');
    const deleteModal = document.getElementById('deleteModal');
    const confirmDelete = document.getElementById('confirmDelete');
    const cancelDelete = document.getElementById('cancelDelete');

    deleteButton.addEventListener('click', function (event) {
        event.preventDefault();
        deleteModal.style.display = 'block';
    });

    confirmDelete.addEventListener('click', function () {
        const articleId = deleteButton.getAttribute('data-id');
        window.location.href = '/delete-article.php?id=' + articleId;
    });

    cancelDelete.addEventListener('click', function () {
        deleteModal.style.display = 'none';
    });
});