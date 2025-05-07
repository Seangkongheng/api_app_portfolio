<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_educations';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'description'
    ];
}
