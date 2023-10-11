<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'link', 'share', 'picture', 'picture_small', 'picture_medium','nb_album', 'nb_fan',
        'picture_big', 'picture_xl', 'radio', 'tracklist'
    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
