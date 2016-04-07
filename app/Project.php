<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    const PROJECT_LOGO_DIR = 'images/projects/logos/';
    const PROJECT_IMG_DIR = 'images/projects/';

    protected $fillable = [
        'name',
        'url',
        'release',
        'contribution',
        'description',
        'logo',
    ];

    public function createProject($request, User $user)
    {
        $projectData = $request->all();

        if ($request->logo) {
            $logoDir = self::PROJECT_LOGO_DIR;
            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($logoDir, $logoName);
            $projectData['logo'] = $logoDir . $logoName;
        }

        $user->projects()->create($projectData);
        return true;
    }

    public function updateProject($request, User $user)
    {
        $projectData = $request->except('_method', '_token');

        if ($request->logo) {
            $logoDir = self::PROJECT_LOGO_DIR;
            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($logoDir, $logoName);

            if ($this->logo != '') {
                unlink($this->logo);
            }
            $projectData['logo'] = $logoDir . $logoName;
        }

        $this->update($projectData);
        return true;
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
