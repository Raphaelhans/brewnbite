<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'description'];

    // Satu record category memiliki banyak record product
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }

    // Satu record category memiliki banyak record subcategory
    public function subcategory(): HasMany
    {
        return $this->hasMany(Subcategory::class, 'id_category', 'id');
    }

    // Satu record category memiliki banyak record addon
    public function addon(): HasMany
    {
        return $this->hasMany(Addon::class, 'id_category', 'id');
    }
}