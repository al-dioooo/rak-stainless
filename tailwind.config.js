const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            aspectRatio: {
                21: '21'
            },
            colors: {
                'primary': colors.indigo,
                'accent-1': colors.yellow,
                'accent-2': colors.indigo,
                'accent-3': colors.pink,
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
}
