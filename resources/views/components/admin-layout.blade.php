<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
    <title>Huniverse.eu - Admin</title>

</head>

<body class="bg-blue-100 " id="body">
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="fixed top-0 opacity-95 bg-primary text-white px-48 py-2  text-center text-2xl left-0 right-0 z-50 shadow-md">
            <p>
                {{ session('message') }}
            </p>
        </div>
    @endif
    @include('partials.admin_header');
    @include('partials.admin_sidebar');
    <!-- Main content -->
    <div class="lg:flex gap-4 items-stretch" class="main">
        <div class="lg:w-full min-h-screen lg:ml-64 px-6 py-8 mt-[40px]">
            {{ $slot }}
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menu-button');
        var sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('lg:block');
        });
    });
</script>

</html>
