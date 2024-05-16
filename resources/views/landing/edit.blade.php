<x-admin-layout>
    <div class="mb-12 md:mb-0 lg:w-3/4">
        <form action="{{ route('landing.update', $landing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Separator between social media sign in and email/password sign in -->
            <div
                class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                <p class="mx-4 mb-0 text-center font-semibold dark:text-white text-2xl">
                    Aloldal: <b>{{ $landing->name }}</b> tartalom szerkesztése
                </p>
            </div>
            <!-- name input -->
            <div class="mt-10 lg:ml-3">
                <span class="text-red-500 text-sm font-bold">Az oldal nevébe ne használj speciális karaktereket!</span>
            </div>
            <div class="relative mb-2 mt-2" data-twe-input-wrapper-init>
                <input type="text" {{ $landing->name == 'order-success' ? 'disabled' : '' }}
                    value="{{ $landing->name ? $landing->name : old('name') }}"
                    style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="name" placeholder="Oldal neve" name="name" />
                <label for="name"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                    Oldal neve *
                </label>
            </div>
            <div class="relative mt-5 ml-3 font-bold" data-twe-input-wrapper-init>
                Oldal url-je (automatikusan generált):<b class="text-primary"> /{{ $landing->url }}/</b>
            </div>
            <div class="relative mb-6" data-twe-input-wrapper-init>
                <div class="error text-red-500">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!-- Lead input -->
            <div class="relative mb-6 mt-10" data-twe-input-wrapper-init>
                <input type="text" value="{{ $landing->lead ? $landing->lead : old('lead') }}"
                    style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="lead" placeholder="Oldal főcím" name="lead" />
                <label for="lead"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                    Oldal főcíme *
                </label>
            </div>
            <div class="relative mb-6" data-twe-input-wrapper-init>
                <div class="error text-red-500">
                    @error('lead')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- TextArea input --}}
            <textarea id="tinymce" class="mb-10" name="content">{{ $landing->content }}</textarea>
            <div class="relative mb-6" data-twe-input-wrapper-init>
                <div class="error text-red-500">
                    @error('content')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- select --}}
            @if ($landing->name !== 'order-success')
                <div class="relative mb-10" data-twe-input-wrapper-init>
                    <label for="" class="font-bold">
                        Megjelenítés menüben
                    </label>
                    <select id="place" name="place"
                        style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                        class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value='' {{ !$landing->place ? 'selected' : '' }}>Sehol</option>
                        <option value="header" {{ $landing->place == 'header' ? 'selected' : '' }}>Fejléc menüben
                        </option>
                        <option value="footer" {{ $landing->place == 'footer' ? 'selected' : '' }}>Lábléc menüben
                        </option>
                        <option value="both" {{ $landing->place == 'both' ? 'selected' : '' }}>Mindenhol</option>
                    </select>
                </div>
            @endif

            <!-- Register button -->
            <div class="text-center lg:text-left">
                <button type="submit"
                    class="inline-block rounded bg-primary lg:px-4 pb-2 pt-3 w-1/2 lg:w-1/3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                    data-twe-ripple-init data-twe-ripple-color="light">
                    <i class="fa-solid fa-pen-to-square text-xl mb-[-1px] mr-2"></i>Aloldal módosítása </button>
            </div>
        </form>
    </div>
</x-admin-layout>
<x-head.tinymce-config />
