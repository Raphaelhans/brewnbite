<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'id_category', 'id_subcategory', 'price', 'stock', 'rating', 'description', 'weather','img_url'];

    // Satu record product hanya memiliki satu record category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    // Satu record product hanya memiliki satu record subcategory
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'id_subcategory', 'id');
    }

    // Satu record product memiliki banyak record dtrans
    public function dtrans(): HasMany
    {
        return $this->hasMany(Dtrans::class, 'id_product', 'id');
    }

    // Satu record product memiliki banyak record rating
    public function rating(): HasMany
    {
        return $this->hasMany(Rating::class, 'id_product', 'id');
    }

    // Satu record product memiliki banyak record recipe
    public function recipe(): HasMany
    {
        return $this->hasMany(Recipe::class, 'id_product', 'id');
    }

    // Satu record product memiliki banyak record productions
    public function productions(): HasMany
    {
        return $this->hasMany(Production::class, 'id_product', 'id');
    }
}
