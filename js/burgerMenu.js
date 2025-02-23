window.addEventListener('DOMContentLoaded', (event) => {
    const burgerMenuIcon = document.querySelector('.burger-menu-icon');
    const nav = document.querySelector('.burger-menu-nav');
    const backButton = document.querySelector('#backButton');
    nav.style.display = "none";

    burgerMenuIcon.addEventListener('click', function() {
        if (nav.style.display === "none") {
            nav.style.display = "flex";
        } else {
            nav.style.display = "none";
        }
    });

    backButton.addEventListener('click', function() {
        nav.style.display = "none";
    });

     window.addEventListener('resize', function() {
        if (window.innerWidth > 700) {
            nav.style.display = "none";
        }
    });
});