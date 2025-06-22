<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_blogs';
    protected $primarykey='id';
    protected $fillable=[
        'title',
        'description',
        'images',
        'is_public',
        'view',
        'author',
        'created_at',
        'updated_at'

    ];
}
