const navbarSearchInput = document.querySelector('.navbar-search-input');
const navbarSearchIcon = document.querySelector('.navbar-search-icon');

navbarSearchIcon.addEventListener('click', () => {
    navbarSearchInput.classList.toggle('search-input-expanded');
});
