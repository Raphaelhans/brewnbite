<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Procurement extends Model
{
    protected $table = 'procurements';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['id_ingredient', 'amount', 'price_per_item', 'item_subtotal'];

    // Satu record history_beli hanya memiliki satu record ingredient
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class, 'id_ingredient', 'id');
    }
}