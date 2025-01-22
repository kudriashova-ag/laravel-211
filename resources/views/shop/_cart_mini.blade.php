@if(session('cart'))

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border p-2">Image</th>
                <th class="border p-2">Product</th>
                <th class="border p-2">Price</th>
                <th class="border p-2">Qty</th>
                <th class="border p-2">Total</th>
                <th class="border p-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $product)
            <tr>
                <td class="border p-2"><img src="{{ asset($product['img']) }}" alt="" style="width: 80px"></td>
                <td class="border p-2">{{ $product['name'] }}</td>
                <td class="border p-2">{{ $product['price'] }}</td>
                <td class="border p-2">{{ $product['quantity'] }}</td>
                <td class="border p-2">{{ $product['price'] * $product['quantity'] }}</td>
                <td class="border p-2">
                    <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 remove-product-btn"  data-id="{{ $product['id'] }}">Remove</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="border p-2 text-right font-bold">Total:</td>
                <td class="border p-2">{{ session('totalSum') }}</td>
            </tr>
        </tfoot>
    </table>


@else
    <h1>Cart is empty</h1>
@endif