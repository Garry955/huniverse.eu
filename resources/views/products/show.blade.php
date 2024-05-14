<x-layout>
    <!-- Section: Design Block -->
    <section class="container mx-auto mb-20" style="margin-top: 40px">
        <div
            class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <div class="flex flex-wrap items-start">
                <div class="hidden shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                    <img src="{{ $product->image ? asset('/storage/products/' . $product->image) : asset('images/no-image.png') }}"
                        alt="" class="w-full pt-14" />
                </div>
                <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                    <div class="px-6 py-12 md:px-12 relative">
                        <h2 class="mb-4 text-2xl font-bold">
                            {{ $product->name }}
                        </h2>
                        <p class="mb-6 text-neutral-500 dark:text-neutral-300">
                            <b>Termékcsoport: </b><a class="font-bold text-primary"
                                href="{{ $product->group->link }}">{{ $product->group->name }}</a>
                            </br>
                        </p>
                        <p class="mb-6 text-neutral-500 dark:text-neutral-300">
                            {{ $product->description }} </br>
                        </p>
                        <span class="text-right block font-bold mt-40">
                            <b class="mr-2">Ár(/db.)</b>
                            {{ $product->price }} Ft
                        </span>
                        <div class="controls mt-12 float-right">
                            <form action="{{ route('cart.addCart', $product->id) }}" method="POST">
                                @csrf
                                <p class="inline-block mr-2 font-bold">Mennyiség</p>
                                <input type="number" id="quantity" name="quantity" min="0"
                                    max="{{ $product->stock }}" step="1" value="{{ $quantity }}"
                                    class="border-form-stroke text-body-color placeholder-body-color focus:border-primary active:border-primary rounded-lg border-[1.5px] py-2 px-5 font-medium outline-none transition disabled:cursor-default disabled:bg-[#F5F7FD]" />
                                @if ($product->stock)
                                    <button type="submit"
                                        class="bg-primary inline-flex items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white ">
                                        Kosárba</button>
                                @endif
                                @if (!$product->stock)
                                    <div
                                        class="bg-secondary-700 cursor-not-allowed inline-flex items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white ">
                                        Kosárba</div>
                                @endif
                            </form>
                        </div>

                        <span class="text-right block font-bold mt-40">
                            @if ($product->stock)
                                <i class="fa-regular fa-circle-check text-green-500 text-xl"></i>
                                <b class="mr-2 text-green-500">Készleten(/db.) {{ $product->stock }} darab</b>
                            @else
                                <i class="fa-regular fa-circle-xmark text-red-500 text-xl"></i>
                                <b class="mr-2 text-red-500">A termék jelenleg nincs készleten. </b>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
    </section>
    <!-- Section: Design Block -->
</x-layout>
