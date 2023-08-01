import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    server: {
        host: 'localhost'
    },
    plugins: [
        laravel(['resources/ts/main.tsx']),
        react(),
    ],
    resolve: {
        alias: {
            '@': '/resources/ts',
        },
    },
});
