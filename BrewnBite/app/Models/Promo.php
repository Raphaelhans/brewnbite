<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model
{
    protected $table = 'promos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'discount', 'min_transaction', 'max_discount', 'requirement'];

    // Satu record promo memiliki banyak record htrans
    public function htrans(): HasMany
    {
        return $this->hasMany(Htrans::class, 'id_promo', 'id');
    }

    // Satu record promo memiliki banyak record usedpromo
    public function usedpromo(): HasMany
    {
        return $this->hasMany(UsedPromo::class, 'id_promo', 'id');
    }
}
