<form action="/products" class="pt-5">
    <div class="relative border-2 border-gray rounded-lg">
        <div class="hidden ease-in-out duration-300" id="search_input">
            <input type="text" name="search" value="{{ request()->query()['search'] }}"
                class=" h-fit pl-5 pr-20 py-1 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Keresés.." />
            <button type="submit" class="absolute top-[1px] text-xl right-10 hover:text-primary"><i
                    class="fa-solid fa-angle-right"></i></button>
        </div>
        <div class="absolute top-[1px] right-2">
            <div class="text-xl hover:text-primary hover:cursor-pointer" id="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
    </div>
</form>
