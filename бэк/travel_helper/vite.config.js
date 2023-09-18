import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    envDir: "./env",
    plugins: [
        laravel({
            input: [
               
                'resources/scss/app.scss',
                'resources/js/auth/app.js',
                'resources/js/app/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
})
