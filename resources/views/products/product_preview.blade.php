<div class="modal right fade" id="productPreview{{ $product->id }}"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">{{ $product->product_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="">
                    <img src="{{ asset('product/images/'.$product->product_image) }}" width="260" height="200" style="cursor: pointer;" alt="">
                </div>
                <img src="{{ asset('product/barcodes/'.$product->barcode) }}" width="260" style="cursor: pointer;" alt="">



            </div>

        </div>
    </div>
</div>
