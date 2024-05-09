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
    <div class="mb-32 mt-20 pt-20 container mx-auto">
        <h1 class="mb-10 text-3xl font-bold">Sikeres megrendelés</h1>
        @if (session()->has('orderId'))
            <h3 class="mb-10 text-xl font-bold">Rendelés azonosító: #{{ session('orderId') }}</h3>
        @endif
        <div class="mx-auto justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg w-full">
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur libero, blanditiis nobis ex
                    maxime quidem accusamus, ad nulla eius laudantium nesciunt commodi fuga. Vitae nam cum placeat
                    commodi saepe neque.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur libero, blanditiis nobis ex
                    maxime quidem accusamus, ad nulla eius laudantium nesciunt commodi fuga. Vitae nam cum placeat
                    commodi saepe neque.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur libero, blanditiis nobis ex
                    maxime quidem accusamus, ad nulla eius laudantium nesciunt commodi fuga. Vitae nam cum placeat
                    commodi saepe neque.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur libero, blanditiis nobis ex
                    maxime quidem accusamus, ad nulla eius laudantium nesciunt commodi fuga. Vitae nam cum placeat
                    commodi saepe neque.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur libero, blanditiis nobis ex
                    maxime quidem accusamus, ad nulla eius laudantium nesciunt commodi fuga. Vitae nam cum placeat
                    commodi saepe neque.
                </p>
                <a href="/" class="text-2xl text-primary mb-32 mt-20 block font-bold">Vissza
                    a
                    főoldalra</a>
            </div>

        </div>
    </div>
</x-layout>
