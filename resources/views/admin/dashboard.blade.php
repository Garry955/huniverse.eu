<!-- component -->
<x-admin-layout>

    <!-- Table -->
    <div class="bg-white rounded-lg p-4 shadow-md my-4">
        <div class="p-3 w-full">
            <div class="head">
                <div class="px-4 flex justify-between flex-row py-2 text-left border-b-2 w-full">
                    <h2 class="text-2xl mb-2 font-bold text-gray-600">Termékek</h2>
                    <a href="{{ route('product.create') }}" class="text-2xl mb-2 font-bold text-primary"><i
                            class="fa-regular fa-square-plus mr-2"></i>Új
                        termék
                    </a>
                </div>
            </div>
            <div class="contents mt-5">
                <div class="p-3 row border-b w-full">

                    <!-- component -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-200 border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                                                    #ID
                                                </th>
                                                <th scope="col"
                                                    class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                                                    Kép
                                                </th>
                                                <th scope="col"
                                                    class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                                                    Név
                                                </th>
                                                <th scope="col"
                                                    class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                                                    Ár(/db.)
                                                </th>
                                                <th scope="col"
                                                    class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                                                    Készlet
                                                </th>
                                                <th scope="col"
                                                    class="text-xl text-center font-bold text-gray-900 px-6 py-4 text-left">
                                                    Műveletek
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr
                                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900">
                                                        {{ $product->id }}</td>
                                                    <td
                                                        class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <img src="{{ $product->image ? asset($product->image) : asset('images/no-image.png') }}"
                                                            alt="product-image" class="w-[52px]" />

                                                    </td>
                                                    <td
                                                        class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->name }}
                                                    </td>
                                                    <td
                                                        class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->price }} Ft
                                                    </td>
                                                    <td
                                                        class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->stock }} db.
                                                    </td>
                                                    <td class="text-center text-2xl">
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="mr-8"><i
                                                                class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                        <form class="inline-block"
                                                            action="{{ route('product.destroy', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"><i
                                                                    class="fa-solid fa-trash-can text-red-500"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            @empty
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
</x-admin-layout>
