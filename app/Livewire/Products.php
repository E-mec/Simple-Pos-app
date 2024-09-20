<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{

    public $products_details = [];

    public function mount()
    {

    }

    public function ProductDetails($product_id)
    {
        $this->products_details = Product::where('id',$product_id)->get();
        // dd($count);
    }

    public function render()
    {
        return view('livewire.products', [
            'products' => Product::all()
        ]);
    }
}
