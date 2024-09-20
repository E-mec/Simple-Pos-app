<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'cate_name',
        'section_id',
        'discount',
        'description',
        'status'
    ];

    public function section (): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function sub_categories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
}
