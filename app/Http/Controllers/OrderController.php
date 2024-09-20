<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        // Last Order details
        $lastID = Order_Detail::max('order_id');
        $order_detail = Order_Detail::where('order_id', $lastID)->get();

        return view('orders.index', ['products' => $products, 'orders' => $orders, 'order_detail' => $order_detail]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            // Order Model

            $orders = new Order();
            $orders->name = $request->customer_name;
            $orders->address = $request->customer_phone;
            $orders->save();
            $order_id = $orders->id;

            // Order Details Model
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                $order_details = new Order_Detail();
                $order_details->order_id = $order_id;
                $order_details->product_id = $request->product_id[$product_id];
                $order_details->unitprice = $request->price[$product_id];
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->discount = $request->discount[$product_id];
                $order_details->amount = $request->total_amount[$product_id];

                $order_details->save();
            }



            // Transaction Model
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->balance = $request->balance;
            $transaction->payment_method = $request->payment_method;
            $transaction->user_id = auth()->user()->id;
            $transaction->transac_date = date('Y-m-d');
            $transaction->transac_amount = $order_details->amount;
            $transaction->save();

            Cart::where('user_id', auth()->user()->id)->delete();


            // Last Order History

            $products = Product::all();
            $order_detail = Order_Detail::where('order_id', $order_id)->get();
            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index',
            [
                'products' => $products,
                'order_details' => $order_details,
                'customer_orders' => $orderedBy
            ]);
        });

            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
