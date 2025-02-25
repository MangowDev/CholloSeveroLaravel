<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    use HasFactory;

    protected $table = 'deals';

    protected $fillable = [
        'title',
        'price',
        'previous_price',
        'rating',
        'description',
        'category',
        'image',
        'url',
        'shop',
        'available',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
