<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected static function booted(): void { static::creating(function (self $customer) { $customer->created_at = now(); }); }
    protected $fillable = ['full_name', 'email', 'phone'];
    protected $casts = ['created_at' => 'datetime'];
    public function sales() { return $this->hasMany(Sale::class); }
}
