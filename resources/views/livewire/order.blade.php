<div>

    <div class="col-md-12">
        <div class="row">

            <div class="col-md-8">

                <div class="card">



                    <div class="card-header">
                        <h4 style="float:left;">Order products </h4>
                        <a href="" class="btn btn-dark" style="float:right;" data-bs-toggle="modal"
                            data-bs-target="#addproduct">
                            <i class="fa-solid fa-plus"></i> Add
                            New Products</a>
                    </div>

                    <div class="card-body">


                        <div class="my-2">

                            <form wire:submit.prevent="InsertoCart">
                                <input type="text" name="" id="" class="form-control"
                                    wire:model="prodoct_code" placeholder="Enter Product Code">
                                {{-- <button type="submit">Send</button> --}}
                            </form>


                        </div>




                        {{-- <form action="{{ route('orders.store') }}" method="POST">
                        @csrf --}}

                        <div class="alert alert-success">{{ $message }}</div>

                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif (session()->has('info'))
                            <div class="alert alert-info">{{ session('info') }}</div>
                        @elseif (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Disc (%)</th>
                                    <th colspan="6">Total</th>
                                    {{-- <th><a class="btn btn-sm btn-success add_more rounded-circle"><i
                                                    class="fa-solid fa-plus"></i></a></th> --}}
                                </tr>
                            </thead>

                            <tbody class="addMoreProduct">

                                @foreach ($productIncart as $key => $cart)
                                    <tr>
                                        <td class="no">{{ $key + 1 }}</td>
                                        <td width="30%">
                                            {{-- <select name="product_id[]" id="product_id" class="form-control product_id">
                                                <option value="">Select Item</option>
                                                @foreach ($products as $product)
                                                    <option data-price="{{ $product->price }}" value="{{ $product->id }}">
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select> --}}

                                            <input type="text" class="form-control"
                                                value="{{ $cart->product->product_name }}">
                                        </td>
                                        <td width="15%">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button wire:click.prevent="IncrementQty({{ $cart->id }})"
                                                        class="btn btn-sm btn-success">
                                                        +
                                                    </button>
                                                </div>

                                                <div class="col-md-1">
                                                    <label for="">
                                                        {{ $cart->product_qty }}
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <button wire:click.prevent="DecrementQty({{ $cart->id }})"
                                                        class="btn btn-sm btn-danger">
                                                        -
                                                    </button>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="number" value="{{ $cart->product->price }}"
                                                class="form-control price">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control total_amount"
                                                value="{{ $cart->product_qty * $cart->product->price }}">
                                        </td>
                                        <td><a class="btn btn-sm btn-danger rounded-circle"
                                                wire:click="removeProduct({{ $cart->id }})"><i
                                                    class="fa-solid fa-times"></i></a></td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>

                    </div>
                </div>



            </div>



            <div class="col-md-4">



                <div class="card">
                    <div class="card-header">
                        <h4>total <b class="total"> {{ $productIncart->sum('product_price') }} </b></h4>
                    </div>

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        @foreach ($productIncart as $key => $cart)
                            <input type="hidden" name="product_id[]" class="form-control"
                                value="{{ $cart->product->id }}">

                            <input type="hidden" name="quantity[]" value="{{ $cart->product_qty }}">

                            <input type="hidden" value="{{ $cart->product->price }}" name="price[]"
                                class="form-control price">

                            <input type="hidden" class="form-control discount" name="discount[]" id="discount">

                            <input type="hidden" class="form-control total_amount" name="total_amount[]"
                                value="{{ $cart->product_qty * $cart->product->price }}" id="total">
                        @endforeach


                        <div class="card-body">
                            <div class="btn-group">
                                <button class="btn btn-dark" onclick="printReceiptContent('print')" type="button">
                                    <i class="fa-solid fa-print"></i> Print
                                </button>
                                <button class="btn btn-primary" onclick="printReceiptContent('print')" type="button">
                                    <i class="fa-solid fa-print"></i> History
                                </button>
                                <button class="btn btn-danger" onclick="printReceiptContent('print')" type="button">
                                    <i class="fa-solid fa-print"></i> Report
                                </button>
                            </div>
                            <div class="panel">
                                <div class="row">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <label for="">Customer Name</label>
                                                <input type="text" name="customer_name" id=""
                                                    class="form-control">
                                            </td>
                                            <td>
                                                <label for="">Customer Phone</label>
                                                <input type="number" name="customer_phone" id=""
                                                    class="form-control">
                                            </td>
                                        </tr>
                                    </table>

                                    <div>
                                        Payment Method <br>

                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="cash" checked>
                                            <label for="payment_method">
                                                <i class="fa-solid fa-money-bill text-success"></i> Cash
                                            </label>
                                        </span>

                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="bank transfer">
                                            <label for="payment_method">
                                                <i class="fa-solid fa-university text-danger"></i> Bank Transfer
                                            </label>
                                        </span>

                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="credit card">
                                            <label for="payment_method">
                                                <i class="fa-solid fa-credit-card text-info"></i> Credit card
                                            </label>
                                        </span>
                                    </div>

                                    <div class="mt-3">
                                        Payment <input type="number" wire:model.live="pay_money" id="paid_amount"
                                            class="form-control" name="paid_amount">


                                    </div>

                                    <div class="mt-3">
                                        Returning Balance <input type="number" wire:model="balance" readonly
                                            name="balance" id="balance" class="form-control">
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-lg mt-3">
                                            Save
                                        </button>
                                        <button class="btn btn-danger btn-lg mt">
                                            Calculator
                                        </button>
                                    </div>

                                    <div class="text-center">
                                        <a href="#" class="text-danger"><i
                                                class="fa-solid fa-sign-out-alt"></i>
                                            Logout</a>
                                    </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</form>
</div>
</div>

{{-- <h1>This is not working</h1> --}}


{{-- Modal of adding new product --}}

<!-- Modal -->
{{-- <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('products.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" id="" class="form-control">
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


                        <div class="modal-footer">
                            <button class="btn btn-primary btn-block">Save Product</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div> --}}

</div>
