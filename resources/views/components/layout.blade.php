<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Huniverse.eu</title>
</head>
<body class="bg-blue-100 "> 
    @include('partials.header')
    <main class="h-screen">
        {{$slot}}
    </main>
    @include('partials.footer')
</body>
</html>