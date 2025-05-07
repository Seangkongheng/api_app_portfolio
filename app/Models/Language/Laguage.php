<?php

namespace App\Models\Language;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laguage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_pro_laguages';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'name',
    ];
}
