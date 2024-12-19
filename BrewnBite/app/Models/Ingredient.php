<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    protected $table = 'ingredients';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'stock', 'unit'];

    // Satu record ingredient memiliki banyak record history_beli
    public function procurement(): HasMany
    {
        return $this->hasMany(Procurement::class, 'id_ingredient', 'id');
    }

    // Satu record ingredient memiliki banyak record recipe
    public function recipe(): HasMany
    {
        return $this->hasMany(Recipe::class, 'id_ingredient', 'id');
    }
}
