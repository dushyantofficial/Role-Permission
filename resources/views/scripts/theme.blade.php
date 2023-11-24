<script>
    // resources/js/theme.js

    document.addEventListener('DOMContentLoaded', function () {
        const toggleThemeBtns = document.getElementsByClassName('toggleThemeBtn');

        for (const toggleThemeBtn of toggleThemeBtns) {
            toggleThemeBtn.addEventListener('click', function () {
                fetch('toggle-theme')
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Theme Update!',
                            text: 'Your theme change successfully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page
                            }
                        });
                    });
            });
        }

    });

</script>
