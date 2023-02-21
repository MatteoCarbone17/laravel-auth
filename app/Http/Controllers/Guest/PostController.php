<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\project;

class PostController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(25);
        return view('guests.postProjects.index', compact('projects') );
    }
}
