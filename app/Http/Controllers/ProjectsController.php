<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('auth')->only(['store', 'update']);
//        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
       /*
        auth()->id() // 4
        auth()->user() // user
        auth()->check() // boolean
        if (auth()->guest())
      */



//        $projects = Project::where('owner_id', auth()->id())->get();// select * from projects where owner_id = 4
//        $projects = Project::where('owner_id', auth()->id())->take(2)->get();
//        $projects = Project::all();
//
//        return $projects;
//        return view('projects.index', ['projects' => $projects]);

//        dump($projects);

//        try {
//            cache()->rememberForever('stats', function () {
//                return ['lessons' => 1300, 'hours' => 50000, 'series' => 100];
//            });
//        } catch (\Exception $e) {
//        }

//        $stats = cache()->get('stats');
//        dump($stats);

//       $projects = auth()->user()->projects;

        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);

//        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

//    public function show($id)
//    {
//        $project = Project::findOrFail($id);
//        return view('projects.show', compact('project'));
//    }

    public function show(Project $project)
    {
//        $twitter = app('twitter');
//
//        dd($twitter);

//        if ($project->owner_id !== auth()->id()) {
//            abort(403);
//        }

//        abort_if($project->owner_id !== auth()->id(), 403);

//        abort_if(! auth()->user()->owns($project), 403);
//        abort_unless(auth()->user()->owns($project), 403);

//        $this->authorize('update', $project);

//        if (\Gate::denies('update', $project)) {
//            abort(403);
//        }

//        abort_if(\Gate::denies('update', $project), 403);

//        abort_unless(\Gate::allows('update', $project), 403);

//        abort_if(auth()->user()->cannot('update', $project), 403);

//        abort_unless(auth()->user()->can('update', $project), 403);

        return view('projects.show', compact('project'));
    }

    public function store()
    {
        //return request()->all();
        //return request('title');

//        Project::create([
//            'title' => request('title'),
//            'description' => request('description')
//        ]);

        $attributes = $this->validateProject();

//        Project::create($attributes + ['owner_id' => auth()->id()]);

        $attributes['owner_id'] = auth()->id();
        $project = Project::create($attributes);
//        Project::create($attributes);

//        Project::create(
//            request()->validate([
//                'title' => ['required', 'min:3', 'max:255'],
//                'description' => ['required', 'min:3']
//            ])
//        );

//        $project = new Project();
//        $project->title = request('title');
//        $project->description = request('description');
//
//        $project->save();

//        \Mail::to('jane@example.com')->send(
//            new ProjectCreated($project)
//        );

//        event(new \App\Events\ProjectCreated($project));

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        //dd('hello!');
        //dd(request()->all());


//        $project->title = request('title');
//        $project->description

//        $this->authorize('update', $project);

        $project->update($this->validateProject());

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        //dd('delete ' . $id);
//        $this->authorize('update', $project);
        $project->delete();

        return redirect('/projects');
    }

    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3']
        ]);
    }


}
