@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @dump( $previousProject)
    <div class="col">
        <div class="card p-5">
            <div class="card-header p-3">
              {{ $project->author }}
            </div>
            <div class="card-body text-center">
              <h5 class="card-title">{{ $project->title }}</h5>
              <p class="card-text">{{ $project->content }}</p>
              <div class="card-footer p-3">
               <span class="d-block">Data inizio : {{ $project->project_date_start }} </span>
               @if(isset($project->project_date_end) )
               <p> Data fine:  {{  $project->project_date_end}}</p>
               @else
                 <p> Project working in progress </p>  
               @endif
               <span> Slug:  {{ $project->slug }} </span>
              </div>
              <div class="row mt-5">
                <div class="col-12 d-flex justify-content-between ">
                  <a class="btn btn-outline-primary mt-3"  href="{{ route('admin.projects.show' , $previousProject->id) }}">Previous Page</a>
                  <a class="btn btn-success mt-3"  href="{{ route('admin.projects.index' , $project->id) }}">Return to Project Page</a>
                  <a class="btn btn-outline-primary mt-3"  href="{{ route('admin.projects.show' , $nextProject->id) }}">Next Page</a>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
