<form action="/products"
    class="lg:pt-5 text-right lg:text-left pb-5 lg:mb-0 lg:border-none border-b-[1px] border-solid border-white">
    <div class="relative rounded-lg">
        <div class="lg:hidden ease-in-out duration-300 search-input">
            <input type="text" name="search" value="{{ request()->query()['search'] ?? '' }}"
                class="w-full h-[42px] lg:h-fit pl-5 pr-20 py-1 rounded-lg z-0 focus:shadow focus:outline-none"
                placeholder="Keresés.." />
            <button type="submit"
                class="absolute top-[5px] lg:top-[1px] text-2xl lg:text-xl right-3 lg:right-10 hover:text-primary"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        {{-- <div class="absolute lg:top-[1px] lg:right-2 lg:block">
            <div class="text-xl hover:text-primary hover:cursor-pointer search_button">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div> --}}
    </div>
</form>
