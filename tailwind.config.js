const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'smalt': {
                    DEFAULT: '#033A9F',
                    '50': '#8BB3FD',
                    '100': '#72A3FC',
                    '200': '#4082FB',
                    '300': '#0E61FA',
                    '400': '#044CD1',
                    '500': '#033A9F',
                    '600': '#02286D',
                    '700': '#01153B',
                    '800': '#000713',
                    '900': '#000205'
                },
            }
        },
    },

    darkMode: 'class',

    variants: {
        extend: {
            opacity: ['disabled'],
            scale: ['active'],
            backgroundColor: ['checked'],
            translate: ['dark'],
            position: ['dark'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
