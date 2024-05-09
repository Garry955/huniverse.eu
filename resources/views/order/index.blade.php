<x-layout>
    <div class="mb-20 pt-20 container mx-auto">
        <!-- Right column container -->
        <div class="mb-12 md:mb-10">
            <!-- Separator between social media sign in and email/password sign in -->
            <div
                class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                <p class="mx-4 mb-5 text-center font-semibold dark:text-white text-2xl">
                    Rendeléseim
                </p>
            </div>
            <div class="mt-6 rounded-lg border bg-white p-6 shadow-md md:mt-0 ml-0 lg:w-3/4 lg:mx-auto">
                <div class="rounded-lg mb-10">
                    @forelse ($orders as $item)
                        <div class="bg-white p-6 border-b-2 border-solid relative">
                            <a href="{{ route('order.show', $item->id) }}"
                                class="absolute top-0 left-0 right-0 bottom-0 z-10"></a>
                            <div class="sm:ml-4 sm:w-full">
                                <div class="mt-5 sm:mt-0">
                                    <b class="mt-1 text-gray-700">Rendelés azonosító:
                                        {{ $item->id }}</b>
                                    <p class="mt-1">Rendelés dátum: {{ $item->created_at }}</p>
                                    <p>Rendelés összeg: {{ $item->order_total }} Ft</p>
                                    <i
                                        class=" absolute -z-0 top-[50%] translate-y-[-50%] right-10 text-4xl text-primary font-bold fa-solid fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5 class="font-bold">Még nincs leadott rendelés.</h5>
                        <a href="{{ route('product.index') }}" class="text-xl text-primary mt-5 block font-bold">Vissza
                            a
                            vásárláshoz</a>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="mb-10 block">
            {{ $orders->links() }}
        </div>
        <a href="{{ route('product.index') }}" class="text-2xl text-primary mb-32 block font-bold">Vissza a
            vásárláshoz</a>
    </div>
    </div>
</x-layout>
