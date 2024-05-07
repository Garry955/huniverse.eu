<x-layout>
    <section class="main container mx-auto">

        @include('partials.hero')

        <div class="mb-20">
            <h2 class="text-3xl font-bold mb-10">Termékek</h2>
            <div class="products px-5">
                @for ($i = 0; $i < 8; $i++)
                    <x-product
                    {{-- :product=”$product” --}}
                    /> 
                @endfor

            </div>

        </div>
    </section>

</x-layout>
