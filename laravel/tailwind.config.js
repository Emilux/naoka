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
        fontSize: {
            ...defaultTheme.fontSize,
            'base': ['16px', {
                lineHeight: '18.78px',
            }],
            'lg': ['18px', {
                lineHeight: '21.13px',
            }],
        },
        fontFamily: {
            sans: ['Raleway', ...defaultTheme.fontFamily.sans],
            serif: ['Red Hat Text'],
        },
        colors: {
            "naoka-blue": {
                "DEFAULT":"#00ADB5",
                "hover":"#009BA3"
            },
            "naoka-yellow": {
                "DEFAULT":"#FED766",
                "hover":"#FED148"
            },
            "naoka-purple": {
                "DEFAULT":"#301A4B",
                "hover":"#27153D"
            },
            "naoka-red": "#D24E4E",
            "naoka-grey": "#f1f1f1",
            white: {
                "DEFAULT":"#FFFFFF",
                "hover":"#f3f3f3"
            },
            black:"#231F27",
            blue: '#00adb5',
            purple: '#301a4b',
            yellow: '#fed766',
        },
        extend: {
            boxShadow: {
                "base":"0px 0px 30px 0px #00000014",
                "mini":"0px 0px 6px 0px #00000014"
            },
            borderRadius: {
                "section":"50px"
            },
            spacing: {
                '13': '3.25rem',
            },
            container: {
                center: true,
                padding: '1.5rem'
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
