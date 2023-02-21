<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::simplePaginate(1000);
        return view('admin.projects.index', compact('projects') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(project $project)
    {
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $data = $request->validate([
            
            'title'=> 'required|min:5|max:150',
            'author'=> 'min:3|max:50',
            'content'=> 'required|min:3|max:1600',
            'project_date_start'=>'required',
        ],[
            'title.required'=>'Titolo obbligatorio',
            'title.min' => 'Minimo 5 caratteri' ,
            'title.max' => 'Limite massimo 50 caratteri' ,
            'author.min' => 'Minimo 3 caratteri' ,
            'author.max' => 'Limite massimo 50 caratteri' ,
            'content.required'=>'Contenuto obbligatorio',
            'content.min' => 'Minimo 3 caratteri' ,
            'content.max' => 'Limite massimo 1660 caratteri' ,
            'project_date_start.required'=>'Data inizio obbligatoria',
        ]); 
        
         $data['author']=Auth::user()->name;
         $data['slug']=Str::slug($data['title']);
        //  $data['project_date_end']= ($data['project_date_start']);
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();
        return redirect()->route('admin.projects.show',$newProject->id)->with('message', "Project $newProject->title has been created");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show',compact('project') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
       return view('admin.projects.edit',compact('project') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            
            'title'=> ['required', 'min:5','max:150'],
            'author'=> 'min:3|max:50',
            'content'=> 'required|min:3|max:1600',
            'project_date_start'=>'required',
        ],[
            'title.required'=>'Titolo obbligatorio',
            'title.min' => 'Minimo 5 caratteri' ,
            'title.max' => 'Limite massimo 50 caratteri' ,
            'author.min' => 'Minimo 3 caratteri' ,
            'author.max' => 'Limite massimo 50 caratteri' ,
            'content.required'=>'Contenuto obbligatorio',
            'content.min' => 'Minimo 3 caratteri' ,
            'content.max' => 'Limite massimo 1660 caratteri' ,
            'project_date_start.required'=>'Data inizio obbligatoria',
        ]); 
        
        $project->update($data);
        return redirect()->route('admin.projects.show',compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "Project \" $project->title \" has been deleted")->with('classMessage', "-danger");
    }
    
}

