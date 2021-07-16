<?php

namespace App\Models;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class habitar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lat',
        'lng',
        'adress',
        'user_id',
        'emoji',
       
    ];

    public function user()
{
    return $this->belongsTo(User::class);
    
}




}
