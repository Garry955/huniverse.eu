<x-layout>
    <section class="products container mx-auto my-20">
        <h2 class="text-3xl font-bold mb-10">Összes termék</h2>
        <div class="grid-cols-1 sm:grid md:grid-cols-3 ">
            @forelse ($products as $product)
                <x-product-card :product='$product' />
            @empty
                <h3>Nincs megjeleníthető termék.</h3>
            @endforelse
        </div>
        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </section>
</x-layout>
