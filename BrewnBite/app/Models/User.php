<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'email', 'password', 'role', 'membership', 'credit', 'total_spent'];

    // Satu record user memiliki banyak record htrans
    public function htrans(): HasMany
    {
        return $this->hasMany(Htrans::class, 'id_user', 'id');
    }

    // Satu record user memiliki banyak record rating
    public function rating(): HasMany
    {
        return $this->hasMany(Rating::class, 'id_user', 'id');
    }
}
