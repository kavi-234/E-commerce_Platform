<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                        <p style="color: #28a745;">Welcome, {{ Auth::user()->name }}!</p>
                    @else
                        <p style="color: #28a745;">Welcome, Guest! Please log in.</p>
                    @endauth
                </div>
            </div>

            <!-- Product List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Products</h3>
                    <div class="product-list" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: space-between;">
                        <!-- Product 1 -->
                        <div class="product" style="width: 200px; text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px;">
                            <img src="https://static.vecteezy.com/system/resources/previews/000/197/694/original/premium-cosmetic-brand-advertising-concept-design-with-glitters-vector.jpg" alt="Cosmetics" style="width: 100%; height: auto; border-radius: 5px;">
                            <p>Cosmetics</p>
                            <p>$49.99</p>
                            <button class="add-to-cart" style="background-color: #003366; color: white; padding: 10px 20px; border-radius: 5px;" data-name="Cosmetics" data-price="49.99">
                                Add to Cart
                            </button>
                        </div>

                        <!-- Product 2 -->
                        <div class="product" style="width: 200px; text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px;">
                            <img src="https://th.bing.com/th/id/OIP.ksZyUasNjX_vtFh4INjq4QAAAA?rs=1&pid=ImgDetMain" alt="Hat" style="width: 100%; height: auto; border-radius: 5px;">
                            <p>Hat</p>
                            <p>$19.99</p>
                            <button class="add-to-cart" style="background-color: #003366; color: white; padding: 10px 20px; border-radius: 5px;" data-name="Hat" data-price="19.99">
                                Add to Cart
                            </button>
                        </div>

                        <!-- Product 3 -->
                        <div class="product" style="width: 200px; text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px;">
                            <img src="https://th.bing.com/th/id/OIF.OVfug2kQVU1WH48HaI5tFw?rs=1&pid=ImgDetMain" alt="Frock" style="width: 100%; height: auto; border-radius: 5px;">
                            <p>Frock</p>
                            <p>$99.99</p>
                            <button class="add-to-cart" style="background-color: #003366; color: white; padding: 10px 20px; border-radius: 5px;" data-name="Frock" data-price="99.99">
                                Add to Cart
                            </button>
                        </div>

                        <!-- Product 4 -->
                        <div class="product" style="width: 200px; text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px;">
                            <img src="https://imagesvc.meredithcorp.io/v3/mm/image?q=85&c=sc&poi=face&w=1024&h=536&url=https://static.onecms.io/wp-content/uploads/sites/28/2014/10/local-experts-london-best-womens-clothing-boutiques.jpg" alt="Party Frock" style="width: 100%; height: auto; border-radius: 5px;">
                            <p>Party Frock</p>
                            <p>$49.99</p>
                            <button class="add-to-cart" style="background-color: #003366; color: white; padding: 10px 20px; border-radius: 5px;" data-name="Party Frock" data-price="49.99">
                                Add to Cart
                            </button>
                        </div>

                        <!-- Product 5 -->
                        <div class="product" style="width: 200px; text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px;">
                            <img src="https://th.bing.com/th/id/OIP.vQnXiGwl2BRkZSrzcEEG4wHaHa?rs=1&pid=ImgDetMain" alt="Handbag" style="width: 100%; height: auto; border-radius: 5px;">
                            <p>Handbag</p>
                            <p>$19.99</p>
                            <button class="add-to-cart" style="background-color: #003366; color: white; padding: 10px 20px; border-radius: 5px;" data-name="Handbag" data-price="19.99">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Your Cart Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Your Cart</h3>
                    <div class="cart-content">
                        <!-- Cart items will be listed here -->
                    </div>
                    <button class="clear-cart" style="background-color: #8B0000; color: white; padding: 10px 20px; border-radius: 5px; margin-top: 10px;">
                        Clear Cart
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- JavaScript to handle the cart functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add to Cart functionality
            const cartContent = document.querySelector('.cart-content');
            const addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const productName = this.getAttribute('data-name');
                    const productPrice = this.getAttribute('data-price');

                    const cartItem = document.createElement('div');
                    cartItem.classList.add('cart-item');
                    cartItem.innerHTML = `<p>${productName} - $${productPrice}</p><button class="remove-from-cart" style="background-color: #8B0000; color: white; padding: 5px 10px; border-radius: 5px;">Remove</button>`;

                    cartContent.appendChild(cartItem);

                    // Remove item from cart
                    const removeButton = cartItem.querySelector('.remove-from-cart');
                    removeButton.addEventListener('click', function () {
                        cartItem.remove();
                    });
                });
            });

            // Clear Cart functionality
            const clearCartButton = document.querySelector('.clear-cart');
            clearCartButton.addEventListener('click', function () {
                cartContent.innerHTML = '';
            });
        });
    </script>
</x-app-layout>
