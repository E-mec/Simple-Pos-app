@extends('layouts.app')

@section('content')


    <livewire:products />


    {{-- Modal of adding new product --}}

    <!-- Modal -->
    <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Product Code</label>
                            <input type="text" name="product_code" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" name="brand" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alert Stock</label>
                            <input type="number" name="alert_stock" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description </label>
                            <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="product_image" id="product_image" class="form-control">
                        </div>


                        <div class="modal-footer">
                            <button class="btn btn-primary btn-block">Save Product</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>




    <style>
        .modal.right .modal-dialog {
            /* position: absolute; */
            top: 0;
            right: 0;
            margin-right: 20vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0);
        }
    </style>
@endsection
