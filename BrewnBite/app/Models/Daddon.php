<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Daddon extends Model
{
    use SoftDeletes;
    protected $table = 'daddons';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['id_dtrans', 'id_addon', 'qty', 'subtotal'];

    // Satu record daddons memiliki satu record dtrans
    public function dtrans()
    {
        return $this->belongsTo(Dtrans::class, 'id_dtrans', 'id');
    }

    // Satu record daddons memiliki satu record addon
    public function addon()
    {
        return $this->belongsTo(Addon::class, 'id_addon', 'id');
    }
}
