<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Department;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = Project::all();

		return view('projects.index', compact('projects'));
    }

    public function store()
    {    	
    	if(Project::create(request(['title', 'description'])))
		{
			return redirect('projects');
		}
    }

    public function saveDepartment(Request $request)
    {
        $input  = $request->all();
        if (Department::create($input)) {
            return response()->json(['success' => 'success'], 201);
        }
        return response()->json(['success' => 'fail'], 400);
    }

    public function register()
    {
        return view('register');
    }
}
