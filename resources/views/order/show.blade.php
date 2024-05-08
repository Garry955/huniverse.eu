<x-layout>
    <!-- component -->
    {{-- 'cartTotal' => $cartTotal,
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'cartID' => $cartID --}}
    <style>
        @layer utilities {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>
    <div class="mb-20 pt-20 container mx-auto">
        <div class="mx-auto justify-center px-6 md:flex  xl:px-0">
            <div class="rounded-lg md:w-3/4">
                <div class="mb-12 lg:w-3/4">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="cart_items" id="cart_items" value="{{ $cartItems }}" />
                        <input type="hidden" name="order_total" id="cart_total" value="{{ $totalPrice }}" />
                        <input type="hidden" name="cart_id" id="cart_id" value="{{ $cartID }}" />
                        <!-- Separator between social media sign in and email/password sign in -->
                        <div
                            class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                            <h1 class="mx-4 mb-0 text-center font-semibold dark:text-white text-2xl">
                                Adatok megadása
                            </h1>
                        </div>

                        <!-- Name input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="text" value="{{ auth()->user() ? auth()->user()->name : old('name') }}"
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
                        <!-- Email input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="text" value="{{ auth()->user() ? auth()->user()->email : old('email') }}"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="email" placeholder="E-mail cím" name="email" />
                            <label for="email"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                E-mail cím *
                            </label>
                        </div>
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <div class="error text-red-500">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Phone input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="text" value="{{ auth()->user() ? auth()->user()->phone : old('phone') }}"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="phone" placeholder="Telefonszám" name="phone" />
                            <label for="phone"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Telefonszám
                            </label>
                        </div>

                        <!-- Address input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="text"
                                value="{{ auth()->user() ? auth()->user()->address : old('address') }}"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="address" placeholder="Cím" name="address" />
                            <label for="address"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Cím
                            </label>
                        </div>

                        <!-- Comment input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <textarea maxlength="255" rows="5" cols="50" value="{{ old('comment') }}"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="comment" placeholder="Megjegyzés" name="comment">
                            </textarea>
                            <label for="comment"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Megjegyzés
                            </label>
                        </div>

                        <div class="mb-6 flex items-center justify-between">

                            <!-- TERMS LINK -->
                            <a href="#!" class="font-bold text-blue-500">ÁSZF</a>
                        </div>
                        @if (!auth()->user())
                            <div class="mb-5 block min-h-[1.5rem] ps-[1.5rem]">
                                <input
                                    class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-primary dark:checked:bg-primary"
                                    type="checkbox" value="register" id="register" />
                                <label class="inline-block ps-[0.15rem] hover:cursor-pointer" for="register">
                                    Rendeléssel regisztrálok
                                </label>
                            </div>
                        @endif

                        <!-- Register button -->
                        <div class="text-center lg:text-left">
                            <button type="submit"
                                class="inline-block w-full rounded bg-primary px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                data-twe-ripple-init data-twe-ripple-color="light">
                                Megrendelés
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-2/5 ml-0">
                <h1 class="mb-5 text-2xl font-bold">Kosár tartalma</h1>
                <div class="rounded-lg mb-10">
                    @forelse ($cartItems as $item)
                        <div class="justify-between bg-white p-6 border-b-2 border-solid sm:flex sm:justify-start">
                            <img src="{{ $item->product->image ? asset($item->product->image) : asset('images/no-image.png') }}"
                                alt="product-image" class="rounded-lg h-[115px] w-auto" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">{{ $item->product->name }}</h2>
                                    <p class="mt-1 text-xs text-gray-700">{{ $item->product->description }}</p>
                                    <b class="mt-1 text-xs text-gray-700">Ár: {{ $item->product->price }} Ft/db</b>
                                    <p class="mt-1 text-xs text-gray-700">Mennyiség: {{ $item->quantity }} Ft/db</p>
                                    <p class="mt-1 text-xs text-gray-700">összeg:
                                        {{ $item->quantity * $item->product->price }} Ft/db
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5 class="font-bold">Jelenleg a kosár üres</h5>
                        <a href="{{ route('product.index') }}">Vissza a vásárláshoz</a>
                    @endforelse
                </div>
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Teljes összeg</p>
                    <p class="text-gray-700">{{ $totalPrice }} Ft</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Fizetendő</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold">{{ $totalPrice }} Ft</p>
                        <p class="text-sm text-right text-gray-700">Áfával</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
