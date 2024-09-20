<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'description',
        'brand',
        'price',
        'quantity',
        'product_code',
        'barcode',
        'qrcode',
        'product_image',
        'alert_stock',
    ];

    public function orderdetail() {
        return $this->hasMany(Order_Detail::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }
}
