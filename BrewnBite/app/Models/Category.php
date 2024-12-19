<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
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
}