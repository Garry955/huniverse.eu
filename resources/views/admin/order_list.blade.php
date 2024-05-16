<!-- component -->
<x-admin-layout>
    <!-- Table -->
    <div class="bg-white rounded-lg p-4 shadow-md my-4">
        <div class="head pl-3">
            <div class="px-4 flex justify-between flex-row py-2 text-left border-b-2 w-full">
                <h2 class="text-2xl mb-2 font-bold text-gray-600">Rendelések</h2>
            </div>
        </div>
        <div class="p-3 w-full overflow-x-scroll">
            <table class="min-w-full">
                <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            #ID
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Dátum
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Név
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Rendelés összege
                        </th>
                        <th scope="col" class="text-xl text-center font-bold text-gray-900 px-6 py-4">
                            Műveletek
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <x-admin-list>
                        @forelse ($orders as $order)
                            <tr
                                class="bg-white border-b relative transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900">
                                    <a href="{{ route('order.details', $order->id) }}"
                                        class="absolute z-10 top-0 bottom-0 left-0 right-0"></a>
                                    {{ $order->id }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $order->created_at }}
                                </td>
                                <td class="text-xl font-bold text-gray-900 px-6 py-4 whitespace-nowrap">
                                    {{ $order->customer_name }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $order->order_total }} Ft
                                </td>
                                <td class="text-center text-2xl relative z-30">
                                    <a href="{{ route('order.details', $order->id) }}" class="mr-8"><i
                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                    <form class="inline-block" action="{{ route('order.destroy', $order->id) }}"
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
                    </x-admin-list>
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
