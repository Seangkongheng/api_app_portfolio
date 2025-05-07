<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_category_projects';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'name',
    ];

    public function detail(){
        return $this->hasOne(Detail::class,'project_cat_id');
    }
}
