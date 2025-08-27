<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
     use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'description',
        'product_image',
        'stock',
        'stock_min',
        'price_purchase',
        'price_sell',
        'supplier_id',
        'category_id',
    ];
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function stockMovements() {
        return $this->hasMany(StockMovement::class);
    }
}
