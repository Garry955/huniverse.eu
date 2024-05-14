<!-- component -->
<x-admin-layout>

    <!-- Table -->
    <div class="bg-white rounded-lg p-4 shadow-md my-4">
        <div class="p-3 w-full">
            <div class="head">
                <div class="px-4 flex justify-between flex-row mb-5 py-2 text-left border-b-2 w-full">
                    <h2 class="text-2xl mb-2 font-bold text-gray-600">Termékcsoportok</h2>
                    <span id="new_group" class="cursor-pointer text-2xl mb-2 font-bold text-primary"><i
                            class="fa-regular fa-square-plus mr-2"></i>Új
                        termékcsoport
                        </a>
                </div>
            </div>
            <div id="add_group" class="mb-10 lg:w-1/2 {{ session()->has('visible') ? '' : 'hidden' }}">
                <!-- Separator between social media sign in and email/password sign in -->
                <div
                    class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                    <p class="mx-4 mb-0 text-center font-semibold dark:text-white text-2xl">
                        Termékcsoport hozzáadása
                    </p>
                </div>
                <form action="{{ route('group.store') }}" method="POST">
                    @csrf
                    <!-- Name input -->
                    <div class="relative mb-6" data-twe-input-wrapper-init>
                        <input type="text" value="{{ old('name') }}"
                            style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                            id="name" placeholder="Név" name="name" />
                        <label for="name"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                            Név *
                        </label>
                    </div>
                    <div class="relative mb-6" data-twe-input-wrapper-init>
                        <div class="error text-red-500">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!-- Link input -->
                    <div class="relative mb-6" data-twe-input-wrapper-init>
                        <input type="text" value="{{ old('link') }}"
                            style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                            id="link" placeholder="Név" name="link" />
                        <label for="link"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                            Hivatkozás
                        </label>
                    </div>
                    <!-- Add group button -->
                    <div class="text-center lg:text-left">
                        <button type="submit"
                            class="inline-block w-full rounded bg-primary px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-ripple-init data-twe-ripple-color="light">
                            Hozzáadás
                        </button>
                    </div>
                </form>
            </div>
            @forelse($groups as $group)
                <div class="inline-block px-5 mb-3 py-3 mr-5 rounded-lg bg-blue-200">
                    <span class="font-bold">
                        {{ $group->name ?? '' }}

                    </span>
                    <form class="inline-block" action="{{ route('group.destroy', $group->id ?? '') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa-solid fa-trash-can text-red-500 ml-3"></i></button>
                    </form>
                </div>
            @empty
            @endforelse
        </div>
    </div>

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
            <table class="min-w-full">
                <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            #ID
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Kép
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Név
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Ár(/db.)
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Készlet
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Termékcsoport
                        </th>
                        <th scope="col" class="text-xl text-center font-bold text-gray-900 px-6 py-4">
                            Műveletek
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <x-admin-list>
                        @forelse ($products as $product)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900">
                                    {{ $product->id }}</td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $product->image ? asset('/storage/products/' . $product->image) : asset('images/no-image.png') }}"
                                        alt="product-image" class="w-[142px]" />

                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->name }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->price }} Ft
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->stock }} db.
                                </td>
                                <td class="text-xl font-bold text-gray-900 px-6 py-4 whitespace-nowrap">
                                    {{ $product->group->name ?? '' }}
                                </td>
                                <td class="text-center text-2xl">
                                    <a href="{{ route('product.edit', $product->id) }}" class="mr-8"><i
                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                    <form class="inline-block" action="{{ route('product.destroy', $product->id) }}"
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
<script>
    var addGroupButton = document.getElementById('new_group');
    var addGroupForm = document.getElementById('add_group');
    addGroupButton.addEventListener("click", function() {
        addGroupForm.classList.toggle("hidden");
    });
</script>
