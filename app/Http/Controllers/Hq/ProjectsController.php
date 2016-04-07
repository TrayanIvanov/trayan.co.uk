<?php

namespace App\Http\Controllers\Hq;

use Illuminate\Http\Request;

use Auth;
use App\Photo;
use App\Project;
use App\User;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use File;
use Image;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->orderby('sort', 'asc')->get();

        return view('hq.projects.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('hq.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $addProject = $project->createProject($request, Auth::user());
        return redirect('hq/project');
    }

    public function edit(Project $project)
    {
        return view('hq.projects.edit', [
            'project' => $project,
        ]);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $project->updateProject($request, Auth::user());
        return redirect('hq/project');
    }

    public function destroy(Project $project)
    {
        $projectLogo = $project->logo;
        $projectPhotos = $project->photos()->get();

        $delete = $project->destroy($project->id);
        if ($delete > 0) {
            File::delete($projectLogo);
            foreach ($projectPhotos as $photo) {
                File::delete($photo->path, $photo->path_thumb);
            }
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);
    }

    public function bulkPhotosView(Project $project)
    {
        $photos = Photo::where('project_id', $project->id)->get();

        return view('hq.projects.bulk', [
            'project' => $project,
            'photos' => $photos,
        ]);
    }

    public function bulkPhotosUpload(Project $project, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        $file = $request->file('photo');

        $fileDir = $project::PROJECT_IMG_DIR;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $fileThumbName = time() . '_thumb_' . $file->getClientOriginalName();

        $project->photos()->create([
            'path' => $fileDir . $fileName,
            'path_thumb' => $fileDir . $fileThumbName,
        ]);

        $file->move($fileDir, $fileName);

        Image::make(asset($fileDir . $fileName))
            ->fit(200)
            ->save($fileDir . $fileThumbName);

        return "Done";
    }

    public function changeStatus(Project $project)
    {
        $status = $project->active == 1 ? 0 : 1;

        $project->active = $status;
        $project->save();

        return response()->json(['status' => 'success']);
    }

    public function changeFrontman(Project $project)
    {
        $status = $project->frontman == 1 ? 0 : 1;

        $project->frontman = $status;
        $project->save();

        return response()->json(['status' => 'success']);
    }
}
