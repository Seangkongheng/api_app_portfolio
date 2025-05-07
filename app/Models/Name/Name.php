<?php

namespace App\Models\Name;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_names';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'name',
        'description'
    ];
}
