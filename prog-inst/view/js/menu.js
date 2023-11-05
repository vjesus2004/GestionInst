document.addEventListener('DOMContentLoaded', function() {
    var menu = document.querySelector('.menu');
    var menuToggle = document.querySelector('.menu-toggle');
    var content = document.querySelector('.content');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('open');
        content.classList.toggle('open');
    });
});