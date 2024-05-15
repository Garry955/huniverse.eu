<footer class="font-sans relative pt-5 pb-3 md:pb-6">
    <div class="container mx-auto px-4">
        <div class="lg:flex lg:flex-wrap hidden">
            <div class="flex w-full md:w-4/12">
                <div class="text-2xl px-4">
                    <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-4">Menü</h3>
                    @forelse ($menus as $menu)
                        <a href="{{ route('landing', $menu->url) }}"
                            class="block text-base text-primary font-bold hover:underline mt-1">{{ $menu->name }}</a>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="flex w-full md:w-4/12 px-4">
                <div class="text-2xl">
                    <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-4">Hivatkozások</h3>
                    @forelse ($links as $link)
                        <a href="{{ route('landing', $link->url) }}"
                            class="block text-base text-primary font-bold hover:underline mt-1">{{ $link->name }}</a>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="flex w-full md:w-4/12 px-4">
                <div class="flex flex-wrap items-top">
                    <div class="w-full ml-auto">
                        <a href="/" class="font-bold text-2xl text-right text-gray-900 dark:text-gray-100">LOGO
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-3 md:my-6 border-gray-400" />
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 dark:text-gray-400 py-1">
                    &copy;
                    <span id="year">2024</span>
                    <a href="#" class="hover:underline hover:text-gray-900">Huniverse.eu</a>
                </div>
            </div>
        </div>
    </div>
</footer>
