<script>
    // resources/js/theme.js

    document.addEventListener('DOMContentLoaded', function () {
        const toggleThemeBtns = document.getElementsByClassName('toggleThemeBtn');

        for (const toggleThemeBtn of toggleThemeBtns) {
            toggleThemeBtn.addEventListener('click', function () {
                fetch('toggle-theme')
                    .then(response => response.json())
                    .then(data => {
                        document.body.classList.remove('light-theme', 'dark-theme');
                        document.body.classList.add(`${data.theme}-theme`);
                    });
            });
        }
    });

</script>
