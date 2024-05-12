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
    <title>Huniverse.eu</title>

</head>

<body class="bg-blue-100 pt-[50px]">
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="fixed top-0 bg-primary-800 text-white px-48 py-5 text-center text-2xl left-0 right-0 z-10 shadow-md">
            <p>
                {{ session('message') }}
            </p>
        </div>
    @endif
    @include('partials.header')
    <main class="">
        {{ $slot }}
    </main>
    @include('partials.footer')
</body>

</html>
