<x-app-layout>
    @php
        $colors = ['White', 'Black', 'Gray'];
        $sizes = ['S', 'M', 'L', 'XL'];
    @endphp

    <div class="max-w-[448px] mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-1 lg:gap-x-8 lg:items-start">
            {{-- Product Image --}}
            <div class="flex-shrink-0 overflow-hidden rounded-lg">
                <img class="h-64 w-full object-cover" src="{{ asset('path/to/your/image.jpg') }}" alt="Product">
            </div>

            {{-- Product Details --}}
            <div class="mt-6">
                <h1 class="text-xl font-extrabold tracking-tight text-gray-900">Premium T-Shirt</h1>
                <div class="mt-2 flex items-center">
                    <div class="flex items-center">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 flex-shrink-0 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="ml-2 text-sm text-gray-500">(124 reviews)</p>
                </div>
                <div class="mt-3">
                    <p class="text-xl text-gray-900">$29.99</p>
                </div>
                
                {{-- Color Selection --}}
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-900">Color</h3>
                    <div class="mt-2 flex space-x-2">
                        @foreach ($colors as $color)
                            <button
                                class="w-8 h-8 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                style="background-color: {{ strtolower($color) }};"
                                onclick="selectColor('{{ $color }}')"
                            ></button>
                        @endforeach
                    </div>
                </div>

                {{-- Size Selection --}}
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-900">Size</h3>
                    <div class="mt-2 flex space-x-2">
                        @foreach ($sizes as $size)
                            <button
                                class="px-3 py-1 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-gray-200 text-gray-900"
                                onclick="selectSize('{{ $size }}')"
                            >
                                {{ $size }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="mt-8">
                    <button
                        type="button"
                        class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>

        {{-- Product Tabs --}}
        <div class="mt-12">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-4 justify-center" aria-label="Tabs">
                    @foreach (['Description', 'Details', 'Reviews'] as $tab)
                        <button
                            class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="setActiveTab('{{ strtolower($tab) }}')"
                        >
                            {{ $tab }}
                        </button>
                    @endforeach
                </nav>
            </div>
            <div class="mt-6 prose prose-sm max-w-none">
                <div id="description" class="hidden">
                    <p>
                        Our Premium T-Shirt is crafted from 100% organic cotton for ultimate comfort and durability. 
                        Perfect for everyday wear, this versatile shirt features a classic cut and is available in multiple colors and sizes.
                    </p>
                </div>
                <div id="details" class="hidden">
                    <ul>
                        <li>100% organic cotton</li>
                        <li>Pre-shrunk fabric</li>
                        <li>Unisex fit</li>
                        <li>Machine washable</li>
                        <li>Made in USA</li>
                    </ul>
                </div>
                <div id="reviews" class="hidden">
                    <p>Customer Reviews:</p>
                    <ul>
                        <li>"Great quality and fit!" - John D.</li>
                        <li>"Love the soft fabric!" - Sarah M.</li>
                        <li>"My new favorite t-shirt" - Mike R.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    function selectColor(color) {
        console.log('Selected color:', color);
    }

    function selectSize(size) {
        console.log('Selected size:', size);
    }

    function setActiveTab(tabName) {
        document.querySelectorAll('.prose > div').forEach(el => el.classList.add('hidden'));
        document.getElementById(tabName).classList.remove('hidden');

        document.querySelectorAll('nav button').forEach(el => {
            el.classList.remove('border-indigo-500', 'text-indigo-600');
            el.classList.add('border-transparent', 'text-gray-500');
        });
        event.target.classList.remove('border-transparent', 'text-gray-500');
        event.target.classList.add('border-indigo-500', 'text-indigo-600');
    }

    setActiveTab('description');
    </script>
    @endpush
</x-app-layout>
