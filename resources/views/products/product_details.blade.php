
<div class="row">
    @forelse ($products_details as $product)

    <div class="col-md-12">
        <div class="form-group">
            <img data-bs-toggle="modal" data-bs-target="#productPreview{{ $product->id }}" src="{{ asset('product/images/'.$product->product_image) }}" width="100" style="cursor: pointer;" alt=""> <br>
            <label for="">Pro Id</label>

            <input type="text" class="form-control" value="{{ $product->id }}" readonly name="" id="">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Name</label>
            <input type="text" class="form-control" value="{{ $product->product_name }}" readonly name="" id="">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Code</label>
            <input type="text" class="form-control" value="{{ $product->product_code }}" readonly name="" id="">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Price</label>
            <input type="text" class="form-control" value="{{ $product->price }}" readonly name="" id="">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Quantity</label>
            <input type="text" class="form-control" value="{{ $product->quantity }}" readonly name="" id="">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Stock</label>
            <input type="text" class="form-control" value="{{ $product->alert_stock }}" readonly name="" id="">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Description</label>
            <textarea class="form-control" readonly cols="10" rows="2">
                {{ $product->description }}
            </textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group" style="text-align: center;">
            {{-- <label for=""> Barcode</label> --}}

            <span style="text-align: center;">
                <img src="{{ asset('product/barcodes/'.$product->barcode) }}" width="70" style="cursor: pointer;" alt="">
            </span>

            <h5>{{ $product->product_code }}</h5>
        </div>
    </div>


    @include('products.product_preview')



    @empty

    @endforelse
</div>


<style>
    input:read-only{
        background: #fff !important;
    }
    textarea:read-only{
        background: #fff !important;

    }
</style>
