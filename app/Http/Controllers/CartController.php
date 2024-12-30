<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to the cart
    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        // Get or create a cart for the logged-in user
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Check if the product is already in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($cartItem) {
            // If the product is already in the cart, increase quantity
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Otherwise, add the product to the cart
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully.']);
    }

    // Delete product from the cart
    public function deleteFromCart($productId)
    {
        // Get the user's cart
        $cart = Cart::where('user_id', auth()->id())->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found.'], 404);
        }

        // Find the cart item
        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Item not found in cart.'], 404);
        }

        // Delete the cart item
        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart successfully.']);
    }
}

