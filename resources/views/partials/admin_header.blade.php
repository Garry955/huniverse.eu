@if (Request::is('admin/*'))
    {{-- Header --}}
    <header id="header" class="fixed top-0 left-0 right-0 z-40">
        <nav class="border-b border-gray-300">
            <div class="flex justify-between lg:items-center px-9">
                <!-- Logo -->
                <div class="ml-1">
                    <a href="/admin/dashboard">
                        <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="logo"
                            class="h-12 w-20">
                    </a>
                </div>
                <!-- Menu icon -->
                <button id="menu-button" class="lg:hidden">
                    <i class="fas fa-bars text-2xl"></i>
                </button>

                <!-- Rigt-top icons -->
                <div class="lg:block hidden space-x-4 text-xl p-3">
                    <b class="text-secondary-100">Admin: {{ auth()->user()->name }}</b>
                    <!-- Logout -->
                    <a class="hover:text-primary font-bold" href="{{ route('admin.logout') }}">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Kijelentkezés
                    </a>
                </div>
            </div>
        </nav>
    </header>
@endif
