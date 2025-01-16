<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Production extends Model
{
    // $table->id();
    // $table->foreignId('id_product')->constrained('products')->onDelete('cascade');
    // $table->integer('amount');
    // $table->timestamps();
    protected $table = 'productions';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['id_product', 'amount'];

    // Satu record production hanya memiliki satu record product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
