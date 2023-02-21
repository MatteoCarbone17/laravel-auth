@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($projects as $project)
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
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
