<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Photo;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function allProjects()
    {
        $projects = Project::where('active', 1)->orderby('sort', 'asc')->get();

        return view('front.projects', [
            'projects' => $projects,
        ]);
    }

    public function selectedProject(Project $project)
    {
        return view('front.project', [
            'project' => $project,
        ]);
    }
}
