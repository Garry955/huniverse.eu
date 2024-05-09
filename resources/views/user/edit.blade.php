<x-layout>
    <section class="container mx-auto">
        <div class="">
            <div class="flex flex-wrap mt-20 justify-center lg:justify-between">
                <!-- Left column container with background-->
                <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-5/12 xl:w-5/12">
                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        <!-- Separator between social media sign in and email/password sign in -->
                        <div
                            class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                            <p class="mx-4 mb-0 text-center font-semibold dark:text-white text-2xl">
                                Profil szerkesztése
                            </p>
                        </div>

                        <!-- Name input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="text" value="{{ old('name') ? old('name') : auth()->user()->name }}"
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
                            <input type="text" value="{{ old('email') ? old('email') : auth()->user()->email }}"
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
                            <input type="text" value="{{ old('phone') ? old('phone') : auth()->user()->phone }}"
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
                                value="{{ old('address') ? old('address') : auth()->user()->address }}"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="address" placeholder="Cím" name="address" />
                            <label for="address"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Cím
                            </label>
                        </div>

                        <!-- New Password input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="password"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="new_password" placeholder="Password" name="new_password" />
                            <label for="new_password"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Új Jelszó
                            </label>
                        </div>

                        <!-- New Password repeat -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="password"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="new_password_confirmation" placeholder="Új Jelszó újra"
                                name="new_password_confirmation" />
                            <label for="new_password_confirmation"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Új Jelszó újra
                            </label>
                        </div>
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <div class="error text-red-500">
                                @error('new_password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Old Password input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input type="password"
                                style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="current_password" placeholder="Régi jelszó" name="current_password" />
                            <label for="current_password"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Jelenlegi Jelszó *
                            </label>
                        </div>
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <div class="error text-red-500">
                                @error('current_password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6 flex items-center justify-between">
                            <!-- TERMS LINK -->
                            <a href="#!" class="font-bold text-blue-500">ÁSZF</a>
                        </div>

                        <!-- Register button -->
                        <div class="text-center lg:text-left">
                            <button type="submit"
                                class="inline-block w-full rounded bg-primary px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                data-twe-ripple-init data-twe-ripple-color="light">
                                Adatok módosítása
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right column container -->
                <div class="mb-12 md:mb-10 md:w-8/12 lg:w-5/12 xl:w-5/12">
                    <!-- Separator between social media sign in and email/password sign in -->
                    <div
                        class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                        <p class="mx-4 mb-0 text-center font-semibold dark:text-white text-2xl">
                            Rendeléseim
                        </p>
                    </div>

                    <div class="mt-6 rounded-lg border bg-white p-6 shadow-md md:mt-0 ml-0">
                        <div class="rounded-lg mb-10">
                            @forelse ($orders as $item)
                                <div class="bg-white p-6 border-b-2 border-solid">
                                    {{-- <img src="{{ $item->image ? asset($item->product->image) : asset('images/no-image.png') }}"
                                        alt="product-image" class="rounded-lg h-[115px] w-auto" /> --}}
                                    <div class="sm:ml-4 sm:w-full text-right">
                                        <div class="mt-5 sm:mt-0">
                                            <b class="mt-1 text-gray-700">Rendelés azonosító:
                                                {{ $item->id }}</b>
                                            <p class="mt-1">Rendelés dátum: {{ $item->created_at }}</p>
                                            <p>Rendelés összeg: {{ $item->order_total }} Ft</p>
                                            {{-- <h2 class="text-lg font-bold text-gray-900">{{ $item->product->name }}
                                            </h2>
                                            <p class="mt-1 text-xs text-gray-700">{{ $item->product->description }}
                                            </p>
                                            <b class="mt-1 text-xs text-gray-700">Ár: {{ $item->product->price }}
                                                Ft/db</b>
                                            <p class="mt-1 text-xs text-gray-700">Mennyiség: {{ $item->quantity }}
                                                Ft/db</p>
                                            <p class="mt-1 text-xs text-gray-700">összeg:
                                                {{ $item->quantity * $item->product->price }} Ft/db
                                            </p> --}}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h5 class="font-bold">Még nincs leadott rendelés.</h5>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</x-layout>
