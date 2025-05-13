<div>
    <!-- Kolom Pencarian -->
    <div class="max-w-[448px] mx-auto px-4 mt-2">
        <h1 class="text-2xl font-bold text-gray-900 text-center">Pencarian</h1>
        <form action="/search" method="GET">
            <div class="relative">
                <input type="text" name="query" wire:model.live="search" class="w-full py-2 px-4 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Cari artikel, produk, dll...">
            </div>
        </form>
    </div>

    <!-- Bagian Hasil Pencarian -->
    <div class="max-w-[448px] mx-auto px-4 py-2">
        <!-- Hasil (Dinamis) -->
        <div class="grid grid-cols-3 gap-4 justify-items-center">
            @foreach ($products as $item)
            <!-- Tautan ke halaman produk individual -->
            <a href="/products/{{$item->id}}" class="relative p-2 inline-block w-32 h-60 rounded-s">
                <!-- Ikon Plus -->
                <div class="absolute top-2 right-2">
                    <form wire:submit="send({{$item->id}})">
                        <input type="hidden" value-"1" wire:model.live="id">
                        <button type="submit" class="bg-orange-500 p-1 rounded-full text-white hover:bg-orange-600 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </form>
                </div>

                <img src="storage/{{$item->image_url}}" alt="Produk" class="h-28 w-32 object-cover rounded-sm" loading="lazy">
                <div class="mt-3">
                    @if ($item->discounted_price > 0)
                        <div class="flex items-center mt-2">
                            <span class="text-red-500 font-bold text-[12.5px]">Rp{{number_format($item->discounted_price)}}</span>
                            <span class="ml-2 text-gray-500 line-through text-[10.5px]">Rp{{number_format($item->price)}}</span>
                        </div>
                    @else
                        <p class="text-[12.5px] font-semibold text-gray-800">Rp{{number_format($item->price)}}</p>
                    @endif
                    <p class="text-[10.5px] text-gray-600 mt-1 text-wrap w-32">
                        {{$item->name}}
                    </p>

                    <!-- Rating Bintang -->
                    <div class="flex items-center mt-2">
                        @for ($star = 1; $star <= $item->averageRating; $star++)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                        <span class="ml-1 text-xs text-gray-600">({{$item->averageRating}})</span>
                    </div>
                </div>
                <div class="mt-2 text-[10.5px] text-gray-500">
                    <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-.08.304-.172.603-.276.899" />
                    </svg>
                    {{ $item->viewcount }} kali dilihat
                </div>
            </a>
            @endforeach
        </div>
        
        <!-- Tautan Paginasi -->
        <div class="">
            {{$products->links()}}
        </div>
        <br>
        <br>
        <br>
    </div>
    <script>
        Livewire.on('refreshPage', () => {
            window.location.reload();
        });
    </script>
</div>
