@extends('layouts.app')

@section('content')
    <h1>Products</h1>

    @foreach ($products as $product)
        <div class="product">
            <h2>{{ $product->name }}</h2>
            <p>${{ $product->price }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    @endforeach
@endsection
