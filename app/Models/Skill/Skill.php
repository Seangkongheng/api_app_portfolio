<?php

namespace App\Models\Skill;

use App\Models\Project\Detail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_skills';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'title',
        'description',
    ];
    public function detail(){
        return $this->hasOne(Detail::class,'skill_id');
    }
}
