import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "./resources/**/*.js",
                "./resources/**/*.blade.php",
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "./resources/scss/app.scss";`,
            },
        },
    },
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
