<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_Detail extends Model
{
    use HasFactory;

    protected $table = 'order__details';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unitprice',
        'amount',
        'discount',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
