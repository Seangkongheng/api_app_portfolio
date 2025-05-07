<?php

namespace App\Models\Project;

use App\Models\Skill\Skill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_project_details';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'project_id',
        'project_cat_id',
        'image',
        'description',
        'url',
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'project_cat_id');
    }
    public function skill(){
        return $this->belongsTo(Skill::class,'skill_id');
    }
}
