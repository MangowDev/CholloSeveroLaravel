<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'username',
        'password',
        'email',
        'role',
    ];

    public $timestamps = true;

    protected $hidden = [
        'password',
    ];

    public function deals()
    {
        return $this->hasMany(Deals::class);
    }
}
