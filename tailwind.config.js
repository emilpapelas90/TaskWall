import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
import withMT from "@material-tailwind/html/utils/withMT";


module.exports = withMT({
    content: [
     "./index.html", 
     "./src/**/*.{vue,js,ts,jsx,tsx}",
     "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
     "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
     "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
     "./storage/framework/views/*.php",
     "./resources/views/**/*.blade.php",
     "./resources/js/**/*.vue",
    ],

    theme: {
      extend: {
       translate: {
        200: '200%',
       },
      },
    },
    plugins: [forms, typography],
});


/* @type {import('tailwindcss').Config} */
// export default {
//     content: [
//         "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
//         "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
//         "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
//         "./storage/framework/views/*.php",
//         "./resources/views/**/*.blade.php",
//         "./resources/js/**/*.vue",
//         // "./app/Forms/*.php",
//         // "./app/Tables/*.php",
//     ],

//     theme: {
//         extend: {},
//     },

//     plugins: [forms, typography],
// };
