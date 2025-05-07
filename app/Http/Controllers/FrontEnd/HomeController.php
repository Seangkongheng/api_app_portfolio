<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\Contact\Contact;
use App\Models\Cv\Cv;
use App\Models\Education\Education;
use App\Models\Experience\Experience;
use App\Models\Favorite\Favorite;
use App\Models\Language\Laguage;
use App\Models\Name\Name;
use App\Models\Project\Category;
use App\Models\Project\Project;
use App\Models\Skill\Skill;
use App\Models\Tool\Tool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $names =  Name::all();
        $experiences = Experience::all();
        $educations = Education::all();
        return response()->json([
            'names' => $names,
            'experiences' => $experiences,
            'educations' => $educations,
        ]);

    }
}
