import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "./public/js/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#395886",
                secondary: "#395886",
                success: "#006769",
                warning: "#FDCD35",
                danger: "#FFA15D",
                ashes: "#D9D9D9",
                light: "#E4E9EE",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin"), require('flowbite-typography')],
};
