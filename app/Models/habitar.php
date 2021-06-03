<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habitar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lat',
        'lng',
        'adress',
        'user_id',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
    
}
}
