<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;
    protected $table = 'search_histories';
    protected $fillable = ['query', 'searched_at'];
    protected $casts = [
        'searched_at' => 'datetime',
    ];
}
