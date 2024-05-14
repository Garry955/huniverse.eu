<x-layout>
    <section class="products container mx-auto my-20">
        <div class="bg-white rounded-lg p-4 shadow-md mb-10">
            <div class="p-3 w-full">
                <div class="head">
                    <div class="px-4 flex justify-between flex-row mb-5 py-2 text-left border-b-2 w-full">
                        <h2 class="text-2xl mb-2 font-bold text-gray-600">Termékcsoportok</h2><a
                            href={{ route('product.index') }} class=" font-bold text-blue-600">Összes
                            termék <i class="fa-solid fa-right-from-bracket"></i></a>
                    </div>
                </div>
                <div class="">
                    @forelse ($groups as $group)
                        <div class="hover:bg-primary-300 inline-block mb-3  mr-5 rounded-lg bg-primary-200">
                            <a href="/products?search={{ $group->name }}" class="p-3 inline-block font-bold">
                                {{ $group->name ?? '' }}

                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        @if (request()->query())
            <h2 class="text-3xl font-bold mb-10"><b class="text-primary">"{{ request()->query()['search'] }}"</b> -
                Termékek</h2>
        @else
            <h2 class="text-3xl font-bold mb-10">Összes termék</h2>
        @endif

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
