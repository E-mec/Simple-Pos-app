<div class="modal right fade" id="deleteproduct{{ $product->id }}"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Delete product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('products.destroy', $product->id) }}"
                    method="post">
                    @csrf
                    @method('delete')

                    <p>Are you sure you want to delete this {{ $product->product_name }} ?
                    </p>

                    <div class="modal-footer">
                        <button class="btn btn-warning btn-block"
                            data-bs-dismiss="modal">
                            Cancel</button>

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
