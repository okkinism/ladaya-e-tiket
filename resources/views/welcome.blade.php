<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ config('app.name') }} E-Ticket</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="sticky top-0 z-50">
        @include('components.layouts.navbar')
    </header>
    <section>
        <div class="bg-fixed bg-cover bg-center bg-no-repeat bg-[url('/public/images/ladaya-main.jpg')] bg-gray-800 bg-blend-multiply">
            @include('components.main')
        </div>
        <div class="bg-fixed bg-cover bg-center bg-no-repeat bg-[url('/public/images/ladaya-bg.jpg')] bg-gray-800 bg-blend-multiply">
            @include('components.about')
        </div>
        <div class="bg-fixed bg-cover bg-center bg-no-repeat bg-[url('/public/images/ladaya-bg.jpg')] bg-gray-800 bg-blend-multiply">
            @include('components.gallery')
        </div>
        <div class="bg-fixed bg-cover bg-center bg-[url('/public/images/ladaya-bg.jpg')] bg-gray-800 bg-blend-multiply">
            @include('components.interest')
        </div>
    </section>
    <footer class="footer footer-center p-10 bg-base-200 text-primary-content">
        @include('components.footer')
    </footer>
</body>
</html>
