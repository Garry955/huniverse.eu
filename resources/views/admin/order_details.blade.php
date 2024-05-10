<x-admin-layout>
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
        <p class="text-xl mb-3">Megendelő neve: <b>{{ $order->customer_name }}</b></p>
        <p class="text-xl mb-3">Megendelő email-címe: <b>{{ $order->customer_email }}</b></p>
        <p class="text-xl mb-3">Megjegyzés: <b>{{ $order->customer_comment }}</b></p>
        <p class="text-xl mb-5">Rendelt termékek:</p>
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
        <form action="{{ route('order.destroy', $order->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit"
                class="inline-block rounded bg-red-500 mt-5 w-1/3 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-red-600 hover:shadow-primary-2 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                data-twe-ripple-init data-twe-ripple-color="light">
                Rendelés törlése
            </button>
        </form>
    </div>

</x-admin-layout>
