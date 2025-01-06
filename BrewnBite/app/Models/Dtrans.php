<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dtrans extends Model
{
    protected $table = 'dtrans';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = ['id_htrans', 'id_product', 'amount', 'price_per_item', 'item_subtotal'];

    // Satu record dtrans hanya dimiliki oleh satu record htrans
    public function htrans(): BelongsTo
    {
        return $this->belongsTo(Htrans::class, 'id_htrans', 'id');
    }

    // Satu record dtrans berisi satu record product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    // Satu record dtrans berisi satu record rating
    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class, 'id_dtrans', 'id');
    }

    // Satu record dtrans memiliki banyak record daddons
    public function daddons()
    {
        return $this->hasMany(Daddon::class, 'id_dtrans', 'id');
    }
}
