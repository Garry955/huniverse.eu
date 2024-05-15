@if ($sliders !== null)
    <div class="scale-110 lg:scale-100">
        <!-- Section: Details -->
        <section class="my-20 max-w-6xl mx-auto">
            <div class="grid lg:max-w-6xl gap-8 items-center">
                <!-- Carousel -->
                <div id="carouselExampleCaptions" class="relative" data-te-carousel-init data-te-carousel-slide>
                    <!--Carousel indicators-->
                    <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                        data-te-carousel-indicators>
                        @forelse($sliders as $k => $slider)
                            @if ($k == 0)
                                <button type="button" data-te-target="#carouselExampleCaptions"
                                    data-te-slide-to="{{ $k }}" data-te-carousel-active
                                    class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-primary bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                    aria-current="true" aria-label="Slide 1"></button>
                            @else
                                <button type="button" data-te-target="#carouselExampleCaptions"
                                    data-te-slide-to="{{ $k }}"
                                    class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-primary bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                    aria-label="Slide 2"></button>
                            @endif
                        @empty
                        @endforelse
                    </div>

                    <!--Carousel items-->
                    <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                        @forelse ($sliders as $i => $slider)
                            @if ($i == 0)
                                <!--First item-->
                                <div class="relative overflow-hidden m-0 pt-[56.25%] float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-active data-te-carousel-item style="backface-visibility: hidden">
                                    <img src="{{ $slider->image ? asset('/storage/slider/' . $slider->image) : asset('images/no-image.png') }}"
                                        class="absolute w-full top-1/2 bottom-1/2 left-1/2 right-1/2 translate-x-[-50%] translate-y-[-50%]"
                                        alt="Slide-{{ $i }}" />
                                    <div
                                        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                                        <h5 class="text-xl">{{ $slider->lead }}</h5>
                                        <p>
                                            {{ $slider->text }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <!--Second item-->
                                <div class="relative overflow-hidden m-0 pt-[56.25%] float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-item style="backface-visibility: hidden">
                                    <img src="{{ $slider->image ? asset('/storage/slider/' . $slider->image) : asset('images/no-image.png') }}"
                                        class="absolute w-full top-1/2 bottom-1/2 left-1/2 right-1/2 translate-x-[-50%] translate-y-[-50%]"
                                        alt="Slide-{{ $i }}" />
                                    <div
                                        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                                        <h5 class="text-xl">Second slide label</h5>
                                        <p>
                                            Some representative placeholder content for the second slide.
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    </div>
                    <!--Carousel controls - prev item-->
                    <button
                        class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-primary opacity-80 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                        type="button" data-te-target="#carouselExampleCaptions" data-te-slide="prev">
                        <span class="inline-block h-8 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </span>
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                    </button>
                    <!--Carousel controls - next item-->
                    <button
                        class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-primary opacity-80 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                        type="button" data-te-target="#carouselExampleCaptions" data-te-slide="next">
                        <span class="inline-block h-8 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </span>
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                    </button>
                </div>
                <!-- Carousel -->
            </div>
        </section>
    </div>
@endif
