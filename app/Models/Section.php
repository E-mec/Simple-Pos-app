<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'section_name',
        'status'
    ];

    use HasFactory;

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
