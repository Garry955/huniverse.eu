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
    <div class=" container mx-auto min-h-screen">
        <h1 class="mb-10 text-3xl font-bold">Üzenet - {{ $contact->name }}</h1>
        <div class="mb-40">
            <div class="mb-2">
                <p class="text-gray-700 mt-3 text-xl">Üzenet küldője: <b>{{ $contact->name }}</b></p>
                <p class="text-gray-700 mt-3 text-xl">E-mail címe: <b>{{ $contact->email }}</b></p>
                <p class="text-gray-700 mt-3 text-xl">Üzenet: <b>{{ $contact->message }}</b></p>
            </div>
        </div>
    </div>
</x-admin-layout>
