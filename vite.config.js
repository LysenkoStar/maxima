import { defineConfig } from 'vite';
import { createRequire } from 'node:module';
const require = createRequire( import.meta.url );
import laravel from 'laravel-vite-plugin';
import { globSync } from 'glob';

import ckeditor5 from '@ckeditor/vite-plugin-ckeditor5';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // "./resources/**/*.scss",
                // "./resources/**/*.js",
                // "./resources/**/*.blade.php",
                ...globSync('./resources/**/*.scss'),
                ...globSync('./resources/**/*.js'),
                ...globSync('./resources/fonts/**/*.{woff,woff2,ttf,eot}'),
                ...globSync('./public/images/**/*.{png,jpg,jpeg,gif,svg}'),
            ],
            refresh: true,
        }),
        ckeditor5({
            theme: require.resolve( '@ckeditor/ckeditor5-theme-lark' )
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
    build: {
        minify: 'esbuild',
        sourcemap: false,
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['jquery', 'axios', 'swiper'],
                    'ckeditor': ['@ckeditor/ckeditor5-build-classic'],
                },
            }
        },
        chunkSizeWarningLimit: 1000, // 1000 KB
    }
});
