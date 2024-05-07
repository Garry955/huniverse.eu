<x-layout>
    <section class="main container mx-auto">

        @include('partials.hero')

        <div class="mb-20 relative">
            <h2 class="text-3xl font-bold mb-10">Termékek</h2>
            <a href={{ route('product.index') }} class="lg:absolute lg:top-0 lg:right-0 font-bold text-blue-600">Összes termék -></a>
            <div class="grid-cols-1 sm:grid md:grid-cols-3 ">
                @forelse ($products as $product)
                    <x-product :product='$product'/>  
                @empty
                    <h3>Nincs megjeleníthető termék.</h3>
                @endforelse
            </div>

        </div>
    </section>

</x-layout>
