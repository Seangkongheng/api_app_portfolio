<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_projects';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'name',
    ];


    public function detail(){
        return $this->hasOne(Detail::class,'project_id');
    }
}
