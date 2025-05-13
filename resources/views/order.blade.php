<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lacak Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-orange-300 to-orange-500 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white shadow-2xl rounded-lg p-6 lg:p-10 space-y-8 text-black">
                <h3 class="text-2xl font-semibold">Pelacakan Pesanan</h3>
                
                @foreach ($data as $order)
                    <div class="space-y-4">
                        <h4 class="font-semibold text-lg">ID Pesanan: {{ $order->id }}</h4>
                        <div>
                            <h5 class="text-gray-600">Status Saat Ini: {{ $order->status }}</h5>
                        </div>

                        <!-- Barang yang Dipesan -->
                        <div class="bg-gray-100 p-4 rounded-lg space-y-2">
                            <h5 class="font-semibold">Barang yang Dipesan:</h5>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($order->OrderItems as $item)
                                    <li>
                                        <span class="font-medium">{{ $item->products->name }}</span> - 
                                        <span class="text-sm text-gray-600">{{ $item->quantity }} pcs</span> - 
                                        <span class="font-semibold">Rp{{ number_format($item->price, 2) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Garis Waktu Pelacakan Pesanan -->
                        <div class="border-l-2 border-gray-300 pl-4 space-y-2">
                            <div class="flex items-start space-x-3">
                                <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                <div>
                                    <p class="font-semibold">{{ $order->status }}</p>
                                    <p class="text-sm text-gray-600">{{ $order->updated_at->format('d M, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-6">
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
