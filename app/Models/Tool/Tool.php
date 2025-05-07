<?php

namespace App\Models\Tool;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_tools';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'title',
    ];
}
