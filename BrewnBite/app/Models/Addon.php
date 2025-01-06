<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addon extends Model
{
    use SoftDeletes;
    protected $table = 'addons';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'price', 'id_category'];

    // Satu record addon memiliki satu record category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    // Satu record addon memiliki banyak record daddons
    public function daddons()
    {
        return $this->hasMany(Daddon::class, 'id_addon', 'id');
    }
}
