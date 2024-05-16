<x-admin-layout>
    <div class="mb-12 md:mb-0 xl:w-3/4">
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Separator between social media sign in and email/password sign in -->
            <div
                class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">
                <p class="mx-4 mb-0 text-center font-semibold dark:text-white text-2xl">
                    Új dia felvitel
                </p>
            </div>
            <!-- Image input -->
            <p class="mb-5 text-xl text-red-500 font-bold">A képet célszerű 16:9-es formátumban kiválasztani!</p>
            <div class="lg:flex lg:flex-row  mb-10">
                <div class="w-2/5 rounded-l-lg p-4 flex flex-col lg:justify-center lg:items-center ">
                    <label
                        class="cursor-pointer hover:opacity-80 inline-flex items-center shadow-md my-2 px-2 py-2 bg-primary text-gray-50 border border-transparent
                rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-primary-600 active:bg-primary focus:outline-none 
               focus:border-primary focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        for="slider_image">
                        Kép kiválasztása
                        <input id="slider_image" name="slider_image" class="text-sm cursor-pointer w-36 hidden"
                            type="file">
                    </label>
                </div>
                <div
                    class="max-w-[620px] lg:max-w-none lg:w-3/5 xl:ml-20 relative order-first md:order-last md:h-auto flex justify-center items-center border border-dashed border-gray-400 col-span-2 m-2 rounded-lg bg-no-repeat bg-center bg-origin-padding bg-cover">
                    <span class="text-gray-400 w-full overflow-hidden m-0 pt-[56.25%] relative">
                        <img id="preview" src="#" alt="slider_image"
                            class="absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%]"
                            style="display:none;" />

                    </span>
                </div>
            </div>

            <!-- Lead input -->
            <div class="relative mb-6" data-twe-input-wrapper-init>
                <input type="text" value="{{ old('lead') }}"
                    style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="lead" placeholder="Főcím" name="lead" />
                <label for="description"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                    Főcím
                </label>
            </div>
            <div class="relative mb-6" data-twe-input-wrapper-init>
                <div class="error text-red-500">
                    @error('lead')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- text input -->
            <div class="relative mb-6" data-twe-input-wrapper-init>
                <textarea maxlength="255" rows="5" cols="50" value="{{ old('text') }}"
                    style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="text" placeholder="Szöveg" name="text">{{ old('text') }}
</textarea>
                <label for="text"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                    Szöveg
                </label>
            </div>
            <!-- Register button -->
            <div class="text-center lg:text-left">
                <button type="submit"
                    class="inline-block rounded bg-primary px-16 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                    data-twe-ripple-init data-twe-ripple-color="light">
                    <i class="fa-regular fa-square-plus text-xl mb-[-1px] mr-2"></i>Dia felvétele </button>
            </div>
        </form>
    </div>
</x-admin-layout>
<script>
    slider_image.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = slider_image.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
