<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function order()
    {
        return $this->hasOneThrough(
            order::class,
            Product::class,
            'product_id',
            'supplier_id'
        );
    }

        public function orders()
    {
        return $this->hasManyThrough(
            order::class,
            Product::class,
            'product_id',
            'supplier_id'
        );
    }
}
