<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_galleries';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'name',
        'image'
    ];
    
}
