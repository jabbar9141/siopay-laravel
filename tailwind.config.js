/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.{php,blade,js}",
        "./resources/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php'
    ],
    theme: {
        extend: {
            colors: {
                primary: '1077B7'
            },
            backgroundImage: theme => ({
                'gradient-to-r-blue': "linear-gradient(to right, blue 30%, transparent)",
            })
        },
    },
    plugins: [],
}

