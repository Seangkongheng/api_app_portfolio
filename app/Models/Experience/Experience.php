<?php

namespace App\Models\Experience;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_experiences';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'about',
    ];
}
