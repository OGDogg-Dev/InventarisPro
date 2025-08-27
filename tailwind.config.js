// tailwind.config.js

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
],

    theme: {
        extend: {
            fontFamily: {
               sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            // TAMBAHKAN ATAU MODIFIKASI BAGIAN INI
            colors: {
                // 'primary': '#3490dc', // Contoh 1 warna
                // Atau buat palet lengkap
                'primary': {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#3b82f6', // Warna utama
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                    950: '#172554',
                },
                // Anda juga bisa menambahkan warna 'secondary', 'accent', dll.
            }
        },
    },

    plugins: [forms],
};
