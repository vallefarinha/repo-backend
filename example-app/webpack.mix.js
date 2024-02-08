const mix = require('laravel-mix');
const vite = require('laravel-vite');

mix.extend('vite', vite);

mix.vite('resources/css/test.css', { build: { outDir: 'public/css' } });
