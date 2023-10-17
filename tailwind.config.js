import preset from "./vendor/filament/support/tailwind.config.preset";
const plugin = require("tailwindcss/plugin");

export default {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        screens: {
            phn: "360px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
        extend: {
            colors: {},
        },
    },
    plugins: [
        plugin(function ({ addBase, theme }) {
            addBase({
                h1: { fontSize: theme("fontSize.2xl") },
                h2: { fontSize: theme("fontSize.xl") },
                h3: { fontSize: theme("fontSize.lg") },
            });
        }),
        require("daisyui"),
        require("flowbite/plugin", "flowbite-typography"),
    ],
};
