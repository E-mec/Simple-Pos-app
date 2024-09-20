<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = [
        'sub_cate_name',
        'category_id',
        'status'
    ];

    public function category (): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    
}
