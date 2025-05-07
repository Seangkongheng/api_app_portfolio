<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'tbl_cvs';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'file',
    ];
}
