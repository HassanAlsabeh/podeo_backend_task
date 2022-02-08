<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Podcast extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'title',
        'image',
        'description',
    ];
    public function episodes()
    {
        return $this->hasMany(Episodes::class,'podcast_id','id');
    }
}
