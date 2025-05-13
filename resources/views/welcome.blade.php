<x-app-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-8">Keranjang Anda</h1>

            <div id="react-modal-root"></div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <form id="checkoutForm" action="/api/placeOrder" method="POST">
                        @csrf
                        <input type="hidden" name="user_order_id" value="{{ auth()->user()->id }}">

                        @forelse ($data as $index => $item)
                            <div id="cart-item-{{ $index }}" class="flex flex-col md:flex-row justify-between items-center py-6 border-b border-gray-200">
                                <div class="flex items-center mb-4 md:mb-0">
                                    <img src="{{ asset('storage/' . $item->product->image_url) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-md mr-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $item->product->name }}</h3>
                                        <p class="text-sm text-gray-500">{!! Str::limit($item->product->description, 50) !!}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <p class="text-lg font-bold text-gray-900" data-price="{{ $item->product->price }}" id="item-price-{{ $index }}">
                                            Rp{{ number_format($item->product->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="flex items-center border rounded-md">
                                        <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100" onclick="openChangeQuantityModal({{ $index }}, -1)">-</button>
                                        <input type="text" id="quantity-{{ $index }}" name="items[{{ $index }}][quantity]" value="1" class="w-12 text-center border-x border-gray-200" readonly>
                                        <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100" onclick="openChangeQuantityModal({{ $index }}, 1)">+</button>
                                    </div>
                                    <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $item->product_id }}">
                                    <button type="button" onclick="openRemoveItemModal({{ $item->id }})" class="ml-4 text-red-600 hover:text-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <p class="text-center py-8 text-gray-500">Keranjang Anda kosong.</p>
                        @endforelse
                    </form>
                </div>
            </div>

            @if (count($data) > 0)
                <div class="mt-8 bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-semibold text-gray-900">Total</span>
                            <span class="text-2xl font-bold text-gray-900">Rp<span id="total-price">{{ number_format($total, 0, ',', '.') }}</span></span>
                        </div>
                        <button type="button" onclick="openCheckoutModal()" class="w-full bg-orange-600 text-white px-6 py-3 rounded-md hover:bg-orange-700 transition duration-200">
                            Lanjutkan ke Pembayaran
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

    <script type="text/babel">
        const Modal = ({ isOpen, onClose, onConfirm, title, message }) => {
            if (!isOpen) return null;

            return (
                <div className="fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center" id="my-modal">
                    <div className="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
                        <h3 className="text-xl font-semibold text-gray-900 mb-4">{title}</h3>
                        <p className="text-gray-600 mb-6">{message}</p>
                        <div className="flex justify-end space-x-4">
                            <button
                                className="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition duration-200"
                                onClick={onClose}
                            >
                                Batal
                            </button>
                            <button
                                className="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition duration-200"
                                onClick={onConfirm}
                            >
                                Konfirmasi
                            </button>
                        </div>
                    </div>
                </div>
            );
        };

        const App = () => {
            const [modalConfig, setModalConfig] = React.useState({
                isOpen: false,
                title: '',
                message: '',
                onConfirm: () => {},
            });

            const closeModal = () => {
                setModalConfig({ ...modalConfig, isOpen: false });
            };

            window.openChangeQuantityModal = (index, delta) => {
                setModalConfig({
                    isOpen: true,
                    title: 'Ubah Kuantitas',
                    message: `Apakah Anda yakin ingin ${delta > 0 ? 'menambah' : 'mengurangi'} kuantitas?`,
                    onConfirm: () => {
                        changeQuantity(index, delta);
                        closeModal();
                    },
                });
            };

            window.openRemoveItemModal = (itemId) => {
                setModalConfig({
                    isOpen: true,
                    title: 'Hapus Item',
                    message: 'Apakah Anda yakin ingin menghapus item ini dari keranjang?',
                    onConfirm: () => {
                        window.location.href = "/api/deleteCart?id=" + itemId;
                    },
                });
            };

            window.openCheckoutModal = () => {
                setModalConfig({
                    isOpen: true,
                    title: 'Konfirmasi Pembayaran',
                    message: 'Apakah Anda yakin ingin melanjutkan ke pembayaran?',
                    onConfirm: () => {
                        document.getElementById('checkoutForm').submit();
                    },
                });
            };

            return (
                <Modal
                    isOpen={modalConfig.isOpen}
                    onClose={closeModal}
                    onConfirm={modalConfig.onConfirm}
                    title={modalConfig.title}
                    message={modalConfig.message}
                />
            );
        };

        ReactDOM.render(<App />, document.getElementById('react-modal-root'));

        function changeQuantity(index, delta) {
            var quantityInput = document.getElementById('quantity-' + index);
            var currentQuantity = parseInt(quantityInput.value);

            var newQuantity = currentQuantity + delta;
            if (newQuantity >= 1) {
                quantityInput.value = newQuantity;
                updateTotalPrice();
            }
        }

        function updateTotalPrice() {
            var totalPrice = 0;

            @foreach ($data as $key => $item)
                var price = parseFloat(document.getElementById('item-price-{{ $key }}').getAttribute('data-price'));
                var quantity = parseInt(document.getElementById('quantity-{{ $key }}').value);
                totalPrice += price * quantity;
            @endforeach

            document.getElementById('total-price').textContent = totalPrice.toLocaleString('id-ID');
        }
    </script>
</x-app-layout>
