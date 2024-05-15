<x-layout>

    <div class="mb-32 lg:pt-32 min-h-screen container mx-auto">
        <div class="mx-auto px-6 lg:w-3/4">
            @if ($page->name == 'order-success')
                <a href={{ route('product.index') }}
                    class=" font-bold text-3xl mb-10 block lg:text-xl lg:mt-20 text-[#f57425] lg:inline-block">
                    <i class="fa-solid fa-angles-left mr-1"></i>Vissza a
                    termékekhez </a>
            @endif
            <div class="mx-auto w-full mb-10">
                <h2 class="heading text-4xl font-bold mb-5">{{ $page->lead }}</h2>
                <p class="block mb-10">{!! $page->content !!}</p>
            </div>
            @if ($page->url == 'kapcsolat')
                <x-contact_form></x-contact_form>
            @endif
        </div>
    </div>
</x-layout>
