<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Field yang dapat diisi melalui mass-assignment
    protected $fillable = [
        'name',     
        'slug',     // Tambahkan slug
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
        return $this->belongsTo(Category::class);
    }

    /**
     * Override route key untuk menggunakan slug.
     * Ini memungkinkan penggunaan {product:slug} di route.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
