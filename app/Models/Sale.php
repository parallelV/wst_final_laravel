<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $timestamps = false;
    protected static function booted(): void { static::creating(function (self $sale) { $sale->created_at = now(); }); }
    protected $fillable = ['product_id', 'customer_id', 'sold_by', 'quantity', 'total_price'];
    protected $casts = ['quantity' => 'integer', 'total_price' => 'decimal:2', 'created_at' => 'datetime'];
    public function product() { return $this->belongsTo(Product::class); }
    public function customer() { return $this->belongsTo(Customer::class); }
    public function staff() { return $this->belongsTo(User::class, 'sold_by'); }
}
