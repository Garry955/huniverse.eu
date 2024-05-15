@if (Request::is('admin/*'))
    <!-- Sidebar -->
    <div id="sidebar" class="  lg:block hidden pt-20 z-0 w-64 h-screen fixed rounded-none border-none">
        <!-- Items -->
        <div class="p-4 space-y-4">
            <a href="{{ route('admin.dashboard') }}"
                class="px-4 py-3 flex items-center space-x-4 rounded-md font-bold group hover:text-primary {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-store"></i>
                <span>Termékek</span>
            </a>
            <a href="{{ route('admin.orders') }}"
                class="px-4 py-3 flex items-center space-x-4 rounded-md font-bold group hover:text-primary {{ request()->is('admin/order*') ? 'active' : '' }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Rendelések</span>
            </a>
            <a href="{{ route('admin.users') }}"
                class="px-4 py-3 flex items-center space-x-4 rounded-md  font-bold group hover:text-primary {{ request()->is('admin/user*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i>
                <span>Felhasználók</span>
            </a>
            <a href="{{ route('admin.contacts') }}"
                class="px-4 py-3 flex items-center space-x-4 rounded-md font-bold group hover:text-primary {{ request()->is('admin/contact*') ? 'active' : '' }}">
                <i class="fa-regular fa-envelope"></i>
                <span>Üzenetek</span>
            </a>
            <a href="{{ route('admin.landings') }}"
                class="px-4 py-3 flex items-center space-x-4 rounded-md font-bold hover:text-primary {{ request()->is('admin/landing*') ? 'active' : '' }}">
                <i class="fa-regular fa-newspaper"></i>
                <span>Aloldalak</span>
            </a>
            <a href="{{ route('admin.slider') }}"
                class="px-4 py-3 flex items-center space-x-4 rounded-md font-bold hover:text-primary {{ request()->is('admin/slider*') ? 'active' : '' }}">
                <i class="fa-regular fa-images"></i>
                <span>Diák</span>
            </a>
        </div>
    </div>
@endif
