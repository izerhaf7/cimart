<div class="relative max-w-[448px] mx-auto">
    <!-- Top Header Navbar -->
    <nav class="bg-white border-b border-gray-200 fixed top-0 inset-x-0 z-50 max-w-[448px] mx-auto shadow-md rounded-lg h-16 mt-2">
        <div class="flex justify-between items-center px-4 py-3">
            <!-- Logo or Branding -->
            <a href="/" class="flex items-center">
                <x-application-logo/>
            </a>

            <!-- Search Button -->
            <a href="/search" class="p-2 flex items-center justify-center hover:text-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20a9 9 0 100-18 9 9 0 000 18zm6-10h.01M21 21l-4.35-4.35"></path>
                </svg>
            </a>
        </div>
    </nav>

    <!-- Content goes here -->
    <div class="pb-10">
        <!-- Your page content here -->
    </div>

    <!-- Bottom Navbar -->
    <nav class="bg-white border-t border-gray-200 fixed bottom-0 inset-x-0 z-50 max-w-[448px] mx-auto shadow-md">
        <div class="grid grid-cols-4 text-center text-gray-500">
            <!-- Home -->
            <a href="/" class="p-2 flex flex-col items-center justify-center hover:text-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0v10a1 1 0 01-1 1h-3m-7 0a1 1 0 01-1-1V10m12 0h2a1 1 0 011 1v10a1 1 0 01-1 1h-3M5 10l7-7 7 7"></path>
                </svg>
                <span class="text-xs">Beranda</span>
            </a>

            <!-- Search -->
            <a href="/search" class="p-2 flex flex-col items-center justify-center hover:text-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20a9 9 0 100-18 9 9 0 000 18zm6-10h.01M21 21l-4.35-4.35"></path>
                </svg>
                <span class="text-xs">Cari</span>
            </a>

            <!-- Cart -->
            <a href="/cart" class="p-2 flex flex-col items-center justify-center relative hover:text-orange-500">
                <!-- Red Dot Notification -->
                @if($cartItemCount > 0)
                <span class="absolute top-0 right-8 block h-2.5 w-2.5 rounded-full bg-red-600 ring-2 ring-white"></span>
                @endif
            
                <!-- Cart Icon -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2m1.6 9h10l4-8H5.4M16 13l-4 4m-2-4l-4 4M4 15a2 2 0 100-4 2 2 0 000 4zm14 2a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
            
                <span class="text-xs">Keranjang</span>
            </a>
            
            <!-- Profile (Updated) -->
            <a href="/about" class="p-2 flex flex-col items-center justify-center hover:text-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-xs">Tentang Kami</span>
            </a>
        </div>
    </nav>
</div>