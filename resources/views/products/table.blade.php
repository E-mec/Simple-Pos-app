<table class="table table-bordered table-left">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Alert</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>


        @foreach ($products as $key => $product)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td wire:click="ProductDetails({{ $product->id }})" data-bs-toggle="tooltip"  title="Click to view product details" style="cursor: pointer;">{{ $product->product_name }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->quantity }}</td>
                <td>


                    <span class="badge
                    {{ $product->quantity > $product->alert_stock ? 'bg-success' : 'bg-danger'}}">
                    {{ $product->quantity > $product->alert_stock ? 'In Stock' : 'Stock < ' . $product->alert_stock}}
                    </span>
                </td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#editproduct{{ $product->id }}"><i
                                class="fa-solid fa-edit"></i> Edit</a>
                        <a href=""  data-bs-toggle="modal"
                            data-bs-target="#deleteproduct{{ $product->id }}"
                            class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i>
                            Del</a>
                    </div>
                </td>

            </tr>



            {{-- MODAL OF EDIT product DETAILS --}}

            @include('products.edit')


            {{-- MODAL OF DELETE product  --}}

            @include('products.delete')
        @endforeach

    {{-- {{ $products->links() }} --}}

    </tbody>

</table>
