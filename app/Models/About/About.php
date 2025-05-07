<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_abouts';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'description'
    ];
}
