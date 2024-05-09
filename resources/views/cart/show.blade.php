<x-layout>
    <!-- component -->
    {{-- 'cartTotal' => $cartTotal,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'cartID' => $cartID --}}
    <style>
        @layer utilities {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>
    <div class="mb-20 pt-20 container mx-auto">
        <h1 class="mb-10 text-3xl font-bold">Kosár</h1>
        <div class="mx-auto justify-center px-6 md:flex md:space-x-6 xl:px-0">
            @if ($totalPrice)
                <div class="rounded-lg md:w-2/3">
                @else
                    <div class="rounded-lg w-full">
            @endif
            @forelse ($cartItems as $item)
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                    <img src="{{ $item->product->image ? asset($item->product->image) : asset('images/no-image.png') }}"
                        alt="product-image" class="w-full rounded-lg sm:w-40" />
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 class="text-lg font-bold text-gray-900">{{ $item->product->name }}</h2>
                            <p class="mt-1 text-xs text-gray-700">{{ $item->product->description }}</p>
                            <b class="mt-1 text-xs text-gray-700">Ár: {{ $item->product->price }} Ft/db</b>
                        </div>
                        <div class="pt-20 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                            <div class="border-gray-100">
                                <form action="{{ route('cart.updateItem', $cartID) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->product->id }}" />
                                    <p class="inline-block mr-2 font-bold">Mennyiség</p>
                                    <input type="number" id="quantity" name="quantity" min="0"
                                        max="{{ $item->product->stock }}" step="1" value="{{ $item->quantity }}"
                                        class="border-form-stroke text-body-color placeholder-body-color focus:border-primary active:border-primary rounded-lg border-[1.5px] py-2 px-5 font-medium outline-none transition disabled:cursor-default disabled:bg-[#F5F7FD]" />
                                    <button type="submit"
                                        class="bg-primary inline-flex items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white ">
                                        Módosít</button>
                                </form>
                            </div>
                            <div class="text-right">
                                <p class="inline-block text-xl">Teljes
                                    ár: <b>{{ $item->product->price * $item->quantity }} Ft</b></p>
                                <form class="inline-block ml-5" action="{{ route('cart.deleteItem', $cartID) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->product->id }}" />
                                    <button type="submit"
                                        class="bg-primary inline-flex items-center justify-center rounded-md py-2 px-4 text-center text-base font-normal text-white">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h5 class="w-full text-left mb-10 mt-10 text-2xl font-bold">Jelenleg a kosár üres!</h5>
            @endforelse
            <a href="{{ route('product.index') }}" class="text-2xl text-primary mb-32 block font-bold">Vissza a
                vásárláshoz</a>
        </div>
        <!-- Sub total -->
        @if ($totalPrice)
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Teljes összeg</p>
                    <p class="text-gray-700">{{ $totalPrice }} Ft</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Fizetendő</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold">{{ $totalPrice }} Ft</p>
                        <p class="text-sm text-right text-gray-700">Áfával</p>
                    </div>
                </div>
                <a href="{{ route('order.show') }}" type="submit"
                    class="block text-center mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Adatok
                    megadása</a>

            </div>
        @endif
    </div>
    </div>
</x-layout>
