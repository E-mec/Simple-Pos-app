<a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-list"></i></a>
<a href="" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-house"></i> Home</a>
<a href="{{ route('users.index') }}" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-user"></i> Users</a>
<a href="{{ route('products.index') }}" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-box"></i> Products</a>
<a href="{{ route('orders.index') }}" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-desktop"></i> Cashier</a>
<a href="" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-file"></i> Reports</a>
<a href="" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-money-bill"></i> Transactions</a>
<a href="" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-bar-chart"></i> Suppliers</a>
<a href="" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-users"></i> Customers</a>
<a href="" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-truck"></i> Incoming</a>
<a href="{{ route('products.barcode') }}" class="btn btn-sm btn-outline rounded-pill"><i class="fa-solid fa-barcode"></i> Barcodes</a>



<style>

    .btn-outline {
        border-color: #008b8b;
        color: #008b8b;
    }

    .btn-outline:hover {
        background-color: #008b8b;
        color: #fff;
    }

</style>
