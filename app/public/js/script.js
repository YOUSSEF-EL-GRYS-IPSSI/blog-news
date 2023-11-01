


const headerMobileButton = document.querySelector('.header-mobile-icon');
const headerMobileList = document.querySelector('.header-mobile-list');
console.log(headerMobileButton);
headerMobileButton.addEventListener('click', () => {
    headerMobileList.classList.toggle('show')
})

// 7zhxRUrdqXhc 

setTimeout(function () {
    let loadingScreen = document.getElementById("loadingScreen");
    if (loadingScreen) {
        loadingScreen.style.display = "none";
    }
}, 1000);  




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









