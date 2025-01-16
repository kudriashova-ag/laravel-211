<div class="p-4 text-center">
    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full">
    <div>Price: {{ $product->price }}</div>
    <div class="text-3xl"><a href="{{ route('shop.product', $product->slug)}}">{{ $product->name }}</a></div>
</div>
