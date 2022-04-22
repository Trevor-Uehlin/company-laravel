<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Image;

class ProjectController extends Controller {

    public function __construct() {

        $this->middleware('admin')->except('index');
    }

    public function index() {

        $projects = Project::all();

        return view('projects.index', compact("projects"));
    }


    public function create() {

        return view('projects.create');
    }


    public function store(Request $request) {

        $project = new Project();
        $project->title = $request['title'];
        $project->organization = $request['organization'];
        $project->description = $request['description'];

        $file = $request->file('file');

        $image = new Image();
        $image->path = $file->store('project-images');
        $image->title = $file->getClientOriginalName();
        $image->size = $file->getSize();
        $image->type = $file->extension();

        $project->save();
        $image->save();

        DB::table('image_project')->insert([
            'image_id' => $image->id,
            'project_id'  => $project->id
        ]);

        return redirect(route('projects'));
    }


    public function show($id) {

        var_dump("Hello from show");
    }


    public function edit($id) {

        //
    }


    public function update(Request $request, $id) {

        //
    }

    public function destroy($id) {

        var_dump("Hello from destroy");
    }
}
