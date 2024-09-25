document.addEventListener('DOMContentLoaded', function() {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeLink = document.getElementById('theme-style');
    const images = document.querySelectorAll('img');

    // Function to switch images
    function switchImages(isDarkTheme) {
        images.forEach(image => {
            const darkSrc = image.getAttribute('data-dark-src');
            const lightSrc = image.getAttribute('data-light-src');
            if (isDarkTheme && darkSrc) {
                image.setAttribute('src', darkSrc);
            } else if (!isDarkTheme && lightSrc) {
                image.setAttribute('src', lightSrc);
            }
        });
    }

    // Load the saved theme on page load
    const savedTheme = localStorage.getItem('theme');
    const isDarkTheme = savedTheme && savedTheme.includes('dark');
    switchImages(isDarkTheme);

    if (savedTheme) {
        themeLink.setAttribute('href', savedTheme);
        themeToggleBtn.textContent = savedTheme.includes('dark') ? 'Light' : 'Dark';
    }

    themeToggleBtn.addEventListener('click', function() {
        const isDarkTheme = themeLink.getAttribute('href') === 'light-theme.css';
        themeLink.setAttribute('href', isDarkTheme ? 'dark-theme.css' : 'light-theme.css');
        themeToggleBtn.textContent = isDarkTheme ? 'Light' : 'Dark';
        localStorage.setItem('theme', isDarkTheme ? 'dark-theme.css' : 'light-theme.css');
        switchImages(isDarkTheme);
    });
});
