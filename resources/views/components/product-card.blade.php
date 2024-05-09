    <div
        class="mx-3 mt-6 flex flex-col self-start rounded-lg
      bg-white text-surface shadow-secondary-1 dark:bg-surface-dark
       dark:text-white sm:shrink-0 sm:grow sm:basis-0 hover:scale-105 transition-all ease-in-out">
        <a href="{{ route('product.show', $product->id) }}">
            <img class="" src="{{ asset('images/no-image.png') }}" alt="{{ $product->name }}" />
            <div class="p-6">
                <h5 class="mb-2 text-xl font-medium leading-tight">{{ $product->name }}</h5>
                <p class="mb-4 text-base">
                    {{ $product->description }}
                </p>
                <p class="mb-4 text-base">
                    <span class="text-right block font-bold">
                        {{ $product->price }} Ft
                    </span>
                </p>

                <span class="text-right block font-bold">
                    @if ($product->stock)
                        <i class="fa-regular fa-circle-check text-green-500 text-xl"></i>
                        <b class="mr-2 text-green-500">Készleten(/db.) {{ $product->stock }} darab</b>
                    @else
                        <i class="fa-regular fa-circle-xmark text-red-500 text-xl"></i>
                        <b class="mr-2 text-red-500">A termék jelenleg nincs készleten. </b>
                    @endif
                </span>
        </a>
    </div>
    </div>
