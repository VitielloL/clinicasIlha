import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/register.js',
                'resources/js/selected2.js',
                'resources/js/jqueryMask-cep-pessoa.js',
            ],
            refresh: true,
        }),
    ],
});
