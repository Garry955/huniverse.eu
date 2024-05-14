<header class="bg-white fixed top-0 left-0 right-0 z-40">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Huniverse.eu</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Huniverse.eu">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        {{-- menu items --}}
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ route('product.index') }}"
                class="dropdown block py-6 px-3 text-lg font-semibold leading-6 text-gray-900 hover:text-primary {{ request()->is('product*') ? 'active' : '' }}">
                Termékek</a>
            @if ($groups)
                <div class="dropdown-menu w-fit bg-white lg:rounded-lg absolute top-[72px] pb-3 hidden">
                    @forelse ($groups as $group)
                        <a class="block py-3 font-bold pl-5 pr-16 hover:bg-primary-100"
                            href="/products/?search={{ $group->name }}">{{ $group->name }}</a>
                    @empty
                    @endforelse
                </div>
            @endif
            @forelse ($landings as $page)
                <a href="{{ route('landing', $page->url) }}"
                    class="block py-6 px-3 text-lg font-semibold leading-6 text-gray-900 hover:text-primary {{ request()->is($page->name) ? 'active' : '' }}">{{ $page->name }}</a>
            @empty
            @endforelse
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @include('partials._search')
            <a href="{{ route('cart.show') }}"
                class="block py-6 px-3 text-xl font-semibold leading-6 text-gray-900   hover:text-primary {{ request()->is('cart*') ? 'active' : '' }} relative"><i
                    class="fa-solid fa-cart-shopping"></i> <b
                    class="absolute top-3 right-[-5px] text-center z-10 border-solid bg-black text-sm text-white rounded-full block px-2">{{ $cartTotal }}</b></a>
            @if (Auth::check())
                <a href="{{ route('user.edit') }}"
                    class="block py-6 px-3 text-xl font-semibold leading-6 text-gray-900  hover:text-primary {{ request()->is('user*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-large"></i><span aria-hidden="true"></span></a>
                <a href="{{ route('logout') }}"
                    class="block py-6 px-3 text-2xl font-semibold leading-6 text-gray-900  hover:text-primary">
                    <i class="fa-solid fa-right-from-bracket ml-1"></i> <span aria-hidden="true"></span></a>
            @else
                <a href="{{ route('login') }}"
                    class="block py-6 px-3 text-xl font-semibold leading-6 text-gray-900  hover:text-primary {{ request()->is('login') ? 'active' : '' }}"><i
                        class="fa-solid fa-user-large mr-1"></i> <span aria-hidden="true"></span></a>
            @endif
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    {{-- <div class="lg:hidden" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-10"></div>
      <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <div class="-mx-3">
                <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                  Product
                  <!--
                    Expand/collapse icon, toggle classes based on menu open state.
  
                    Open: "rotate-180", Closed: ""
                  -->
                  <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
                <!-- 'Product' sub-menu, show/hide based on menu state. -->
                <div class="mt-2 space-y-2" id="disclosure-1">
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Analytics</a>
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Engagement</a>
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security</a>
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Integrations</a>
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Automations</a>
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Watch demo</a>
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact sales</a>
                </div>
              </div>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
            </div>
            <div class="py-6">
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
</header>
