<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = ['id_user', 'id_product', 'id_dtrans', 'rating', 'comment'];

    // Satu record rating hanya dimiliki oleh satu user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Satu record rating hanya dimiliki oleh satu product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    // Satu record rating hanya dimiliki oleh satu dtrans
    public function dtrans(): BelongsTo
    {
        return $this->belongsTo(Dtrans::class, 'id_dtrans', 'id');
    }
}
