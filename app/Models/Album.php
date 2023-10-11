<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'upc', 'link', 'share', 'cover', 'cover_small', 'cover_medium',
        'cover_big', 'cover_xl', 'md5_image', 'genre_id', 'label', 'nb_tracks',
        'duration', 'fans', 'release_date', 'record_type', 'available', 'tracklist',
        'explicit_lyrics', 'explicit_content_lyrics', 'explicit_content_cover', 'artist_id'
    ];

    protected $dates = [
        'release_date'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
