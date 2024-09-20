<div class="modal right fade" id="editproduct{{ $product->id }}"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Edit product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('products.update', $product->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" value="{{ $product->product_name }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Product Code</label>
                        <input type="text" name="product_code" value="{{ $product->product_code }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label>
                        <input type="text" name="brand" value="{{ $product->brand }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{ $product->price }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alert Stock</label>
                        <input type="number" name="alert_stock" value="{{ $product->alert_stock }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description </label>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control">
                            {{ $product->description }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <img src="{{ asset('product/images/' .$product->product_image) }}" width="60" alt="" sizes="" srcset="">
                        <input type="file" name="product_image"  id="product_image" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-warning btn-block">Update
                            product</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
