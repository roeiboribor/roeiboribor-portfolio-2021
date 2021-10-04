const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                tilt: 'tilt 5s infinite linear',
                "slide-in-right": 'slide-in-right 0.7s both',
                "fade-out-right": 'fade-out-right 0.7s both',
            },
            keyframes: {
                tilt: {
                    "0%, 50%, 100%": {
                        transform: "rotate(0deg)",
                    },
                    "25%": {
                        transform: "rotate(1deg)",
                    },
                    "75%": {
                        transform: "rotate(-1deg)",
                    }
                },
                "slide-in-right": {
                    "0%": {
                        opacity: "0",
                        transform: "translateX(1000px)",
                    },
                    "100%": {
                        transform: "translateX(0)",
                        opacity: "1",
                    }
                },
                "fade-out-right": {
                    "0%": {
                        transform: "translateX(0)",
                        opacity: "1"
                    },
                    "100%": {
                        transform: "translateX(50px)",
                        opacity: "0"
                    }
                }
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
    variants: {
        extend: {
            opacity: ['disabled', 'dark'],
            scale: ['active', 'group-hover'],
            backgroundColor: ['checked', 'active'],
            translate: ['dark'],
            position: ['dark'],
            filter: ['dark'],
            blur: ['dark'],
            backgroundImage: ['dark'],
            animation: ['dark', 'hover'],
            width: ['group-hover'],
            rotate: ['group-hover'],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
    ],
};
