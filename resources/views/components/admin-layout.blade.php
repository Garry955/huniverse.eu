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
            class="fixed top-0 bg-primary-800 text-white px-48 py-5 text-center text-2xl left-0 right-0 z-50 shadow-md">
            <p>
                {{ session('message') }}
            </p>
        </div>
    @endif
    @if (Request::is('admin/*'))
        {{-- Header --}}
        <header id="header" class="fixed top-0 left-0 right-0 z-40">
            <nav class="bg-white border-b border-gray-300">
                <div class="flex justify-between items-center px-9">
                    <!-- Menu icon -->
                    <button id="menu-button" class="lg:hidden">
                        <i class="fas fa-bars text-cyan-500 text-lg"></i>
                    </button>
                    <!-- Logo -->
                    <div class="ml-1">
                        <a href="/admin/dashboard">
                            <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="logo"
                                class="h-12 w-20">
                        </a>
                    </div>

                    <!-- Rigt-top icons -->
                    <div class="space-x-4 text-xl p-3">
                        <b class="text-primary">{{ auth()->user()->name }}</b>
                        <!-- Logout -->
                        <a class="hover:text-primary font-bold" href="{{ route('admin.logout') }}">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Kijelentkezés
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Sidebar -->
        <div id="sidebar" class="lg:block hidden pt-20 z-0 bg-white w-64 h-screen fixed rounded-none border-none">
            <!-- Items -->
            <div class="p-4 space-y-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:text-primary {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-store"></i>
                    <span>Termékek</span>
                </a>
                <a href="{{ route('admin.orders') }}"
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:text-primary {{ request()->is('admin/order*') ? 'active' : '' }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Rendelések</span>
                </a>
                <a href="{{ route('admin.users') }}"
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:text-primary {{ request()->is('admin/user*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Felhasználók</span>
                </a>
                <a href="{{ route('admin.contacts') }}"
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:text-primary {{ request()->is('admin/contact*') ? 'active' : '' }}">
                    <i class="fa-regular fa-envelope"></i>
                    <span>Üzenetek</span>
                </a>
                <a href="{{ route('admin.landings') }}"
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:text-primary {{ request()->is('admin/landing*') ? 'active' : '' }}">
                    <i class="fa-regular fa-newspaper"></i>
                    <span>Aloldalak</span>
                </a>
                <a href="{{ route('admin.slider') }}"
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:text-primary {{ request()->is('admin/slider*') ? 'active' : '' }}">
                    <i class="fa-regular fa-images"></i>
                    <span>Diák</span>
                </a>
            </div>
        </div>
    @endif
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
