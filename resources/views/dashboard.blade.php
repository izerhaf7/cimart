<x-app-layout>
    <!-- Konten di sini -->
    <div class="pt-10">
        <!-- Konten halaman Anda di sini -->
    </div> 
    <x-hero :data="$banner"/>
    <br>
    <x-category />

    <div>
        <livewire:title title="Rekomendasi dari Kami"/>
        <div class="max-w-[448px] mx-auto bg-blue-400 rounded-lg shadow-lg">
            <!-- Bagian Promo -->
            <div class="flex items-center space-x-4">
                <!-- Kartu Produk (Dapat Di-scroll) -->
                <livewire:front-products category="recomendation"/>
            </div>
        </div>

        <livewire:title title="Promo Besar"/>
        <div class="max-w-[448px] mx-auto bg-blue-400 rounded-lg shadow-lg">
            <!-- Bagian Promo -->
            <div class="flex items-center space-x-4">
                <!-- Kartu Produk (Dapat Di-scroll) -->
                <livewire:front-products category="promotion"/>
            </div>
        </div>
        
        <livewire:title title="Produk Baru di Cimart"/>
        <div class="max-w-[448px] mx-auto bg-blue-400 rounded-lg shadow-lg">
            <!-- Bagian Promo -->
            <div class="flex items-center space-x-4">
                <!-- Kartu Produk (Dapat Di-scroll) -->
                <livewire:front-products category="new"/>
            </div>
        </div>
        
        <livewire:title title="Temukan Artikel"/>
        <livewire:front-article/>

        <livewire:title />
    </div>
</x-app-layout>
