<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'album_id', 'artist_id', 'readable', 'title', 'title_short', 'title_version', 
        'link', 'duration', 'rank', 'explicit_lyrics', 'explicit_content_lyrics', 
        'explicit_content_cover', 'preview', 'md5_image'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

}
