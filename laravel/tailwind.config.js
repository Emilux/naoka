const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        fontFamily: {
            sans: ['Raleway', ...defaultTheme.fontFamily.sans],
            serif: ['Red Hat Text'],
        },
        colors: {
            'blue': '#00adb5',
            'purple': '#301a4b',
            'yellow': '#fed766',
            'black': '#231f27',
            'white': '#ffffff'
        },
        extend: {
            spacing: {
                '13': '3.25rem',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
