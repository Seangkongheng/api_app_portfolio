<?php

namespace App\Models\Brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_brands';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'logo'
    ];
}
