@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
        <div class="card p-5">
            <div class="card-header p-3">
              {{ $project->author }}
            </div>
            <div class="card-body text-center">
              <h5 class="card-title">{{ $project->title }}</h5>
              <p class="card-text">{{ $project->content }}</p>
              <div class="card-footer p-3">
               <span class="d-block">Data inizio : {{ $project->project_date_start }} </span> <span>Data fine:  {{  $project->project_date_end}}</span>
              </div>
              <a class="btn btn-success mt-3"  href="{{ route('admin.projects.index' , $project->id) }}">Return to Project Page</a>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
