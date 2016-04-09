<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class IndexController extends Controller
{
    public function index()
    {
        $projects = Project::where(['frontman' => 1, 'active' => 1])->orderby('sort', 'asc')->get();

        return view('front.index', [
            'projects' => $projects,
        ]);
    }
}
