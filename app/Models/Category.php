<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal (mass assignment)
    protected $fillable = [
        'name', 
        'slug'
    ];

    // Relasi ke model Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
