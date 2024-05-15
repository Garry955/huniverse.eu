<x-layout>
    <section class="main container mx-auto">

        @if ($sliders)
            @include('partials.slider')
        @endif
        <div class="mb-20 relative">
            @if ($group)
                <h2 class="text-3xl font-bold mb-10">Termékek - <a href="/products?search={{ $group->name }}"
                        class="text-primary">{{ $group->name }}</a></h2>
            @else
                <h2 class="text-3xl font-bold mb-10">Termékek</h2>
            @endif
            <a href={{ route('product.index') }}
                class="lg:absolute lg:top-0 lg:right-0 font-bold text-primary hover:text-black">Összes
                termék <i class="fa-solid fa-right-from-bracket"></i></a>
            <div class="grid-cols-1 sm:grid md:grid-cols-3">
                @forelse ($products as $product)
                    <x-product-card :product='$product' />
                @empty
                    <h3>Nincs megjeleníthető termék.</h3>
                @endforelse
            </div>
        </div>
        <div class="mb-20">
            <x-contact_form></x-contact_form>
        </div>
    </section>

</x-layout>
