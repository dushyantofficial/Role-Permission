<script>
    // resources/js/theme.js

    document.addEventListener('DOMContentLoaded', function () {
        const toggleThemeBtns = document.getElementsByClassName('toggleThemeBtn');

        // Function to set the theme in local storage
        const setThemeInLocalStorage = (theme) => {
            localStorage.setItem('theme', theme);
        };

        // Function to get the theme from local storage
        const getThemeFromLocalStorage = () => {
            return localStorage.getItem('theme') || 'light';
        };

        for (const toggleThemeBtn of toggleThemeBtns) {
            toggleThemeBtn.addEventListener('click', function () {
                fetch('toggle-theme')
                    .then(response => response.json())
                    .then(data => {
                        document.body.classList.remove('light-theme', 'dark-theme');
                        document.body.classList.add(`${data.theme}-theme`);
                        // Toggle between moon and sun icons
                        toggleThemeBtn.innerHTML = (data.theme === 'dark') ? '<i class="fa fa-sun-o"></i>' : '<i class="fa fa-moon-o"></i>';
                        // document.body.classList.remove('light-theme', 'dark-theme');
                        // document.body.classList.add(`${data.theme}-theme`);
                        // Set the theme in local storage
                        setThemeInLocalStorage(data.theme);
                        window.location.reload()
                    });
            });
            // Set the initial theme on page load
            const initialTheme = getThemeFromLocalStorage();
            document.body.classList.add(`${initialTheme}-theme`);
            toggleThemeBtn.innerHTML = (initialTheme === 'dark') ? '<i class="fa fa-sun-o"></i>' : '<i class="fa fa-moon-o"></i>';

            // Add click event listener to the theme toggle button
            toggleThemeBtn.addEventListener('click', toggleTheme);
        }

    });

</script>
