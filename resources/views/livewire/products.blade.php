<div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                </div>

                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            <h4 style="float:left;">Add Products </h4>
                            <a href="" class="btn btn-dark" style="float:right;" data-bs-toggle="modal"
                                data-bs-target="#addproduct">
                                <i class="fa-solid fa-plus"></i> Add
                                New Products</a>
                        </div>


                        <div class="card-body">

                            @include('products.table')

                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">
                            <h4>Product Details </h4>
                        </div>


                        <div class="card-body">

                            @include('products.product_details')

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
