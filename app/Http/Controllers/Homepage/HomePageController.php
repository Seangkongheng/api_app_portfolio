<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Project\Project;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function  index(){

        return view('admin.dashbord.index');
    }
}
