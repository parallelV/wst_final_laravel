<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected static function booted(): void { static::creating(function (self $product) { $product->created_at = now(); }); }
    protected $fillable = ['name', 'price', 'stock_quantity', 'image'];
    protected $casts = ['price' => 'decimal:2', 'stock_quantity' => 'integer', 'created_at' => 'datetime'];
    public function sales() { return $this->hasMany(Sale::class); }
}
