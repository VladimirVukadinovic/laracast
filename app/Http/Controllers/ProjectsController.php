<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\User;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        //dd(auth()->user());
        //abort_unless(auth()->user()->owns($project), 403);
        //abort_if($project->owner_id !== auth()->id(), 403);
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5'],
        ]);
        $validated['owner_id'] = auth()->id();
 //       dd($validated);
        Project::create($validated);

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }


    public function update(Project $project)
    {
        $this->authorize('update', $project);
        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }


    public function destroy(Project $project)
    {
        $this->authorize('update', $project);
        $project->delete();

        return redirect('/projects');
    }
}
