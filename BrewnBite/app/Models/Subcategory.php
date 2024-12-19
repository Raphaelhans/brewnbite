<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;
    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'description', 'id_category'];

    // Satu record subcategory dimiliki satu record category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    // Satu record subcategory memiliki banyak record product
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'id_subcategory', 'id');
    }
}
