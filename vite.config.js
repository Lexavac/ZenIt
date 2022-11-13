import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            react,
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'node_modules/push.js/bin/push.min.js',
                'public/js/push.min.js',
            ],
            refresh: true,
        }),
    ],
});

