@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cart && $cart->items->isNotEmpty())
        <ul>
            @foreach ($cart->items as $cartItem)
                <li>
                    {{ $cartItem->product->name }} (x{{ $cartItem->quantity }}) - ${{ $cartItem->product->price * $cartItem->quantity }}
                    <form action="{{ route('cart.delete', $cartItem->product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <p>Total: ${{ $cart->items->sum(function($item) { return $item->product->price * $item->quantity; }) }}</p>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
