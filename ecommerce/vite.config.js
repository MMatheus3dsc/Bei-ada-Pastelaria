
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/css/reset.css',
            'resources/css/admin.css',
            'resources/css/form.css',
            'resources/js/app.js',
        ]),
    ],
})