    <x-admin-layout>
        <section class="h-screen container w-full  lg:w-auto mx-auto">
            <div class="h-full">
                <div class="flex h-full w-full lg:flex-wrap items-center justify-center lg:justify-between">
                    <!-- Left column container with background-->
                    <div class="shrink-1 w-full mb-12 grow-0 basis-auto lg:mb-0 lg:w-3/4 mx-auto">
                        <form action="{{ route('admin.authenticate') }}" id="admin_login_form">
                            @csrf
                            <!-- Separator between social media sign in and email/password sign in -->
                            <div
                                class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                                <p class="mx-4 text-center font-semibold dark:text-white text-2xl mb-20">
                                    Admin Belépés
                                </p>
                            </div>

                            <!-- Email input -->
                            <div class="relative mb-6" data-twe-input-wrapper-init>
                                <input type="text"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                    id="email" placeholder="E-mail cím" name="email" />
                                <label for="email"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                    E-mail cím
                                </label>
                            </div>

                            <!-- Password input -->
                            <div class="relative mb-6" data-twe-input-wrapper-init>
                                <input type="password"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                    id="password" placeholder="Password" name="password" />
                                <label for="password"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                    Jelszó
                                </label>
                            </div>
                            <div class="relative mb-6" data-twe-input-wrapper-init>
                                <div class="error text-red-500">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <!-- Login button -->
                            <div class="text-center lg:text-left">
                                <button type="submit"
                                    class="inline-block w-full rounded bg-primary px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                    data-twe-ripple-init data-twe-ripple-color="light">
                                    Belépés
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </x-admin-layout>
