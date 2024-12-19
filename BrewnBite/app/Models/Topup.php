<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Topup extends Model
{
    protected $table = 'topups';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['id_user', 'method', 'amount', 'transdate', 'status', 'snap_token'];

    // Satu record topup dimiliki oleh satu record user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
