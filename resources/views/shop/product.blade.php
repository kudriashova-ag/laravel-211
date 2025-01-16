@extends('templates.main')

@section('content')
    <div class="grid grid-cols-2 gap-4">
        <div>
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full">
        </div>

        <div> 
            <h1 class="text-5xl my-3">{{ $product->name }}</h1>
            <div>Price: {{ $product->price }}</div>
            <div>
                <button class="btn btn-primary add-to-cart-btn" data-id="{{ $product->id }}">Add to Cart</button>
            </div>
        </div>

</div>
@endsection
