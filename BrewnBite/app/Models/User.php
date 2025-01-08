<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    /*
    Membership
    0: Admin/Karyawan
    1: 0 - 49k
    2: 50 - 99k
    3: 100k - 199k
    4: +200k

    Role:
    1: Cust
    2: Karyawan
    3: Admin
    */
    
    use SoftDeletes;
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['name', 'email', 'password', 'pfp', 'role', 'membership', 'credit', 'total_spent'];

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
