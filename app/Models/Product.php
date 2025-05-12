<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',     
        'price',      
        'description',
        'category_id', 
        'image',       
    ];

    /**
     * Relasi ke model Category.
     * Setiap produk hanya memiliki satu kategori (belongsTo).
     */
    public function category()
    {
        return $this->belongsTo(Category::class); // Relasi produk dengan kategori
    }
}
