<x-layout>
    <section class="main container mx-auto">

        @if (!$sliders->isEmpty())
            @include('partials.slider')
        @endif
        <div class="mb-20 relative xl:max-w-7xl xl:mx-auto">
            @if ($group)
                <h2 class="text-3xl font-bold mb-10">Termékek - <a href="/products?search={{ $group->name }}"
                        class="text-[#f57425]">{{ $group->name }}</a></h2>
            @else
                <h2 class="text-3xl font-bold mb-10 inline-block lg:block">Termékek</h2>
            @endif
            <a href={{ route('product.index') }}
                class="hidden lg:block lg:absolute lg:top-0 lg:right-0 font-bold text-[#f57425] float-right lg:float-none pt-2 lg:pt-0">Összes
                termék <i class="fa-solid fa-right-from-bracket"></i></a>
            <div class="grid-cols-1 items-center sm:grid md:grid-cols-2 lg:grid-cols-3">
                @forelse ($products as $product)
                    <x-product-card :product='$product' />
                @empty
                    <h3>Nincs megjeleníthető termék.</h3>
                @endforelse
                <a href={{ route('product.index') }}
                    class="mt-14 block font-bold  text-[#f57425] lg:hidden pt-2 text-3xl text-right">Összes
                    termék <i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
        <div class="mb-20 xl:max-w-7xl xl:mx-auto">
            <x-contact_form></x-contact_form>
        </div>
    </section>

</x-layout>
