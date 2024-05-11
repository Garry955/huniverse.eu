<!-- component -->
<x-admin-layout>

    <!-- Table -->
    <div class="bg-white rounded-lg p-4 shadow-md my-4">
        <div class="p-3 w-full">
            <div class="head">
                <div class="px-4 flex justify-between flex-row py-2 text-left border-b-2 w-full">
                    <h2 class="text-2xl mb-2 font-bold text-gray-600">Slider diák</h2>
                    <a href="{{ route('slider.create') }}" class="text-2xl mb-2 font-bold text-primary"><i
                            class="fa-regular fa-square-plus mr-2"></i>Új
                        dia
                    </a>
                </div>
            </div>
            <table class="min-w-full">
                <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Kép
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Főcím
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Szöveg
                        </th>
                        <th scope="col" class="text-xl text-center font-bold text-gray-900 px-6 py-4">
                            Műveletek
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <x-admin-list>
                        @forelse ($sliders as $slider)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900">
                                    {{ $slider->id }}</td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $slider->image ? asset('/storage/slider/' . $slider->image) : asset('images/no-image.png') }}"
                                        alt="slider-image" class="w-[142px]" />

                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <p class="whitespace-break-spaces">{{ $slider->lead }}</p>
                                </td>
                                <td
                                    class="text-xl max-w-20 overflow-hidden text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <p class="whitespace-break-spaces">{{ $slider->text }}</p>
                                </td>
                                <td class="text-center text-2xl">
                                    <a href="{{ route('slider.edit', $slider->id) }}" class="mr-8"><i
                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                    <form class="inline-block" action="{{ route('slider.destroy', $slider->id) }}"
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
