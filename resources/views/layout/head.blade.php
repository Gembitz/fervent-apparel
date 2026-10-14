<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'FERVENT APPAREL — Contemporary Luxury Fashion')</title>

<!-- Google Fonts: Inter & Playfair Display -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Vite Styles & Scripts / Fallback Tailwind -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
    <!-- Tailwind CSS Fallback (Ensures visual perfection in Laragon without active npm run dev) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    },
                    colors: {
                        navy: {
                            DEFAULT: '#1B2A4A',
                            50: '#F0F4F8',
                            100: '#D9E2EC',
                            700: '#243B66',
                            800: '#1B2A4A',
                            900: '#101B30',
                        },
                        accent: {
                            DEFAULT: '#2563EB',
                            hover: '#1D4ED8',
                        },
                        sale: {
                            DEFAULT: '#DC2626',
                        },
                        brandGreen: {
                            DEFAULT: '#059669',
                        }
                    }
                }
            }
        }
    </script>
@endif

<style>
    body {
        font-family: 'Inter', sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    [x-cloak] { display: none !important; }
    
    /* Custom range slider styling */
    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #1B2A4A;
        cursor: pointer;
        border: 2px solid #ffffff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }
    input[type=range]::-moz-range-thumb {
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #1B2A4A;
        cursor: pointer;
        border: 2px solid #ffffff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }
</style>
@stack('styles')
