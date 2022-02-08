<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'podcast_id',
        'image',
        'duration',
    ];

    public function podcasts()
    {
        return $this->belongsTo(Podcast::class,'podcast_id','id');
    }
}
