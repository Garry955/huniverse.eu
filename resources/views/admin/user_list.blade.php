<!-- component -->
<x-admin-layout>
    <!-- Table -->
    <div class="bg-white rounded-lg p-4 shadow-md my-4">
        <div class="pl-3 head">
            <div class="px-4 flex justify-between flex-row py-2 text-left border-b-2 w-full">
                <h2 class="text-2xl mb-2 font-bold text-gray-600">Felhasználók</h2>
                <a href="{{ route('admin.createUser') }}" class="text-2xl mb-2 font-bold text-[#f57425]"><i
                        class="fa-regular fa-square-plus mr-2"></i><span class="hidden lg:inline-block">Új
                        felhasználó</span>
                </a>
            </div>
        </div>
        <div class="p-3 w-full overflow-x-scroll  lg:overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            #ID
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Regisztráció dátuma
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Név
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            E-mail címe
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Telefonszám
                        </th>
                        <th scope="col" class="text-xl font-bold text-gray-900 px-6 py-4 text-left">
                            Cím
                        </th>
                        <th scope="col" class="text-xl text-center font-bold text-gray-900 px-6 py-4">
                            Műveletek
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <x-admin-list>
                        @forelse ($users as $user)
                            <tr
                                class="{{ $user->is_admin ? 'bg-red-300 hover:bg-red-200' : 'bg-white hover:bg-gray-200' }} border-b transition duration-300 ease-in-out ">
                                <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900">
                                    <a href="{{ route('admin.editUser', $user->id) }}"
                                        class="lg:hidden absolute z-10 top-0 bottom-0 left-0 right-0"></a>
                                    {{ $user->id }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $user->created_at }}
                                </td>
                                <td class="text-xl font-bold text-gray-900 px-6 py-4 whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $user->phone }}
                                </td>
                                <td class="text-xl text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $user->address }}
                                </td>
                                <td class="text-center text-2xl">
                                    <a href="{{ route('admin.editUser', $user->id) }}" class="mr-8"><i
                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                    <form class="inline-block" action="{{ route('admin.deleteUser', $user->id) }}"
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
