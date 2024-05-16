<!-- component -->
<x-admin-layout>

    <!-- Table -->
    <div class="bg-white rounded-lg p-4 shadow-md my-4">
        <div class="head pl-3">
            <div class="px-4 flex justify-between flex-row py-2 text-left border-b-2 w-full">
                <h2 class="text-2xl mb-2 font-bold text-gray-600">Aloldalak</h2>
                <a href="{{ route('landing.create') }}" class="text-2xl mb-2 font-bold text-[#f57425]"><i
                        class="fa-regular fa-square-plus mr-2"></i><span class="hidden lg:inline-block">Új aloldal</span>
                </a>
            </div>
        </div>
        <div class="p-3 w-full overflow-x-scroll">
            <table class="min-w-full">
                <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Oldal neve
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            URL
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Oldal főcím
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Oldal megjelenítés
                        </th>
                        <th scope="col" class="text-xl text-center font-bold text-gray-900 px-6 py-4">
                            Műveletek
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <x-admin-list>
                        @forelse ($landings as $landing)
                            <tr
                                class="bg-white border-b relative transition duration-300 ease-in-out hover:bg-gray-100 {{ $landing->name == 'order-success' ? 'bg-red-300 hover:bg-red-200' : '' }}">
                                <td class="text-xl font-bold text-gray-900 px-6 py-4 whitespace-nowrap">
                                    {{ $landing->name }}

                                    <a href="{{ route('landing.edit', $landing->id) }}"
                                        class="absolute z-10 top-0 bottom-0 left-0 right-0"></a>
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    /{{ $landing->url }}/
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $landing->lead }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $landing->place == '' ? 'sehol' : $landing->place }}
                                    {{ $landing->place == 'both' ? 'footer+header' : $landing->place }}
                                </td>
                                <td class="text-center text-2xl relative z-30"><a
                                        href="{{ route('landing.edit', $landing->id) }}" class="mr-8"><i
                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                    <form class="inline-block" action="{{ route('landing.destroy', $landing->id) }}"
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
