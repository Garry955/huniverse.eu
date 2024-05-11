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
    <div class="mb-32 pt-20 container mx-auto">
        <div class="mx-auto px-6 w-3/4">
            <div class="flex p-12">
                <div class="mx-auto w-full">
                    <h2 class="heading text-4xl font-bold mb-5">{{ $page->lead }}</h2>
                    <p class="block mb-10">{{ $page->content }}</p>
                    <x-contact_form></x-contact_form>
                </div>
            </div>

        </div>
    </div>
</x-layout>
