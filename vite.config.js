import { defineConfig } from 'vite';
import { createRequire } from 'node:module';
const require = createRequire( import.meta.url );
import laravel from 'laravel-vite-plugin';
import { globSync } from 'glob';
import imageminPlugin from 'vite-plugin-imagemin';
import { optimizeCssModules } from 'vite-plugin-optimize-css-modules';
import ckeditor5 from '@ckeditor/vite-plugin-ckeditor5';

export default defineConfig({
    plugins: [
        laravel({
            input: [
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
        imageminPlugin({
            optipng: { optimizationLevel: 7 },
            mozjpeg: { quality: 75 },
            pngquant: { quality: [0.65, 0.90] },
        }),
        optimizeCssModules()
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
