<div
    class="my-4  before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500">

    <h1 class="mb-10 text-3xl font-bold">Kapcsolatfelvétel</h1>
</div>
<form action="{{ route('contact.store') }}" method="POST" class="lg:max-w-3xl">
    @csrf
    <!-- Separator between social media sign in and email/password sign in -->

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
    <!-- message input -->
    <div class="relative mb-6" data-twe-input-wrapper-init>
        <textarea maxlength="255" rows="5" cols="50" value="{{ old('message') }}"
            style="background-color: light-dark(rgb(232, 240, 254), rgba(70, 90, 126, 0.4)) !important;"
            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
            id="message" placeholder="Üzenet" name="message">{{ old('message') }}
</textarea>
        <label for="message"
            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out -translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
            Üzenet *
        </label>
    </div>
    <div class="relative mb-6" data-twe-input-wrapper-init>
        <div class="error text-red-500">
            @error('message')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-6 flex items-center justify-between">

        <!-- TERMS LINK -->
        <a href="#!" class="font-bold text-primary underline">ÁSZF</a>
    </div>

    <!-- Register button -->
    <div class="text-center lg:text-left">
        <button type="submit"
            class="inline-block w-full rounded bg-primary px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
            data-twe-ripple-init data-twe-ripple-color="light">
            Küldés
        </button>
    </div>
</form>
