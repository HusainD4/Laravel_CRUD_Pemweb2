<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi (mass assignable).
     */
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'category_id',
        'image',
    ];

    /**
     * Relasi ke model Category.
     * Setiap produk dimiliki oleh satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Menggunakan 'slug' sebagai pengganti 'id' pada route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Cast atribut ke tipe data yang sesuai (opsional, tapi direkomendasikan).
     */
    protected $casts = [
        'price' => 'integer', // atau 'float' jika perlu desimal
    ];
}
