<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Order extends Component
{
    public $orders, $products=[], $prodoct_code, $message='', $productIncart, $pay_money  , $balance ='' ;

    public function mount() {
        $this->products = Product::all();
        $this->productIncart = Cart::all();
    }

    public function InsertoCart()
    {
        $countProduct = Product::where('id', $this->prodoct_code)->first();

        if(!$countProduct) {
            return $this->message = 'Product Not Found';
        }

        $countCartProduct = Cart::where('product_id', $this->prodoct_code)->count();

        if ($countCartProduct > 0) {
            return $this->message = $countProduct->product_name . ' already exist in cart, add quantity!';
        }

        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = auth()->user()->id;
        $add_to_cart->save();

        $this->productIncart->prepend($add_to_cart);

        $this->prodoct_code = ' ';

        return $this->message = 'Product Added Successfully';

        // dd($countProduct);
    }

    public function IncrementQty($cartId)
    {
        $carts = Cart::find($cartId);
        $carts->increment('product_qty', 1);
        $updatePrice = $carts->product_qty * $carts->product->price;

        $carts->update(['product_price' => $updatePrice]);
        $this->mount();

    }

    public function DecrementQty($cartId)
    {
        $carts = Cart::find($cartId);
        if ($carts->product_qty == 1) {
            return session()->flash('info', 'Product '. $carts->product_name .' Quantity cannot be less than 1, add quantity or remove product from cart');
        }
        $carts->decrement('product_qty', 1);
        $updatePrice = $carts->product_qty * $carts->product->price;

        $carts->update(['product_price' => $updatePrice]);
        $this->mount();

    }

    public function removeProduct($cartId)
    {
        $deleteCart = Cart::find($cartId);
        $deleteCart->delete();

        $this->message = 'Product Removed from Cart';

        $this->productIncart = $this->productIncart->except($cartId);
    }

    public function paymentchange(){


    }

    public function render()
    {
        // $productSumTotal = $this->productIncart->sum('product_price');

        if ($this->pay_money) {
            $totalAmount = $this->pay_money - $this->productIncart->sum('product_price');
            $this->balance = $totalAmount;
        }






        return view('livewire.order');
    }
}
