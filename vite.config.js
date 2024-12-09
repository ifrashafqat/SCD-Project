import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Ensure other styles are loaded
                'resources/sass/app.scss', // Add your app.scss here
                'resources/js/app.js',    // Include JS files
            ],
            refresh: true,
        }),
    ],
});
