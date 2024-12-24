<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Htrans extends Model
{
    use SoftDeletes;
    protected $table = 'htrans';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['id_user', 'subtotal', 'id_promo', 'grandtotal'];

    // Satu record htrans memiliki banyak record dtrans
    public function dtrans(): HasMany
    {
        return $this->hasMany(Dtrans::class, 'id_htrans', 'id');
    }

    // Satu record htrans hanya dimiliki oleh satu record user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Satu record htrans hanya dimiliki oleh satu record promo
    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class, 'id_promo', 'id');
    }
}
