<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $table = 'recipes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['id_product', 'id_ingredient', 'amount'];

    // Satu record recipe dimiliki oleh satu produk
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    // Satu record recipe dimiliki oleh satu ingredient
    public function ingredients(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class, 'id_ingredient', 'id');
    }
}
