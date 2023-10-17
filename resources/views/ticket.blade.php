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
        <div class="h-screen bg-cover bg-center bg-no-repeat bg-[url('/public/images/ladaya-main.jpg')] bg-gray-600 bg-blend-multiply">
            @include('components.form')
        </div>
    </section>
</body>

</html>