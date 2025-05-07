<?php

namespace App\Models\Favorite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_favorites';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'title',
    ];
}
