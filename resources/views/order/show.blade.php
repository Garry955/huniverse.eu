<x-layout>
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
        <h1 class="mb-10 text-3xl font-bold">Rendelés #{{ $order->id }}</h1>
        <div class="mx-auto justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg w-full">
                @foreach ($orderItems as $item)
                    <div class="justify-between bg-white p-6 shadow-md sm:flex sm:justify-start">
                        <img src="{{ $item->product->image ? asset($item->product->image) : asset('images/no-image.png') }}"
                            alt="product-image" class="w-full rounded-lg sm:w-40" />
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <a href="{{ route('product.show', $item->product->id) }}"
                                    class="text-lg font-bold text-gray-900">{{ $item->product->name }}</a>
                                <p class="mt-1 text-sm text-gray-700">{{ $item->product->description }}</p>
                                <b class="mt-1 text-sm text-gray-700">Ár: {{ $item->product->price }} Ft/db</b>

                            </div>
                            <div class="pt-20 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="border-gray-100">

                                </div>
                                <div class="text-right">
                                    <p class="inline-block text-xl">Részösszeg
                                        <b>{{ $item->product->price * $item->quantity }} Ft</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('product.index') }}" class="text-2xl text-primary mb-32 mt-10 block font-bold">Vissza
                    a
                    vásárláshoz</a>
            </div>
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Termékek összesen</p>
                    <p class="text-gray-700">{{ $order->order_total }} Ft</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Teljes összeg</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold">{{ $order->order_total }} Ft</p>
                        <p class="text-sm text-right text-gray-700">Áfával</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
