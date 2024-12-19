<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsedPromo extends Model
{
    use SoftDeletes;
    protected $table = 'used_promos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['id_promo', 'id_htrans'];

    // Satu record used promo memiliki satu record promo
    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class, 'id_promo', 'id');
    }

    // Satu record used promo memiliki satu record htrans
    public function htrans(): BelongsTo
    {
        return $this->belongsTo(Htrans::class, 'id_htrans', 'id');
    }
}
