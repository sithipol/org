import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: "localhost",
            // host: '127.0.0.1',
        },
        host: "localhost",
        // host: '127.0.0.1',
        https: false,
        // https: false,
        port: 443,
        // port: 5173,
        proxy: {
            "^(?!(/@vite|/resources|/node_modules))": {
                target: "http://localhost:8989",
                // target: 'http://127.0.0.1:8000',
                secure: false,
            },
        },
    },
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
});
